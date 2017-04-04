<?php include_once('preg-find.php');

function video_code(&$video_code) {
//load the names files
$file_handle = fopen("names.txt", "rb");
  while (!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    $parts = explode(',', $line_of_text);
    // use each line to do a replace folder and files names to create 
    $video_code = preg_replace($parts[0],$parts[1],$video_code);
  }
  fclose($file_handle);                                                      
  return $video_code;
} 

function set_title(&$video_title) {
  global $video_title;
}

?>
<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title><?php print $websitename ?></title>  
  <meta name="viewport" content="width=<?php print $viewport ?>" />

  <!-- Style Sheets -->
  <style type="text/css" media="screen">@import url("<?php print $style ?>");</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
  <script src="js/mediaelement-and-player.min.js"></script>
  <link rel="stylesheet" href="css/mediaelementplayer.min.css" />   
  <script>
  function reload(form) {
      var val=form.dirurl.options[form.dirurl.options.selectedIndex].value; 
      self.location='<?php print $playerurl?>?dirurl=' + val ;
    }
    function reload2(form) {
      var val=form.dirurl.options[form.dirurl.options.selectedIndex].value;
      var val2=form.fileurl.options[form.fileurl.options.selectedIndex].value; 
      self.location='<?php print $playerurl?>?dirurl=' + val + '&fileurl=' + val2 ;
    }
  </script>
</head>
<body>
  <div id="main">
    <!-- the navigation -->
    <div id="videonav"> 
<?php if($dropdown) {
  print '<form action="'.$_SERVER['PHP_SELF'].'" method="get">';
  print "\n";
  print "<select name='dirurl' onchange=\"reload(this.form)\">\n<option value=''>Select a Directory</option>\n";

  $dirs = preg_find('/./', $dir, PREG_FIND_DIRONLY);
  @$dirurl = $_GET['dirurl']; //This line is added to take care if your global variable is off  
  asort($dirs);
  
  foreach($dirs as $key => $value) {
    $p1 = strrpos($value,"/") + 1;
    $dname = substr($value,$p1);
    $dname2 = video_code($dname); 
    $dkey = $key+1;
      if($dkey==@$dirurl){
        print "\t<option selected value=\"$dkey\">$dname2</option>\n";  
      } else {
        print "\t<option value=\"$dkey\">$dname2</option>\n";  
      } 
    }
  print "</select>\n";

  if(strlen($dirurl) > 0 && !is_numeric($dirurl)){ //check if $dirurl is numeric data or not.
    echo "Data Error";
    exit;
  }
  if(empty($dirurl)) { //check if $dirurl is numeric data or not.
    echo "<span>&#x2190; Please select a video</span>";
    exit;
  }
  if(isset($dirurl) and strlen($dirurl) > 0){ 
    $dirlist = $dirs[$dirurl-1]; 
    $files = preg_find('/^.*?\.m/D', $dirlist, PREG_FIND_SORTKEYS);
    print  "<select name=\"fileurl\" onchange=\"reload2(this.form)\">\n"; 
    @$fileurl = $_GET['fileurl'];
    // if there's no video selected, use the first video (for usability)
    if(empty($fileurl)) { 
      $first = array_slice($files, 0, 1, true); 
      @$fileurl = key($first)+1;
    }
    foreach($files as $key => $value) {
      $v1 = strrpos($value,"/") + 1;
      $v2 = strpos($value,".");
      $vname = substr($value,$v1,($v2-$v1));
      $vname = preg_replace("/-/","&nbsp;",$vname);
      $vname2 = video_code($vname);
      $vkey = $key+1;
        if($vkey==@$fileurl){ 
          print "\t<option selected value=\"$vkey\">$vname2</option>\n";
        } else {
          print "\t<option value=\"$vkey\">$vname2</option>\n";
        }
      } 
    print "</select>\n";
    } 
  
  // no file can be selected if there's no directory selected
  if(isset($dirurl)){
    $filename = $files[$fileurl-1];   
  } else {
    $filename = '';
    $fileurl = '';
  }
  //print "<input type=\"submit\" value=\"Watch it!\" class=\"watch\" />\n";
  print "</form>\n"; 

  }   
   ?>
</div>  

<div id="content-right">
<div id="videoplayer">
<?php 
  print "<video src=\"$filename\" width=\"$w\" height=\"$h\" poster=\" \"controls=\"controls\" preload=\"none\">\n";
  //print "<video src=\"$filename\" width=\"$w\" height=\"$h\" poster=\" \"controls=\"controls\">\n";
  print "<!-- Flash fallback for non-HTML5 browsers without JavaScript -->\n"; 
  print "<object width=\"320\" height=\"240\" type=\"application/x-shockwave-flash\" data=\"js/flashmediaelement.swf\">\n"; 
  print "\t<param name=\"movie\" value=\"js/flashmediaelement.swf\" />\n"; 
  print "\t<param name=\"flashvars\" value=\"controls=true&file=$filename\" />\n"; 
  print "\t<!-- Image as a last resort -->\n";
  print "\t<img src=\"myvideo.jpg\" width=\"320\" height=\"240\" title=\"No video playback capabilities\" />\n";
  print "</object>\n";
  print "</video>\n"; 
  ?> 
</div>  
</div>
&#160;
</div>
<div id="text-bottom">
&#160;
</div>
</div>
 <script>
  $('video').mediaelementplayer({
    // if the <video width> is not specified, this is the default
    defaultVideoWidth: 480,
    // if the <video height> is not specified, this is the default
    defaultVideoHeight: 270,
    // enables Flash and Silverlight to resize to content size
    enableAutosize: true,
    // the order of controls you want on the control bar (and other plugins below)
    features: ['playpause','progress','current','duration','tracks','volume','fullscreen'],
    // Hide controls when playing and mouse is not over the video
    alwaysShowControls: false,
    // force iPad's native controls
    iPadUseNativeControls: false,
    // force iPhone's native controls
    iPhoneUseNativeControls: false, 
    // force Android's native controls
    AndroidUseNativeControls: false,
    // forces the hour marker (##:00:00)
    alwaysShowHours: false,
    // show framecount in timecode (##:00:00:00)
    showTimecodeFrameCount: false,
    // used when showTimecodeFrameCount is set to true
    framesPerSecond: 18,
    // turns keyboard support on and off for this instance
    enableKeyboard: true,
    // when this player starts, it will pause other players
    pauseOtherPlayers: true,
    // array of keyboard commands
    keyActions: []
 
});
</script>
</body>
</html>