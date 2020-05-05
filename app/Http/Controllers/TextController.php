<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Texts;
use App\Transcription;
use App\Upload;
use Faker\Provider\Text;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TextController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
    }

    public function userTexts(Request $request)
    {
        $texts = Texts::where('user_id', \auth()->user()->id)->paginate(12);
        return \response()->json( $texts);
    }
}
