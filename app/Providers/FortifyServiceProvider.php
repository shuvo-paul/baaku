<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureFortifyViews();

        $this->configureFortifyActions();

        RedirectIfAuthenticated::redirectUsing(fn () => route('dashboard'));
    }

    /**
     * Map Fortify's auth screens to the app's flattened auth views.
     */
    protected function configureFortifyViews(): void
    {
        Fortify::loginView(fn () => view('auth.login'));

        Fortify::registerView(fn () => view('auth.register'));

        Fortify::requestPasswordResetLinkView(fn () => view('auth.forgot-password'));

        Fortify::resetPasswordView(fn (Request $request) => view('auth.reset-password', ['request' => $request]));

        Fortify::verifyEmailView(fn () => view('auth.verify-email'));

        Fortify::confirmPasswordView(fn () => view('auth.confirm-password'));

        Fortify::twoFactorChallengeView(fn () => view('auth.two-factor-challenge'));
    }

    /**
     * Bind Fortify's auth actions to the app's implementations.
     */
    protected function configureFortifyActions(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);

        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
    }
}
