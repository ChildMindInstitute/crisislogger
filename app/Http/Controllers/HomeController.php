<?php

namespace App\Http\Controllers;

use App\Transcription;
use App\Upload;
use Auth;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'capture']);
    }

    /**
     * Show the dashboard. If there are files to add to a user, add them.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function dashboard(){
        $user = Auth::user();
        $domain  = \URL::to('/');
        // Check and see if there are any files in the session waiting to be added to a user
        if(Session::has('filename')){
            $upload = Upload::where('name', Session::get('filename'))->first();
            if($upload){
                $upload->user_id = $user->id;
                $upload->save();
            }
            // Clear the session
            Session::remove('filename');
        }

        // Check and see if there are any transcription in the session waiting to be added to a user
        if(Session::has('transcription')){
            $transcription = Transcription::where('id', Session::get('transcription'))->first();
            if($transcription){
                $transcription->user_id = $user->id;
                $transcription->save();
            }
            // Clear the session
            Session::remove('transcription');
        }
        $uploads = Auth::user()->uploads()->with('transcript')->where('video_generated', false)->where('where_from', $domain)->get();
        $texts = Auth::user()->texts()->where('where_from', $domain)->get();
        return view('pages.dashboard', compact('uploads', 'texts'));
    }
}
