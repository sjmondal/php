<?php 
public function image_resize($fileResource,$new_name,$thumb_path,$new_width='',$new_height=''){

		list($width_orig, $height_orig) = getimagesize($fileResource);
		$mimeType = getimagesize($fileResource)['mime'];
		if($width_orig>=$height_orig){
		$ratio_orig = $height_orig/$width_orig;
		}else{
		$ratio_orig = $width_orig/$height_orig;	
		}
		if($new_width){
		$new_height = $new_width*$ratio_orig;
		}
		else{
		$new_width = $new_height*$ratio_orig;
		}

		// resample
		$image_p = imagecreatetruecolor($new_width, $new_height);
		$image ='';
	
	switch($mimeType){
		case 'image/png':
		$image = imagecreatefrompng($fileResource);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
		$res = imagepng($image_p, $thumb_path.$new_name, 9);
		break;
		case 'image/jpeg':
		$image = imagecreatefromjpeg($fileResource);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
		$res = imagejpeg($image_p, $thumb_path.$new_name, 100);
		break;
		case 'image/pjpeg':
		$image = imagecreatefromjpeg($fileResource);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
		$res = imagejpeg($image_p, $thumb_path.$new_name, 100);
		break;
		case 'image/gif':
		$image = imagecreatefromgif($fileResource);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
		$res = imagegif($image_p, $thumb_path.$new_name, 100);
		break;
		default:
	}
	
	return $new_name;
}
?>