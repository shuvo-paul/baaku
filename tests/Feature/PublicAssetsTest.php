<?php

it('ships the vendored sortable module', function () {
    expect(public_path('assets/sortable.esm.js'))->toBeFile();
});

it('builds every vite entry used by layouts and components', function () {
    $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);

    expect($manifest)->toBeArray();

    foreach ([
        'resources/css/app.css',
        'resources/css/dashboard.css',
        'resources/js/editor.js',
        'resources/js/cropper.js',
    ] as $entry) {
        expect($manifest)->toHaveKey($entry);
    }
});
