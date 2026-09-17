<?php

it('configures google drive as the sole backup destination', function () {
    expect(config('filesystems.disks.google_drive.driver'))->toBe('google_drive');
    expect(config('backup.backup.destination.disks'))->toBe(['google_drive']);
    expect(config('backup.monitor_backups.0.disks'))->toBe(['google_drive']);
});
