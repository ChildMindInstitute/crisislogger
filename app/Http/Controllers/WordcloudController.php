<?php

namespace App\Http\Controllers;

use App\Transcription;
use App\User;
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
    public function generate(Request $request){
        $user = auth()->user();
        $searchTxt = $request->get('searchTxt');

        return \response()->json($data);
    }
}
