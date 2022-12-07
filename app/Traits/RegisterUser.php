<?php

namespace App\Traits;
use App\Models\User;
use Session;

trait RegisterUser
{
    public function registerUser($fields)
    {
        Session::put($fields->username, $fields->password);
        $user = User::create([
            'username'  => $fields->username,
            'email'     => $fields->email,
            'password'  => $fields->password
        ]);
        return $user;
    }
}