<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Upload;
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
     */
    public function upload(UploadRequest $request){
        $file = Storage::disk('public')->putFile('uploads', $request->file('data'));
        // Store the file name in the session in case the user decides to sign up.
        // That way we can attribute this clip to the new user.
        // Prepend /storage/ to send back to the register controller so it can find the proper file if user registers
        $filename = '/storage/' . $file;
        Session::put('filename', $filename);
        // Save it in the database
        $upload = new Upload();
        $upload->name = $file;
        $upload->share = $request->share;
        $upload->contribute_to_science = $request->contribute;
        // If we are logged in, save that user's id
        if(Auth::user()) $upload->user_id = Auth::user()->id;
        $upload->save();

        // Check and see if the user needs to be redirected to the questionnaire page (if sharing)
        if($upload->share){
            $redirect = route('questionnaire');
        } else {
            $redirect = route('capture-create-account');
        }

        $response = [
            'message' => 'File uploaded successfully.',
            'file' => $filename,
            'redirect' => $redirect
        ];
        return response()->json($response, Response::HTTP_OK);
    }

}
