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

if ( ! function_exists('theme_dir'))
{
	function theme_dir($uri = '')
	{
		//$CI =& get_instance();
		//$theme_dir = $CI->config->item("admin_dir"); 
                return THEME_DIR."/{$uri}";
                
	}
}

if ( ! function_exists('admin_url'))
{
	function admin_url($uri = '')
	{
		$CI =& get_instance();
		$admin_dir = $CI->config->item("admin_dir"); 
                //echo "<h1>$admin_dir</h1>";
                $base =  $CI->config->site_url();
                return "{$base}$admin_dir{$uri}";
              
                
	}
}