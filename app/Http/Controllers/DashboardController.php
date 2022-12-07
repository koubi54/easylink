<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Image;
use Session;
use Auth;
use App\Events\LinkEvent;
use App\Jobs\GenerateLinkColor;

class DashboardController extends Controller
{
    public function index($username)
    {
        $user = User::where('id', Auth::id())->where('username', $username)->with('links')->withCount('links')->first();

        if ($user) {
            return view('user.dashboard', compact('user'));
        }

        return redirect()->route('dashboard', Auth::user()->username);
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->with('links')->withCount('links')->first();

        if (Auth::id() == $user->id) {
            return \view('user.edit', compact('user'));
        }

        return redirect()->route('edit', Auth::user()->username);
    }

    public function customize($username)
    {
        $user = User::where('username', $username)->first();

        if (Auth::id() == $user->id) {
            return view('user.customize', compact('user'));
        }

        return redirect()->route('customize', Auth::user()->username);
    }

    public function updateTheme(Request $request)
    {
        if (auth()->user()->update($request->only(['theme']))) {
            return response()->json([
                'success' => true,
                'theme' => $request->theme
            ]);
        } else {
            return response()->json([
                'success' => false,
                'theme' => $request->theme
            ]);
        }
    }
}
