<?php

namespace App\Http\Controllers;

use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Illuminate\Http\Response;
use Storage;

class TranscribeController extends Controller
{
    /**
     * @param string $name
     * @return \Illuminate\Http\JsonResponse
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function transcribeAudio(string $name){


        return response()->json($response, Response::HTTP_OK);
    }

}
