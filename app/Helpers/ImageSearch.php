<?php

namespace App\Helpers;

class ImageSearch
{
    public function search($brand){

        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://bing-image-search1.p.rapidapi.com/images/search?q=".$brand.'+logo+png',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: your host here", //configure host
        "x-rapidapi-key: your api key here", //configure api key
        'Content-Type: application/json',
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $array = json_decode($response, true);

            return $array;
        }
    }
}
