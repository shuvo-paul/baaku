<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\AdminUserSeeder;
use Illuminate\Console\Command;

class SeedAdminCommand extends Command
{
    protected $signature = 'admin:seed';

    protected $description = 'Seed the admin user from env and assign the admin role.';

    public function handle(): int
    {
        (new AdminUserSeeder)->run();

        $this->info('Admin user seeded.');

        return self::SUCCESS;
    }
}
