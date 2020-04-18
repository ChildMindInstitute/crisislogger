<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Texts;
use App\Upload;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
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
    public function removeResource(Request $request)
    {
        $type = $request->get('type');
        $id = $request->get('id');
        try {
            \DB::beginTransaction();
            if ($type ==='text')
            {
                $text = Texts::findOrFail($id);
                if ($text)
                {
                    $text->forceDelete();
                }
            }
            if ($type === 'upload')
            {
                $upload = Upload::findOrFail($id);
                if ($upload)
                {
                    if (count($upload->transcript()->get()))
                    {
                        $upload->transcript()->forceDelete();
                    }
                    $upload->forceDelete();
                }
            }
            \DB::commit();
        }
        catch (\Exception $exception)
        {
            \DB::rollBack();
            \Session::flash('session_error', $exception->getMessage());
            return redirect('/dashboard');
        }
        \Session::flash('session_success', 'Successfully deleted');
        return redirect('/dashboard');
    }

    public function updateResourceStatus(Request $request)
    {
        $id = $request->get('id');
        $type = $request->get('type');
        $status = $request->get('status');
        $contentType = $request->get('contentType');
        try {
            if ($type === 'text')
            {
                $text = Texts::findOrFail($id);
                if ($text)
                {
                    \DB::beginTransaction();
                    if ($contentType ==='contribute')
                    {
                        $text->contribute_to_science = $status;
                    }
                    else {
                        $text->share = $status;
                    }
                    $text->update();
                    \DB::commit();
                }
            }
            if ($type ==='upload')
            {
                $upload = Upload::findOrFail($id);
                if ($upload)
                {
                    \DB::beginTransaction();
                    if ($contentType ==='contribute')
                    {
                        $upload->contribute_to_science = $status;
                   }
                    else {
                        $upload->share = $status;
                    }
                    $upload->update();
                    \DB::commit();
                }
            }
        }
        catch (\Exception $exception)
        {
            \DB::rollBack();
            \Session::flash('session_error', $exception->getMessage());
            return \Response::json(
                ['url' => route('dashboard')]
            );
        }
        \Session::flash('session_success', 'Successfully updated');
        return \Response::json(
            ['url' => route('dashboard')]
        );
    }
}
