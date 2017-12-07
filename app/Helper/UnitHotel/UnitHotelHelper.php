<?php

namespace App\Helper\UnitHotel;

class UnitHotelHelper
{
  public static function readMoreHelper($story_desc, $chars = 25) {
    mb_internal_encoding("UTF-8");
	$story_desc = mb_substr($story_desc,0,$chars);
	$story_desc = mb_substr($story_desc,0,strrpos($story_desc,' '));
	//$story_desc = $story_desc." <a href='#'>Read More...</a>";
	return $story_desc;
}
}
