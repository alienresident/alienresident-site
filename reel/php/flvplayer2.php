<?php 
// included the sorting code
include_once('preg-find.php');

//get the folder from the url ie. index2.php?d=Reel
//$d = $_GET["d"];
$d = "Reel"; 

// Set the sorting method 
$files = preg_find('/./', $d, PREG_FIND_SORTKEYS);

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
$dir = trim($d,"/");
$dir2 = preg_replace("/-/","&nbsp;",$dir);

if (!empty($controlbar)) {
// width of the video
$height = $h + $videoPlaylistSize;
} else {
$height = $h + $videoPlaylistSize + 20;
}
function BooleanToStr($bool){
	return ($bool) ? 'true' : 'false';
}

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
		$kname3 = preg_replace("/,/",": ",$kname2);
		echo "$kname3,";
	} ?>
<?php print' movies" />'?>
<?php print'<meta name="viewport" content="width=690" />'?>
<!-- Style Sheets -->
<style type="text/css" media="screen">@import url("<?php print $style ?>");</style>

<script src="js/swfobject.js" language="javascript" type="text/javascript"></script>
	<script type="text/javascript">
	var flashvars = {};
				flashvars.file = "php/xml.php?d=<?php print $d ?>";
				flashvars.playlist = "bottom";
				flashvars.playlistsize = "<?php print $videoPlaylistSize ?>";
				flashvars.bufferlength = "<?php print $bufferlength ?>";
				flashvars.autostart = "<?php print BooleanToStr($autostart); ?>";
				<?php if(!empty($controlbar)) { print "flashvars.controlbar = ".$controlbar.""; } ?>
				var params = {};
				params.play = "true";
				params.allowfullscreen = "<?php print BooleanToStr($fullscreen) ?>";
				var attributes = {};
	swfobject.embedSWF("flash/player.swf", "FLVplayer", "<?php print $w ?>", "<?php print $height ?>", "9.0.115", "flash/expressInstall.swf", flashvars, params, attributes);
	</script>
</head>
<body id="titles-<?php print $d ?>">
<div id="topnav">
<a name="top"></a>

<ul class="mainnav"><li class="first"><a href="../about/" class="mainnav" title="Learn more about alienresident.net">about</a></li>
<li class="inline"><a href="../contact/" class="mainnav" title="How to contact alienresident.net">contact</a></li>
<li class="inline"><a href="../design/" class="mainnav" title="View a portfolio of interactive media design">design</a></li>
<li class="inline"><a href="../films/" class="mainnav" title="Watch the films of alienresident.net">films</a></li>
<li class="inline"><a href="../projections/" class="mainnav" title="Learn more about the film and video projections created by alienresident">projections</a></li>
<li class="inline"><a href="../resume/" class="mainnav" title="Read and download Mark Reilly's r&#233;sum&#233;">r&#233;sum&#233;</a></li></ul>
<object type="application/x-shockwave-flash" data="../media/flash/232x20.swf?path=..%2F..%2Fmedia%2Fflash%2Falienresident-net-logo.swf" width="232" height="20">
<param name="movie" value="../media/flash/232x20.swf?path=..%2F..%2Fmedia/flash/alienresident-net-logo.swf" />
<param name="wmode" value="transparent" />
</object>
</div>

<div id="main">
<?php if($h1) {print "<h1>$dir2</h1>";} ?>

	
<div id="content-right">
<!-- the QTplayer -->
<div id="FLVplayer">

			<pYou need Flash Player 9 or greater and have Javascript enabled to view these videos</p>

</div>


<div id="info">
<?php if(!$autostart){
		print'<p>Press play to start the video</p>';
		} ?>
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