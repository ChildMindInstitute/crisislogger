<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Storage;
use Auth;

class UploadController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request){
        $file = Storage::disk('public')->putFile('uploads', $request->file('audio_data'));

        // Store the file name in the session in case the user decides to sign up.
        // That way we can attribute this clip to the new user.
        // Prepend /storage/ to send back to the register controller so it can find the proper file if user registers
        $filename = '/storage/' . $file;
        Session::put('filename', $filename);
        // Save it in the database
        $upload = new Upload();
        $upload->name = $file;
        $upload->public = $request->public;
        $upload->transcribe = $request->transcribe;
        $upload->share = $request->share;
        $upload->contribute_to_science = $request->contribute;
        // If we are logged in, save that user's id
        if(Auth::user()) $upload->user_id = Auth::user()->id;
        $upload->save();

        $response = [
            'message' => 'File uploaded successfully.',
            'file' => $filename
        ];
        return response()->json($response, Response::HTTP_OK);
    }

}
