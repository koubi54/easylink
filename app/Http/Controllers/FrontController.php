<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FrontController extends Controller
{
    public function index()
    {
        return view('layouts.app');
    }

    public function public($username)
    {
        $user = User::where('username', $username)->with('links')->withCount('links')->first();

        if($user){
            return view('public_view', compact('user'));
        }
    }
}
