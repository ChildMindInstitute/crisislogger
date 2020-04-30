<?php

namespace App\Http\Controllers;

use App\Transcription;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response;

class WordcloudController extends Controller
{
    /**
     * @param string $text
     * @return array
     */
    private function generateWords(string $text){
        $words = explode(' ', $text);
        $array_diff = array_diff($words, Transcription::commonWords);

        return array_count_values($array_diff);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function generate(){
        $user = Auth::user();

        // Get a list of transcriptions
        /** @var Transcription[] $transcriptions */
        $transcriptions = $user->transcriptions()->get();
        $words = [];

        // Loop through the transcriptions and get a list of words
        foreach($transcriptions as $transcription){


            $words[$transcription->upload_id] = $this->generateWords($transcription->text);
        }

        return response()->json($words, Response::HTTP_OK);
    }
}
