<?php 
// included the sorting code
include_once('preg-find.php');
// Set the sorting method 
$files = preg_find('/./', $dir, PREG_FIND_SORTKEYS);

$scale = $_GET['scale'];

if ($_GET['video']) { $file = $_GET['video']; } else { 
rsort($files);
	foreach($files as $key => $value) {
		$file = $key +1; } 
		}
// extracting the name of the video
$p1 = strrpos($files[$file-1],"/") + 3;
$p2 = strpos($files[$file-1],".");
$name = substr($files[$file-1],$p1,($p2-$p1));
$name2 = preg_replace("/%20/","&nbsp;",$name);
$name3 = preg_replace("/_/","&nbsp;",$name2);
$name4 = preg_replace("/,/",":&nbsp;",$name3);

// extracting the name of the Folder for TITLE & H1
$dir2 = preg_replace("/-/","&nbsp;",$dir);

if (is_numeric($scale)) {
// width of the video
$width = $w * $scale;

// height of the video and add 16px for the controller
$height = ($h * $scale) + 16;
} else {
$width = $w;
$height = $h + 16;
}

$width2 = $width + $videopadding;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title><?php print $name4 ?> | <?php print $dir2 ?> | <?php print $websitename ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php print'<meta name="title" content="'.$websitename.','.$name4.','.$dir2.'" />'?>
<?php print "\n" ?>
<?php print'<meta name="description" content="'.$websitename.','.$name4.','.$dir2.'" />'?>
<?php print "\n" ?>
<?php print'<meta name="keywords" content="'.$dir2.','?>
<?php // php loop for printing all the keywords
	$i = 1;
	asort($files);
	foreach($files as $key => $value) {
		$p1 = strrpos($value,"/") + 3;
		$p2 = strpos($value,".");
		$kname = substr($value,$p1,($p2-$p1));
		$kname2 = preg_replace("/_/"," ",$kname);
		echo "$kname2,";
	} ?>
<?php print' movies" />'?>
<?php print'<meta name="viewport" content="width=690" />'?>
<!-- Style Sheets -->
<style type="text/css" media="screen">@import url("<?php print $style ?>");</style>
<?php print'<style type="text/css">
    #player {
  width:'.$width2.'px;
  background-color:'.$bgcolor.';
  }
  #videonav {
  float:right;
  margin-top:-30px;
  margin-bottom:10px;
  }
  
</style>'?>
<script src="js/AC_QuickTime.js" language="javascript" type="text/javascript"></script>
</head>
<body id="titles<?php //print $dir ?>">
<div id="topnav">
<a name="top"></a>

<ul class="mainnav">
<li class="first"><a href="../design/" class="mainnav" title="View a portfolio of interactive media design">design</a></li>
<li class="inline">reel</li>
<li class="inline"><a href="../resume/" class="mainnav" title="Read and download Mark Reilly's r&#233;sum&#233;">r&#233;sum&#233;</a></li>
<li class="inline"><a href="../films/" class="mainnav" title="Watch the films of alienresident.net">films</a></li>
<li class="inline"><a href="../projections/" class="mainnav" title="Learn more about the film and video projections created by alienresident">projections</a></li><li class="inline"><a href="../contact/" class="mainnav" title="How to contact alienresident.net">contact</a></li>
</ul>
<object type="application/x-shockwave-flash" data="../media/flash/232x20.swf?path=..%2Fmedia%2Fflash%2Falienresident-net-logo.swf" width="232" height="20">
<param name="movie" value="../media/flash/232x20.swf?path=..%2Fmedia/flash/alienresident-net-logo.swf" />
<param name="wmode" value="transparent" />
</object>
</div>

<div id="main">
<?php if($h1) {print "<h1>$dir2</h1>";} ?>
<?php if($h2) {print "<h2>$name4</h2>";} ?>

<!-- the navigation -->
<div id="videonav">
<?php //if($h2) {print "<h2>$name4</h2>";} ?>

<?php if($dropdown) {
print'<form action="'.$_SERVER['PHP_SELF'].'" method="get">';
	print'<select name="video">';
	print'<option class="select" value="1">Select a Video</option>';
	// php loop for printing all the links
	$i = 1;
	asort($files);
	foreach($files as $key => $value) {
		$p1 = strrpos($value,"/") + 3;
		$p2 = strpos($value,".");
		$bname = substr($value,$p1,($p2-$p1));
		$bname2 = preg_replace("/%20/","&nbsp;",$bname);
		$bname3 = preg_replace("/_/","&nbsp;",$bname2);
		$bname4 = preg_replace("/,/",":&nbsp;",$bname3);
		echo "<option value=\"".($key+1)."\"  class=\"select\">".$bname4."</option>\n";
	} 
	print '</select>';
 	if($scaler) {	
 	print '<br />';
	print '<select name="scale">';
	print '<option class="select" value="1">Magnification</option>';
	print '<option value="1">100%</option>';
	print '<option value="1.5">150%</option>';
	print '<option value="2">200%</option>';
	print '</select>';
	print '<br />';
}
	print '<input type="submit" value="Watch it!" class="watch" />';
	print '</form>';
	} ?>
