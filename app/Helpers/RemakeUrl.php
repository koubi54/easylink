<?php

namespace App\Helpers;

class RemakeUrl
{
    public function makeBrand($url)
    {
        $parse = parse_url($url);
        $url = preg_replace('#^www\.(.+\.)#i', '$1', $parse['host']);

        if($url == 't.me'){
            $brand = 'telegram';
        } else if($url == 'wa.me'){
            $brand = 'whatsapp';
        } else {
            $brand = substr($url, 0, strpos($url, "."));
        }

        return $brand;
    }
}
