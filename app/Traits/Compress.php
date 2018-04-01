<?php namespace App\Traits;

trait Compress
{
    public function compress($source)
    {
        $info = getimagesize($source);

        $destination = 'newimage.jpg';

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);
        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);
        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, 30);

        return $destination;
    }
}

?>