<?php
include('resize_crop.php');

function prov($per){
	if (isset($per)) {
		$per = stripslashes($per);
		$per = htmlspecialchars($per);
		$per = addslashes($per);		 
	}
	return $per;
}

function debug_to_console( $data ) {
	echo $data;
}

if(isset($_POST)){
	$filenew = time().rand(100,999).'.jpg';
	
	$x1 = prov($_POST['x1']);
	$x2 = prov($_POST['x2']);
	$y1 = prov($_POST['y1']);
	$y2 = prov($_POST['y2']);
	$img = prov($_POST['img']);
	$crop = prov($_POST['crop']);
	$w = prov($_POST['w']);
	$h = prov($_POST['h']);

	$new_foto = 0;
	resize($img, $new_foto.$filenew, $w, $h); 
	crop($new_foto.$filenew, $crop.$filenew, array($x1, $y1, $x2, $y2));	
	
	echo $filenew;

}




?>