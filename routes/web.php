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

Route::prefix('capture')->group(function() {

    Route::get('/', function () {
        return view('pages.capture.capture');
    })->name('capture');

    Route::get('create', function () {
        return view('pages.capture.create-account');
    })->name('capture-create-account');

});

Route::middleware('auth')->group(function(){

    Route::get('dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

});

Auth::routes();
