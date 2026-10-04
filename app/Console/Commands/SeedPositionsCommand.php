<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\PositionSeeder;
use Illuminate\Console\Command;

class SeedPositionsCommand extends Command
{
    protected $signature = 'positions:seed';

    protected $description = 'Seed committee positions.';

    public function handle(): int
    {
        (new PositionSeeder)->run();

        $this->info('Committee positions seeded.');

        return self::SUCCESS;
    }
}
