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
        $response = [
            'message' => 'Uploaded successfully.'
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
