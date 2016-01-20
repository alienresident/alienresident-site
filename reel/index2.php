<?php
//-----------------------------------------------------------------------------------------
// the variables you have to set
//-----------------------------------------------------------------------------------------


//server config
$folder = "/reel/";
$url = "http://" . $_SERVER['SERVER_NAME'] . "$folder". ".$d";
$d = "Reel"; 
//$d = $_GET["d"];
$dirL = "../".$d;
//site info
$websitename = 'Mark Reilly&#039;s Reel';

//movie dimensions
$w = 640;
$h = 480;
//page styles
$style = '../../style/stylesheet.css';

//flash params
$bgcolor = '#FFFFFF';

$autostart = false;
$fullscreen = true;
$bufferlength = "2";
$videoPlaylistSize = 200; //size in pixels
$controlbar = ""; // leave blank for bottom otherwise use 'over' or 'none';

//content
$h1 = true;
$description = 'Use the playlist below the video to view the other videos.';
$footer = '';

//-----------------------------------------------------------------------------------------
// rest of the php part, do not edit
//-----------------------------------------------------------------------------------------
include_once('php/flvplayer.php');
?>