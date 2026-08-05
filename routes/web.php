<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage')->name('home');
Route::view('/committee', 'committee-full')->name('committee');
Route::view('/committee/b', 'committee-full-b')->name('committee.b');
Route::view('/committee/c', 'committee-full-c')->name('committee.c');
Route::view('/committee/d', 'committee-full-d')->name('committee.d');
Route::view('/committee/e', 'committee-full-e')->name('committee.e');
