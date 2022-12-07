<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tracker;
use Illuminate\Http\Request;
use Auth;

class TrackController extends Controller
{
    public function trackShow()
    {
        $tracker = Tracker::with('link')->whereHas('link', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        $total = $tracker->sum('total');

        return view('user.settings.analytics', compact('tracker', 'total'));
    }

    public function track(Request $request)
    {
        $link = Link::find($request->id);
        $ip = $request->ip();
        $links = Session::get('link-' . $link->id);

        if (isset($links)) {
            if (in_array($ip, $links)) {

                $link->hit();

                return 'it is not first time';

            } else {

                array_push($links, $ip);

                Session::put('link-' . $link->id, $links);

                $link->hit($new_user = 1);

                return Session::all();
            }
        } else {
            $links = array();
            array_push($links, $ip);
            Session::put('link-' . $link->id, $links);

            $link->hit($new_user = 1);

            return Session::all();
        }

        return Session::all();

        return response()->json([
            'data' => 'hit'
        ]);
    }
}
