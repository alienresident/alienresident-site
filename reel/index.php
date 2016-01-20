<?php
//-----------------------------------------------------------------------------------------
// the variables you have to set
//-----------------------------------------------------------------------------------------
//movie dimensions
$w = 640;
$h = 480;

//server config
$folder = "/reel/";
$url = "http://" . $_SERVER['SERVER_NAME'] . "$folder";
$dir = 'Reel';

//quicktime params
$bgcolor = '#FFFFFF';
$autoplay = true;
$controller = true;
$kioskmode = true; //set to true to disallow users to save the movie
$scale = 'aspect'; //set to 'aspect' to maintian the correct aspect, 'tofit' to stretch the video or '1.5' or '2' to scale to 150% or 200%
//page attributes
$websitename = 'Mark Reilly&#039;s Reel';
$style = '../style/stylesheet.css';
$videopadding = 0; // number of pixels of padding

//video selection controls
$dropdown = true;
$scaler = false; //only works with dropdown
$numberedlist = false;

//content
$h1 = true;
$h2 = true;
$description = 'Use the Dropdown on the top right to view the other videos. Quicktime 7 is required';
$footer = '';

//-----------------------------------------------------------------------------------------
// rest of the php part, do not edit
//-----------------------------------------------------------------------------------------
include_once('php/videoplayer.php');
?>