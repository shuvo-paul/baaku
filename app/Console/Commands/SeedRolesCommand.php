<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\RolesSeeder;
use Illuminate\Console\Command;

class SeedRolesCommand extends Command
{
    protected $signature = 'roles:seed';

    protected $description = 'Seed roles and permission grants (ensures permissions exist first).';

    public function handle(): int
    {
        (new RolesSeeder)->run();

        $this->info('Roles and grants seeded.');

        return self::SUCCESS;
    }
}
