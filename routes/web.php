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

use App\Upload;
Route::group(array('domain' => '{subdomain}.'.config('app.app_domain').''), function () {
    Route::get('/', function ($subdomain) {
        session()->put('subdomain', $subdomain);
        if (view()->exists('pages.subdomain.'.$subdomain.'.index'))
        {
            return view('pages.subdomain.'.$subdomain.'.index');
        }
        return App::abort(404);
    });
    Route::prefix('capture')->group(function () {
        Route::get('/audio', function ($subdomain) {
            return view('pages.subdomain.'.$subdomain.'.capture.capture-audio');
        })->name('capture-audio');
        Route::get('video', function ($subdomain) {
            return view('pages.subdomain.'.$subdomain.'.capture.capture-video');
        })->name('capture-video');
        Route::get('text', function ($subdomain) {
            return view('pages.subdomain.'.$subdomain.'.capture.capture-text');
        })->name('capture-text');
    });
    Route::get('questionnaire', function ($subdomain) {
        return view('pages.subdomain.'.$subdomain.'.questionnaire.index');
    })->name('questionnaire');
});
Route::get('/', function () {
    session()->remove('subdomain');
    return view('pages.index');
})->name('home');

Route::get('questionnaire', function () {
    return view('pages.questionnaire.index');
})->name('questionnaire');

Route::prefix('capture')->group(function () {
    Route::get('/', function () {
        return view('pages.capture.choose-method');
    })->name('capture');

    Route::get('audio', function () {
        return view('pages.capture.capture-audio');
    })->name('capture-audio');

    Route::get('video', function () {
        return view('pages.capture.capture-video');
    })->name('capture-video');

    Route::get('text', function () {
        return view('pages.capture.capture-text');
    })->name('capture-text');

    Route::get('create', function () {
        return view('pages.capture.create-account');
    })->name('capture-create-account');

    Route::get('choice', function () {
        return view('pages.capture.choice');
    })->name('capture-choice');

});

Route::get('/open-humans', function () {
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'https://www.openhumans.org/direct-sharing/projects/oauth2/authorize/?',
        'response_type' => 'code',
        'scope' => ''
    ]);

    return redirect('http://127.0.0.1:8000/oauth/authorize?' . $query);
});

Route::get('/callback', function (Request $request) {
    $response = (new GuzzleHttp\Client)->post('http://127.0.0.1:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 3,
            'client_secret' => 'CLIENT_SECRET',
            'redirect_uri' => 'http://127.0.0.1:8001/callback',
            'code' => $request->code,
        ]
    ]);

    session()->put('token', json_decode((string)$response->getBody(), true));

    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {

    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::post('close-account', 'UserController@closeAccount')->name('close-account');
    Route::get('remove', 'UserController@removeResource')->name('remove');
    Route::get('profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::get('word-clouds', function () {
        return view('pages.word-clouds');
    })->name('word-clouds');

});

Route::prefix('admin')->group(function () {
    Route::get('', 'AdminController@index')
      ->name('admin-index')
      ->middleware('can:admin');

    Route::get('video', 'AdminController@video')
      ->name('admin-video')
      ->middleware('can:admin');

    Route::get('audio', 'AdminController@audio')
      ->name('admin-audio')
      ->middleware('can:admin');

    Route::get('text', 'AdminController@text')
      ->name('admin-text')
      ->middleware('can:admin');

    Route::post('hide', 'AdminController@hide')
      ->name('admin-hide')
      ->middleware('can:admin');

    Route::post('rank', 'AdminController@rank')
      ->name('admin-rank')
      ->middleware('can:admin');

});

Auth::routes();

// override login
//Route::get('/login', 'OpenHumansController@login')->name('login');

Route::get('openhumans/authenticate', 'OpenHumansController@authenticate')->name('openhumans-authenticate');
Route::get('openhumans/redirect', 'OpenHumansController@redirect');
Route::get('openhumans/refreshToken', 'OpenHumansController@refreshToken');
Route::get('openhumans/getProjectMembers', 'OpenHumansController@getProjectMembers');
Route::get('openhumans/getProjectInformation', 'OpenHumansController@getProjectInformation');

Route::get('/getCountries', 'CountryController@getCountries');
Route::get('/getStates/{id}', 'CountryController@getStates');
Route::get('/getCities/{id}/{name}', 'CountryController@getCities');

