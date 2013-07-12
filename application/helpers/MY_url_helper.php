<?php


if ( ! function_exists('theme_url'))
{
	function theme_url($uri = '')
	{
		$CI =& get_instance();
		$base =  $CI->config->base_url();
                return "{$base}themes/".THEME_NAME."/";
                
	}
}