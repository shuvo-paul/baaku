<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\DevUserSeeder;
use Illuminate\Console\Command;

class DevSeedCommand extends Command
{
    protected $signature = 'dev:seed';

    protected $description = 'Seed the local-only dev user. Refuses to run outside the local environment.';

    public function handle(): int
    {
        if (! app()->environment('local')) {
            $this->error('dev:seed only runs in the local environment.');

            return self::FAILURE;
        }

        (new DevUserSeeder)->run();

        $this->info('Dev user seeded.');

        return self::SUCCESS;
    }
}
