<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;

it('resolves the media routes to the new prefix', function () {
    expect(route('editor.image.show', 'x.jpg'))->toEndWith('/media/editor-images/x.jpg')
        ->and(route('profile.photo.show', 'x.jpg'))->toEndWith('/media/profile-photos/x.jpg')
        ->and(route('committee.photo', 'x.jpg'))->toEndWith('/media/committee-photos/x.jpg');
});

it('streams stored media files and 404s missing ones', function () {
    Storage::fake('public');
    Storage::disk('public')->put('editor-images/x.jpg', 'binary');

    $this->get(route('editor.image.show', 'x.jpg'))->assertOk();

    $this->get(route('editor.image.show', 'missing.jpg'))->assertNotFound();
});
