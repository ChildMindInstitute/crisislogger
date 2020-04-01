<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('questionnaire', function () {
    return view('pages.questionnaire.index');
})->name('questionnaire');

Route::prefix('capture')->group(function() {

    Route::get('/', function () {
        return view('pages.capture.choose-method');
    })->name('capture');

    Route::get('audio', function () {
        return view('pages.capture.capture-audio');
    })->name('capture-audio');

    Route::get('video', function () {
        return view('pages.capture.capture-video');
    })->name('capture-video');

    Route::get('create', function () {
        return view('pages.capture.create-account');
    })->name('capture-create-account');

});

Route::middleware('auth')->group(function(){

    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::get('profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::get('word-clouds', function () {
        return view('pages.word-clouds');
    })->name('word-clouds');

});

Auth::routes();
