<?php
//-----------------------------------------------------------------------------------------
// the variables you have to set
//-----------------------------------------------------------------------------------------
//movie dimensions
$w = 896;
$h = 672;

//server config
$dir = 'videos';
$playerurl = 'index.php';


//quicktime params
$bgcolor = '#000';
//page attributes
$websitename = 'Weddings';
$style = 'css/stylesheet.css';
$videopadding = 0; // number of pixels of padding
$viewport = 960; 
$dropdown = TRUE;

//content
$h1 = true;
$h2 = false;
$description = '';
$footer = '';

//-----------------------------------------------------------------------------------------
// rest of the php part, do not edit
//-----------------------------------------------------------------------------------------
include_once('php/videoplayer.php');
?>