<?php
/**
 * Video Player Config: the Custom Variables You Can Set
 */

/**
 * Server Config
 */
$dir = 'video';
$playerurl = 'index.php';
$root_dir = ''; 
 
/**
 * Page Elements
 */
$websitename = 'Mark Reilly&#039;s Films';
$stylesheet = $root_dir . '../style/stylesheet.css';
$responsive = true;
$mediaelementplayer = false;
$dropdown = true;
$prev_next = false;
$prev_text = '<span class="hidden">Previous</span>';
$next_text = '<span class="hidden">Next</span>';
$playlist = false;
$playlist_descriptions = false;
$extended_description = true;

/**
 * Movie Dimensions
 */
$w = 640;
$h = 480;

/**
 * Video Parameters
 */
$html5_video = true;
$poster_image = true;
$video_tag_attributes = 'controls';
$flash_fallback = false;

/**
 * Content
 */
$header = true;
$h1 = false;
$h2 = true;
$heading2 = 'Films';
$footer = true;
$footer_text = '';

/**
 * Prettify Filenames and Add Playlist Descriptions
 */
$names_file = $root_dir . 'names.txt';
$playlist_descriptions_file = $root_dir . 'descriptions.txt';
$extended_descriptions_file = $root_dir . 'extended_descriptions.txt';

/**
 * Advanced Player Configurable Variables
 */
 
$offline = false; // for development only: use a local copy of jQuery rather than the Google CDN
   
/**
 * Filename Variables
 */
$dir_offset_start = 0; // remove the first 'n' characters from the directory name i.e. 3 = '01_' from O1_Artwork
$file_offset_start = 0; // remove the first 'n' characters from the filename
$file_offset_end = -3; // remove the last 'n' characters before file extension i.e. -3 will remove '-sd' from filename-sd.mp4

/**
 * CSS Body Classes
 */
$body_classes = "films player";

/**
 * Video sources, codecs, and media queries.
 *
 * What codecs and mediaquries are to be used with certain filenames: i.e '-sd' = (Standard Definition), 'avc1.64001E, mp4a.40.2' h264 high profile, aac audio.
 */
$video_sources = array();
//$video_sources[] = array('filename_stem' => '-hd', 'codec' => 'avc1.64001E, mp4a.40.2');
$video_sources[] = array('filename_stem' => '-sd', 'codec' => 'avc1.64001E, mp4a.40.2');
//$video_sources[] = array('filename_stem' => '-sm', 'codec' => 'avc1.42E01E, mp4a.40.2'); 
//$video_sources[] = array('filename_stem' => '-wb', 'codec' => 'vp8, vorbis');

/**
 * Which h264 File to Use a Flash Fallback
 */
$flash_fallback_source = '-sd';

/**
 * Rest of the Php Part, Do Not Edit
 */
include_once($root_dir . '../videoplayer/php/videoplayer.php');
?>