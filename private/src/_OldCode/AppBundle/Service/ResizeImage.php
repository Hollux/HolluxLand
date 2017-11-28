<?php
/**
 * Created by PhpStorm.
 * User: amarchan
 * Date: 10/11/2016
 * Time: 13:57
 */
namespace AppBundle\Service;

class ResizeImage
{
	function resize_image($file, $w, $h, $destination, $crop = false)
	{
		list($width, $height) = getimagesize($file);
		$r = $width / $height;
		if($crop) {
			if($width > $height) {
				$width = ceil($width - ($width * abs($r - $w / $h)));
			}
			else {
				$height = ceil($height - ($height * abs($r - $w / $h)));
			}
			$newwidth  = $w;
			$newheight = $h;
		}
		else {
			if($w / $h > $r) {
				$newwidth  = $h * $r;
				$newheight = $h;
			}
			else {
				$newheight = $w / $r;
				$newwidth  = $w;
			}
		}
		//detectImage($file)
		$src = false;
		$imgType = exif_imagetype($file);
		switch($imgType) {
			case IMAGETYPE_JPEG: $src = imagecreatefromjpeg($file);  break;
			case IMAGETYPE_PNG: $src = imagecreatefrompng($file);  break;
			case IMAGETYPE_GIF: $src = imagecreatefromgif($file); break;
			case IMAGETYPE_BMP: $src = imagecreatefromwbmp($file);  break;
		}

		if(!$src)
			return false;

		$dst = imagecreatetruecolor($newwidth, $newheight);
		imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		imagejpeg($dst, $destination);

		return true;
	}
}