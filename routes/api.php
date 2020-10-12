<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Auth\LoginController@simpeAuth')->name('temporary-auth');

Route::post('upload', 'UploadController@upload')->name('upload');
Route::post('save-text', 'UploadController@saveText')->name('save-text');
Route::prefix('convert')->group(function ()
{
    Route::post('/video', 'API\ConvertController@convertVideoTranscode');
});
Route::middleware('auth')->group(function(){
    Route::put('/update-resource-status', 'UserController@updateResourceStatus')->name('update-resource-status');
    Route::prefix('user')->group(function() {
        Route::post('update', 'UserController@update')->name('user_update');
        Route::post('change_password', 'UserController@changePassword')->name('user_change_password');
    });
    Route::get('word_cloud', 'WordcloudController@generate');
});
Route::prefix('transcribe')->group(function(){
   Route::get('audio/{name}', 'TranscribeController@transcribeAudio');
});
Route::resource('transcriptions', 'TranscribeController');
Route::get('user-transcription', 'TranscribeController@userTranscription');
Route::get('user-texts', 'TextController@userTexts');
Route::delete('remove-resource', 'UserController@removeResource');
Route::post('questionnaire', 'QuestionnaireController@upload')->name('questionnaire_form_upload');
Route::get('all-data', 'UserController@getAllData')->name('get_all_data');