<?php if($numberedlist) {
print'<ol>';
	// php loop for printing all the links
	$i = 1;
	asort($files);
	foreach($files as $key => $value) {
		$p1 = strrpos($value,"/") + 3;
		$p2 = strpos($value,".");
		$bname = substr($value,$p1,($p2-$p1));
		$bname2 = preg_replace("/%20/","&nbsp;",$bname);
		$bname3 = preg_replace("/_/","&nbsp;",$bname2);
		$bname4 = preg_replace("/,/",":&nbsp;",$bname3);
		echo "<li><a href=\"".$_SERVER['PHP_SELF'].'?video='.($key+1)."\"  class=\"select\">".$bname4."</a></li>\n";
	} 
	print '</ol>';
	} ?>	
</div>	
<div id="content-right">
<!-- the QTplayer -->
<div id="player">
<!--[if IE]>
	<?php print '<script language="JavaScript" type="text/javascript">' ?>
		<?php print "QT_WriteOBJECT_XHTML('";
		print $url.$files[$file-1];
		print "','";
		print $width;
		print "','";
		print $height;
		print "','',";
		if($autoplay) {
		print "'autoplay', 'true',";
		} else {
		print "'autoplay', 'false',";
		} 
		print "'obj#bgcolor', '$bgcolor',";
		if($controller) {
		print "'controller', 'true',";
		} else {
		print "'controller', 'false',";
		}
		if($kioskmode) {
		print "'kioskmode', 'true',";
		} else {
		print "'kioskmode', 'false',";
		}		
		if($scale) {
		print "'scale', '$scale'";
		} else {
		print "'scale', '$scale'";
		}
		print ");\n" ?>
	<?php print "</script>\n" ?>
	<noscript>
		<?php print'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" width="'.$width.'" height="'.$height.'">' ?>
		<?php print'<param name="src" value="'.$url.$files[$file-1].'" />' ?>
		<?php if($scale) {
		print'<param name="scale" value="'.$scale.'" />';
		} else {
		print'<param name="scale" value="'.$scale.'" />';
		} ?>
		<?php if($autoplay) {
		print'<param name="autoplay" value="true" />';
		} else {
		print'<param name="autoplay" value="false" />';
		} ?>
		<?php print'<param name="bgcolor" value="'.$bgcolor.'" />' ?>
		<?php if($controller) {
		print'<param name="controller" value="true" />';
		} else {
		print'<param name="controller" value="false" />';
		} ?>
		<?php if($kioskmode) {
		print'<param name="kioskmode" value="true" />';
		} else {
		print'<param name="kioskmode" value="false" />';
		} ?>
		<?php print"</object>\n" ?>	
	</noscript>
<![endif]-->
<!--[if !IE]>-->
<?php print'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" width="'.$width.'" height="'.$height.'">' ?>	
	<?php print'<param name="src" value="'.$url.$files[$file-1].'" />' ?>
	<?php if($scale) {
	print'<param name="scale" value="'.$scale.'" />';
	} else {
	print'<param name="scale" value="'.$scale.'" />';
	} ?>
	<?php if($autoplay) {
	print'<param name="autoplay" value="true" />';
	} else {
	print'<param name="autoplay" value="false" />';
	} ?>
	<?php print'<param name="bgcolor" value="'.$bgcolor.'" />' ?>
	<?php if($controller) {
	print'<param name="controller" value="true" />';
	} else {
	print'<param name="controller" value="false" />';
	} ?>
	<?php if($kioskmode) {
	print'<param name="kioskmode" value="true" />';
	} else {
	print'<param name="kioskmode" value="false" />';
	} ?>
		<?php print'<object type="video/quicktime" data="'.$url.$files[$file-1].'" 
		width="'.$width.'" height="'.$height.'"  class="mov">' ?>
		<?php if($scale) {
		print'<param name="scale" value="'.$scale.'" />';
		} else {
		print'<param name="scale" value="'.$scale.'" />';
		} ?>
		<?php if($autoplay) {
		print'<param name="autoplay" value="true" />';
		} else {
		print'<param name="autoplay" value="false" />';
		} ?>
		<?php print '<param name="bgcolor" value="'.$bgcolor.'" />' ?>
  		<?php if($controller) {
		print'<param name="controller" value="true" />';
		} else {
		print'<param name="controller" value="false" />';
		} ?>
		<?php if($kioskmode) {
		print'<param name="kioskmode" value="true" />';
		} else {
		print'<param name="kioskmode" value="false" />';
		} ?>
			<p>This video is not loading properly please contact us and let us know what browser and operating system you are using and we will try to fix the problem!</p>
 	<?php print'</object>' ?>
<?php print'</object>' ?> 
<!--<![endif]-->
<?php if(!$autoplay){
		print'<p>Press play to start the video</p>';
		} ?>
</div>



	
<div id="info">
<?php if($description) {
print "<p>$description</p>";
} ?>
</div>
</div>
&#160;
</div>
<div id="text-bottom">
&#160;
</div>
</div>

</body>
</html>