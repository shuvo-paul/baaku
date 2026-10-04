<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Console\Command;

class SeedMembersCommand extends Command
{
    /**
     * The command signature.
     */
    protected $signature = 'members:seed';

    /**
     * The command description.
     */
    protected $description = 'Seed member roles, permissions, and the admin user.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        (new RolesAndPermissionsSeeder)->run();
        (new AdminUserSeeder)->run();

        $this->info('Member roles, permissions, and admin user seeded.');

        return self::SUCCESS;
    }
}
