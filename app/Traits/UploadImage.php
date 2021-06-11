<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait UploadImage{
    public function getImageFromBase64($imageReq)
    {
        
        $res = $imageReq;

        $image_array_1 = explode(";", $res);
        $image_array_2 = explode(",", $image_array_1[1]);
        
        $image = base64_decode($image_array_2[1]);
        $imageName = Str::random(25). time();
        $path = public_path('images/' . $imageName);
        file_put_contents($path, $image);
        return 'images/' . $imageName;
    } 
}
