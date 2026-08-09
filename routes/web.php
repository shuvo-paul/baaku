<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage')->name('home');
Route::view('/committee', 'committee-full')->name('committee');
Route::view('/blogs', 'blogs.index')->name('blogs');
Route::view('/blogs/{post}', 'blogs.show')->name('blogs.show');

Route::middleware(['auth', 'verified', 'user.state', 'complete-profile.check', 'permission:manage content'])
    ->prefix('dashboard')
    ->name('alumkit.')
    ->group(function () {
        foreach (['hero', 'about', 'announcement', 'stats', 'cta', 'nav', 'footer'] as $section) {
            Route::get("content/{$section}", [ContentController::class, 'edit'])
                ->defaults('section', $section)
                ->name("content.{$section}");
        }

        Route::put('content', [ContentController::class, 'update'])->name('content.update');
    });
