<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        auth()->user()->update($request->only(['fullname', 'location', 'bio']));

        return back();
    }

    public function updateAvatar(Request $request)
    {
        $validate = $this->validate($request, [
            'photo' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($image = $request->file('photo')) {

            if (Auth::user()->photo != 'default.jpg') {
                @unlink(Auth::user()->photo);
            }

            $image_one_name = \hexdec(\uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('user/' . $image_one_name);
            $photo = 'user/' . $image_one_name;

            auth()->user()->update(['photo' => $photo]);

            return response()->json([
                'success' => true,
                'photo' => $photo
            ]);
        }

        return response()->json([
            'success' => false,
            'photo' => ''
        ]);
    }

    public function settingsShow($username)
    {
        $user = User::where('username', $username)->first();

        if (Auth::id() == $user->id) {
            return view('user.settings.settings', compact('user'));
        }

        return redirect()->route('settings.show', Auth::user()->username);
    }

    public function updateUserDetails(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username,'.Auth::user()->id,
        ]);

        Auth::user()->update($request->only(['username']));

        return redirect()->route('dashboard', Auth::user()->username);
    }

    public function updatePassword(PasswordRequest $request)
    {
        Auth::user()->update($request->only(['password']));

        return redirect()->route('dashboard', Auth::user()->username);
    }
}
