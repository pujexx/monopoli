<?php

/**
 * Get image form gravatar.com
 *
 * @parameter email  	email address
 * @parameter with 		with image
 * sample usage
 *********************************************************************
 * $this->load->helper("gravatar");
 * echo gravatar_img("example@example.com");
 * //or with width value
 * echo gravatar_img("example@example.com",20);
 *********************************************************************
 */

if(!function_exists('gravatar_img')){
	function gravatar_img($email="",$width=""){
		$src= trim($email);
		$src = md5(strtolower($src));
		if($width==""){
			$img = "<img src='http://www.gravatar.com/avatar/".$src."' />";
		}
		else {
			$img =  "<img src='http://www.gravatar.com/avatar/".$src."?s=".$width."'/>";
		}
		return $img;

	}
}
?>