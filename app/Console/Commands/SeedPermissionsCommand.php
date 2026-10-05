<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\PermissionsSeeder;
use Illuminate\Console\Command;

class SeedPermissionsCommand extends Command
{
    protected $signature = 'permissions:seed';

    protected $description = 'Seed permissions only (built-in + config).';

    public function handle(): int
    {
        (new PermissionsSeeder)->run();

        $this->info('Permissions seeded.');

        return self::SUCCESS;
    }
}
