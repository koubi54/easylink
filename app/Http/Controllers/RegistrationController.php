<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\RegisterFinalRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\RegisterUser;

class RegistrationController extends Controller
{
    use RegisterUser;

    public function show()
    {
        return view('user.register');
    }

    public function register(RegistrationRequest $requestFields)
    {
        $user = $this->registerUser($requestFields);

        if (Auth::attempt(['email' => $requestFields->email, 'password' => $requestFields->password]))
        {
            return redirect()->route('dashboard', Auth::user()->username);
        }
        return "bad";
    }

    public function registerFinalShow($username)
    {
        return view('user.register-final');
    }

    public function registerFinal(RegisterFinalRequest $requestFields)
    {
        auth()->user()->update($requestFields->only(['fullname', 'phone']));

        return redirect()->route('dashboard', Auth::user()->username);
    }

}
