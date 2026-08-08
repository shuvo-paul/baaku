<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage')->name('home');
Route::view('/committee', 'committee-full')->name('committee');
Route::view('/blogs', 'blogs.index')->name('blogs');
Route::view('/blogs/{post}', 'blogs.show')->name('blogs.show');
