<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Texts;
use App\Transcription;
use App\Upload;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'unique:users', 'email', 'max:255'],  //we don't do a email validation this step.
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'referral_code' => ['nullable', 'string', 'max:255'],
            'filename' => ['nullable', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = new User();
        $user->name = !isset($data['name']) ? 'unnamed': $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'] == null ? null : Hash::make($data['password']);
        if (session()->has('country'))
        {
            $user->country = session()->get('country');
        }
        if (session()->has('state'))
        {
            $user->state = session()->get('state');
        }
        if (isset($data['referral_code']))
        {
            $user->referral_code = $data['referral_code'];
        }
        $user->save();
        if (session()->has('upload_id'))
        {
            $upload = Upload::whereKey(session()->get('upload_id'))->first();
            if ($upload)
            {
                $upload->user_id = $user->getKey();
                $upload->update();
                $transaction = Transcription::where('upload_id', $upload->getKey())->first();
                if ($transaction)
                {
                    $transaction->user_id = $user->getKey();
                    $transaction->update();
                }
                session()->forget('upload_id');
            }
        }

        if (session()->has('text_id'))
        {
            $text = Texts::whereKey(session()->get('text_id'))->first();
            if ($text)
            {
                $text->user_id = $user->getKey();
                $text->update();
                session()->forget('text_id');
            }
        }

        session()->put('country', $request->country);
        session()->put('state', $request->state);
        if (isset($data['referral_code'])) {
            session()->put('referral_code', $data['referral_code']);
        }
        session()->put('registered', $user->id);

      if (session()->has('need-to-question-air') && !isset($data['referral_code']))
        {
            session()->forget('need-to-question-air');
            $this->redirectTo = '/questionnaire';
        }

//        $this->redirectTo = '/openhumans/authenticate';

        return $user;
    }
}
