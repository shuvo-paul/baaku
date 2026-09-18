<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Daily backup to Google Drive at 3:00 AM
Schedule::command('backup:run')->dailyAt('03:00')->timezone('Asia/Dhaka');

// Check backup health daily at 3:30 AM (after backup completes)
Schedule::command('backup:monitor')->dailyAt('03:30')->timezone('Asia/Dhaka');

// Weekly cleanup of old backups on Sunday at 4:00 AM
Schedule::command('backup:clean')->weeklyOn(0, '04:00')->timezone('Asia/Dhaka');
