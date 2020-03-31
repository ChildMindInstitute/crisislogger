<?php

namespace App\Http\Controllers;

use App\Upload;
use Auth;
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
        $this->middleware('auth');
    }

    /**
     * Show the dashboard. If there are files to add to a user, add them.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard(){
        $user = Auth::user();
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

        return view('pages.dashboard');
    }

}
