<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Auth;
use Hash;
use function GuzzleHttp\Psr7\uri_for;

class UserController extends Controller
{
    /**
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request){
        $user = Auth::user();
        $user->name = $request->name;

        // Check and see if the email is the same, or if they want to change it
        if($request->email != $user->email){
            // Check and see if the email already exists
            $email_exists = User::where('email', $request->email)
                ->where('id', '!=', $user->id)
                ->first();
            if($email_exists){
                return back()->withErrors(['email' => 'This email already exists.']);
            }
            $user->email = $request->email;
        }
        $user->save();

        return back()->with('profile_success', 'Your profile has been successfully updated.');
    }

    /**
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(ChangePasswordRequest $request){
        // Validate that the old password matches
        $user = Auth::user();
        if(!Hash::check($request->old_password, $user->password)){
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('password_success', 'Your password has been successfully changed.');
    }
    public function closeAccount()
    {
        $user = User::findOrFail(Auth::user()->id);
        if (count($user->uploads()->get()))
        {
            $user->uploads()->forceDelete();
        }
        if (count($user->texts()->get()))
        {
            $user->texts()->forceDelete();
        }
        if (count($user->transcriptions()->get()))
        {
            $user->transcriptions()->forceDelete();
        }
        try {
            $user->delete();
            Auth::logout();
            return redirect('/');
        }
        catch (\Exception $exception)
        {
            \App::abort(400);
        }
    }
}
