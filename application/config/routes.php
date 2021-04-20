<?php defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']    = "home";
$route['admin']  				= "access/users/login";
$route['user']   				= "access/subscriber/login";

// Frontend Route
$route['404_override']          = '';
$route['topic']                 = "home/topic";
$route['gallery/image']         = "home/image_gallery";
$route['gallery/video']         = "home/video_gallery";
