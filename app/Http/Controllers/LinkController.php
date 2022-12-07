<?php

namespace App\Http\Controllers;

use App\Helpers\ImageColors;
use App\Helpers\ImageSearch;
use App\Helpers\RemakeUrl;
use App\Models\Link;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Auth;

class LinkController extends Controller
{
    protected $link;

    protected $remakeUrl;

    protected $imageColors;

    protected $imageSearch;

    protected $socialLink;

    public function __construct(Link $link, RemakeUrl $remakeUrl, ImageColors $imageColors, ImageSearch $imageSearch, SocialLink $socialLink)
    {
        $this->link = $link;

        $this->remakeUrl = $remakeUrl;

        $this->imageColors = $imageColors;

        $this->imageSearch = $imageSearch;

        $this->socialLink = $socialLink;
    }

    public function searchFromDatabase(Request $request)
    {
        $link = $request->link;

        $brand = $this->remakeUrl->makeBrand($link);

        if ($brand = $this->socialLink->where('brand', $brand)->first()) {
            return response()->json([
                'brand' => $brand,
                'success' => true
            ]);
        }
        return response()->json([
            'success' => false
        ]);
    }

    public function createLink(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required'
        ]);

        $link = $request->link;
        $name = $request->name;
        $user = Auth::user();

        // Check If given url is email address
        if (!strpos($link, '@')) {

            // Make brand from given url
            $brand = $this->remakeUrl->makeBrand($link);

            $linkFromDatabase = $this->socialLink->where('brand', $brand)->first();
            if ($linkFromDatabase) {
                $cols = $linkFromDatabase->palette;
            } else {

                // Get Bing Image results for Brand
                $array = $this->imageSearch->search($brand);

                if(array_key_exists('messages', $array)){
                    return "cURL Error: ".$array['messages'];
                }

                $array = array_slice($array['value'], 0, 5);
                $images = array_column($array, 'contentUrl');

                // Get the most used colors code from Image
                $cols = $this->imageColors->dominantColors($images);

                $this->socialLink->create([
                    'brand' => $brand,
                    'palette' => $cols
                ]);
            }
        } else {

            // Set Standard Color for All types of Email Links
            $brand = 'mail';
            for ($i = 0; $i < 2; $i++) {
                $cols = '4c4c4c';
            }
        }
        $user->links()->create([
            'name' => $name,
            'link' => $link,
            'brand' => $brand,
            'colors' => $cols
        ]);

        return redirect()->route('dashboard', Auth::user()->username);
    }

    public function updateLink(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
        ]);

        $link = $this->link->find($request->id);

        $url = $request->link;

        // Check If given url is email address
        if (!strpos($url, '@')) {

            // Make brand from given url
            $brand = $this->remakeUrl->makeBrand($url);

            // Check if the same brand inserted
            if ($link->brand != $brand) {

                $linkFromDatabase = $this->socialLink->where('brand', $brand)->first();

                if ($linkFromDatabase) {
                    $cols = $linkFromDatabase->palette;
                } else {
                    // Get Bing Image results for Brand
                    $array = $this->imageSearch->search($brand);

                    $array = array_slice($array['value'], 0, 5);
                    $images = array_column($array, 'contentUrl');

                    // Get the most used colors code from Image
                    $cols = $this->imageColors->dominantColors($images);

                    $this->socialLink->create([
                        'brand' => $brand,
                        'palette' => $cols
                    ]);
                }
            } else {
                $cols = $link->colors;
            }
        } else {

            // Set Standard Color for All types of Email Links
            $brand = 'mail';
            for ($i = 0; $i < 2; $i++) {
                $cols = '4c4c4c';
            }
        }

        $link->name = $request->name;
        $link->link = $request->link;
        $link->brand = $brand;
        $link->colors = $cols;
        $link->save();

        return redirect()->route('dashboard', Auth::user()->username)
            ->with('Succeed');
    }

    public function deleteLink(Request $request)
    {
        $this->link->find($request->id)->delete();

        return redirect()->back();
    }
}
