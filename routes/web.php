<?php

use App\Posts;
use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage')->name('home');
Route::view('/committee', 'committee-full')->name('committee');
Route::view('/blogs', 'blogs.index')->name('blogs');
Route::get('/blogs/{post}', function (string $post) {
    $post = Posts::find($post);

    abort_unless($post !== null, 404);

    return view('blogs.show', ['post' => $post]);
})->name('blogs.show');

Route::view('/constitution', 'constitution')->name('constitution');
