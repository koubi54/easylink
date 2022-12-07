<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use Exception;
use Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
        return view('user.login');
    }

    public function authenticate(LoginRequest $requestFields)
    {
        try{
            $attributes = $requestFields->only(['email', 'password']);

            if(Auth::attempt($attributes)){
                return redirect()->route('dashboard', Auth::user()->username);
            } else {
                return redirect()->back();
            }

        } catch (Exception $e){
            dd($e->getMessage());
        }
    }

    public function logout()
    {
        Session::forget('_token');
        Auth::logout();
        return redirect()->route('guest.index');
    }


    /**
     * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    /**
    * Obtain the user information from Google.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->route('dashboard', $finduser->username);

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'username' => $user->id,
                    'password' => $user->id
                ]);

                $attributes = $newUser->only(['email', 'google_id']);

                if (Auth::attempt(['email' => $newUser->email, 'password' => $newUser->google_id, 'google_id' => $newUser->google_id])) {
                    return redirect()->route('dashboard', $newUser->username);
                }
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
