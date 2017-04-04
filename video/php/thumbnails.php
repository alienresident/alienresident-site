<?php 

// Include the preg-find library to sort files 
include_once('preg-find.php');

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
?>
<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title><?php print $websitename ?></title>  
  <meta name="viewport" content="width=<?php print $viewport ?>" />
    <!-- Style Sheets -->
    <style type="text/css" media="screen">@import url("<?php print $style ?>");</style>
    <link media="only screen and (max-device-width: 480px)" href="css/iPhone.css" type="text/css" rel="stylesheet">
    <script src="js/AC_QuickTime.js"></script>
    <script>
    function reload(form) {
        var val=form.dirurl.options[form.dirurl.options.selectedIndex].value; 
        self.location='gallery.php?dirurl=' + val ;
      }
      
    </script>
  </head>
  <body>
    <div id="main">
      <!-- the navigation -->
      <div id="gallery"> 
  <?php if($dropdown) {
    print '<form action="' . $_SERVER['PHP_SELF'] . '" method="get">' . "\n";
    print "<select name=\"dirurl\" onchange=\"reload(this.form)\">\n<option value=''>Select a Directory</option>\n";

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
    //print "<input type=\"submit\" value=\"See the thumbs\" class=\"watch\" />\n";
    print "</form>\n";
    
    if(strlen($dirurl) > 0 and !is_numeric($dirurl)){ //check if $dirurl is numeric data or not.
      echo "Data Error";
    exit;
    }
    if(isset($dirurl) and strlen($dirurl) > 0){ 
      $imglist = $dirs[$dirurl-1]."/".$imgdir; 
      $images = preg_find('/^.*?\.jpg/D', $imglist, PREG_FIND_SORTKEYS);
      
      $dirlist = $dirs[$dirurl-1]; 
      $videos = preg_find('/^.*?\.m/D', $dirlist, PREG_FIND_SORTKEYS);
      
      $numvideos = count($videos);
      $numimages = count($images);
      $thumbs = ($numimages / $numvideos);
      
      @$fileurl = $_GET['fileurl'];
        foreach($images as $key => $value) {
          $v1 = strrpos($value,"/") + 1;
          $v2 = strpos($value,".")-3;
          $v3 = strpos($value,".")+3;
          $vname = substr($value,$v1,($v2-$v1));
          $vname2 = preg_replace("/-/","&nbsp;",$vname);
          $vname3 = video_code($vname2);
          
          $i= ($key / $thumbs +1);
          if (is_int($i)){
            $n = $i;   
          }
          
          print "<a href=\"$playerurl?dirurl=$dirurl&fileurl=$n\"><img src=\"$value\" alt=\"$vname2\" /></a>\n";

          }
          
      } 

    // no file can be selected if there's no directory selected


    //$filename2 = substr($filename, strlen($dir)+1);     

    }   
     ?>
  </div>
  
  </body>
  </html>