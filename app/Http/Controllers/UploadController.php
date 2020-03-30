<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request){
        $file = $request->file('audio_data')->store('uploads');

        $response = [
            'message' => 'Uploaded successfully.',
            'file' => $file
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
