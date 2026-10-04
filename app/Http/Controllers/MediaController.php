<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

/**
 * Streams dashboard media straight from the public disk (no storage:link
 * requirement). A controller (not a closure) keeps `route:cache` free of
 * serialized closures and absolute paths.
 */
class MediaController extends Controller
{
    /**
     * Serve an editor image.
     */
    public function editorImage(string $file): Response
    {
        return $this->streamFrom('editor-images', $file);
    }

    /**
     * Serve a post thumbnail.
     */
    public function postThumbnail(string $file): Response
    {
        return $this->streamFrom('post-thumbnails', $file);
    }

    /**
     * Serve a profile photo.
     */
    public function profilePhoto(string $file): Response
    {
        return $this->streamFrom('profile-photos', $file);
    }

    /**
     * Serve a committee photo.
     */
    public function committeePhoto(string $file): Response
    {
        return $this->streamFrom('committee-photos', $file);
    }

    /**
     * Stream a media file from the given public-disk subdirectory.
     */
    private function streamFrom(string $directory, string $file): Response
    {
        $path = $directory.'/'.basename($file);

        abort_unless(Storage::disk('public')->exists($path), 404);

        return Storage::disk('public')->response($path);
    }
}
