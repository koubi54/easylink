<?php

namespace App\Helpers;

class ImageColors
{
    public function dominantColors($images)
    {
        if (isset($images))
        {
            $array = array();
            $loop = 0;
            foreach($images as $image){
                $PREVIEW_WIDTH    = 150;  //WE HAVE TO RESIZE THE IMAGE, BECAUSE WE ONLY NEED THE MOST SIGNIFICANT COLORS.
                $PREVIEW_HEIGHT   = 150;
                if(@getimagesize($image) && $loop != 3){
                    $size = GetImageSize($image);
                    $scale=1;
                    if ($size[0]>0)
                    $scale = min($PREVIEW_WIDTH/$size[0], $PREVIEW_HEIGHT/$size[1]);
                    if ($scale < 1)
                    {
                        $width = floor($scale*$size[0]);
                        $height = floor($scale*$size[1]);
                    }
                    else
                    {
                        $width = $size[0];
                        $height = $size[1];
                    }
                    $image_resized = imagecreatetruecolor($width, $height);
                    if ($size[2]==1)
                    $image_orig=imagecreatefromgif($image);
                    if ($size[2]==2)
                    $image_orig=imagecreatefromjpeg($image);
                    if ($size[2]==3)
                    $image_orig=imagecreatefrompng($image);
                    imagecopyresampled($image_resized, $image_orig, 0, 0, 0, 0, $width, $height, $size[0], $size[1]); //WE NEED NEAREST NEIGHBOR RESIZING, BECAUSE IT DOESN'T ALTER THE COLORS
                    $im = $image_resized;
                    $imgWidth = imagesx($im);
                    $imgHeight = imagesy($im);
                    for ($y=0; $y < $imgHeight; $y++)
                    {
                        for ($x=0; $x < $imgWidth; $x++)
                        {
                            $index = imagecolorat($im,$x,$y);
                            $Colors = imagecolorsforindex($im,$index);
                            $Colors['red']=intval((($Colors['red'])+15)/32)*32;    //ROUND THE COLORS, TO REDUCE THE NUMBER OF COLORS, SO THE WON'T BE ANY NEARLY DUPLICATE COLORS!
                            $Colors['green']=intval((($Colors['green'])+15)/32)*32;
                            $Colors['blue']=intval((($Colors['blue'])+15)/32)*32;
                            if ($Colors['red']>=256)
                            $Colors['red']=240;
                            if ($Colors['green']>=256)
                            $Colors['green']=240;
                            if ($Colors['blue']>=256)
                            $Colors['blue']=240;

                            $hexarray[]=substr("0".dechex($Colors['red']),-2).substr("0".dechex($Colors['green']),-2).substr("0".dechex($Colors['blue']),-2);
                        }
                    }
                    array_push($array, $hexarray);
                    $loop+=1;
                }
            }

            $hexarray=array_count_values($hexarray);

            natsort($hexarray);

            $hexarray=array_reverse($hexarray,true);

            $hexarray = array_flip($hexarray);

            $hexarray = implode(",\n", $hexarray);

            $arr = explode(',', $hexarray);

            if(count($arr) <= 8 ){
                $loop = count($arr);
            } else {
                $loop = 8;
            }
            $cols = array();
            for ($i=0; $i < $loop; $i++) {
                array_push($cols, $arr[$i]);
            }

            $cols = implode(",\n", $cols);

            return $cols;
        }
    }
}
