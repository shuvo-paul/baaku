<?php

namespace App\Providers;

use App\Content\ContentRegistry;
use App\Listeners\MarkUserPendingOnVerification;
use App\Livewire\CommitteeOrdering;
use App\Livewire\LinkField;
use App\Livewire\RepeaterField;
use App\Livewire\UserSearch;
use App\Models\Page;
use App\Observers\PageObserver;
use Carbon\CarbonImmutable;
use Google\Client;
use Google\Service\Drive;
use Illuminate\Auth\Events\Verified;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use League\Flysystem\Filesystem;
use Livewire\Livewire;
use Masbug\Flysystem\GoogleDriveAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ContentRegistry::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();

        $this->registerLivewireComponents();

        Page::observe(PageObserver::class);

        Event::listen(Verified::class, MarkUserPendingOnVerification::class);

        Storage::extend('google_drive', function ($app, array $config) {
            $client = new Client;
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);

            $service = new Drive($client);
            $adapter = new GoogleDriveAdapter(
                $service,
                $config['folderId'] ?? null,
            );

            $filesystem = new Filesystem($adapter);

            // Pre-create backup subdirectory so spatie's reachability check passes
            $backupDir = $app['config']->get('backup.backup.destination.filename_prefix')
                ?: $app['config']->get('app.name');
            if ($backupDir !== null) {
                $filesystem->createDirectory($backupDir);
            }

            return new FilesystemAdapter($filesystem, $adapter);
        });
    }

    /**
     * Register the dashboard's Livewire components under flattened names.
     */
    protected function registerLivewireComponents(): void
    {
        Livewire::component('link-field', LinkField::class);
        Livewire::component('committee-ordering', CommitteeOrdering::class);
        Livewire::component('repeater-field', RepeaterField::class);
        Livewire::component('user-search', UserSearch::class);
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
