<?php

it('ships the compiled dashboard assets', function (string $file) {
    expect(public_path('alumkit/style/'.$file))->toBeFile();
})->with([
    'alumkit.css',
    'alumkit-cropper.css',
    'alumkit-cropper.js',
    'alumkit-editor.css',
    'alumkit-editor.js',
    'alumkit-sortable.esm.js',
]);
