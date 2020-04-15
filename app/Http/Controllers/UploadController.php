<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Texts;
use App\Transcription;
use App\Upload;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Storage;
use Auth;

class UploadController extends Controller
{

    /**
     * @param UploadRequest $request
     * @return JsonResponse
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function upload(UploadRequest $request){
        $file_extension = $request->file('data')->guessExtension();
        $file = Storage::disk('gcs')->putFile('', $request->file('data'));

        // Store the file name in the session in case the user decides to sign up.
        Session::put('filename', $file);
        // Save it in the database
        $upload = new Upload();
        $upload->name = $file;
        $upload->share = $request->share;
        $upload->contribute_to_science = $request->contribute;
        // If we are logged in, save that user's id
        if(Auth::user()) $upload->user_id = Auth::user()->id;

        if($request->has('voice')){
            $upload->voice = $request->voice;
        }
        else
        {
            $upload->voice = 'parent';
        }
        if (Auth::check())
        {
            Auth::user()->uploads()->save($upload);
        }
        else {
            $upload->save();
            session()->put('upload_id', $upload->getKey());
        }
        $redirect = route('capture-create-account');
        // Check and see if the user needs to be redirected to the questionnaire page (if sharing)
        if($upload->contribute_to_science && (!Auth::check() || Auth::user() && !Auth::user()->questionaires())){
            session()->put('need-to-question-air', 1);
        }
        // If the are contributing to science, we will transcribe the message and save it
        if($upload->contribute_to_science){
            if($file_extension == 'wav' || $file_extension == 'mp3'){
                $transcription = Transcription::audio($upload);
            } else {
                $transcription = Transcription::video($upload);
            }
        }
        $response = [
            'message' => 'File uploaded successfully.',
            'file' => $file,
            'redirect' => $redirect,
            'transcription' => $transcription->id ?? null
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function saveText(UploadRequest $request)
    {
        // Save it in the database
        $text = new Texts();
        $text->text = $request->data;
        $text->share = $request->share;
        $text->contribute_to_science = $request->contribute;
        // If we are logged in, save that user's id
        if($request->has('voice')){
            $text->voice = $request->voice;
        }
        else
        {
            $text->voice = 'parent';
        }
        if (Auth::check())
        {
            Auth::user()->texts()->save($text);
        }
        else {
            $text->save();
            session()->put('text_id', $text->getKey());
        }
        $redirect = route('capture-create-account');
        // Check and see if the user needs to be redirected to the questionnaire page (if sharing)
        //if(!$upload->share){
        if($text->contribute_to_science && (!Auth::check() || Auth::user() && !Auth::user()->questionaires())){
            session()->put('need-to-question-air', 1);
        }
        // If the are contributing to science, we will transcribe the message and save it
        $response = [
            'message' => 'ONE MORE STEP: Enter your email address on the next screen for us to log your text.',
            'redirect' => $redirect,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
