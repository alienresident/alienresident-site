<?php 
//-----------------------------------------------------------------------------------------
// the variables you have to set
//-----------------------------------------------------------------------------------------

//server config
$folder = "/reel/";
//pull in directory from URL 
$d = $_GET["d"];
$dirL = "../".$d;
$url = "http://" . $_SERVER['SERVER_NAME'] . "$folder" . "$d";
$websitename = 'Mark Reilly&#039;s Reel';

// included the sorting code
include_once('preg-find.php');
// Set the sorting method 
$files = preg_find('/./', $dirL, PREG_FIND_SORTKEYS);

// extracting the name of the Folder for TITLE & H1
$dirL2 = preg_replace("/-/","&nbsp;",$dirL);

print "<playlist version=\"1\" xmlns=\"http://xspf.org/ns/0/\">\n";
print "\t<title>$dirL2</title>\n";
print "\t<tracklist>\n";
	// php loop for printing all the links
	$i = 1;
	asort($files);
	foreach($files as $key => $value) {
		$p1 = strrpos($value,"/") + 3;
		$p2 = strrpos($value,".");
		$name = substr($value,$p1,($p2-$p1));
		$name2 = preg_replace("/%20/","&nbsp;",$name);
		$name3 = preg_replace("/_/","&nbsp;",$name2);
		$name4 = preg_replace("/,/",":&nbsp;",$name3);
		print "\t\t<track>\n";		
		echo "\t\t\t<title>$name4</title>\n";
		echo "\t\t\t<creator></creator>\n";
		echo "\t\t\t<info>$url</info>\n";
		echo "\t\t\t<annotation>$websitename</annotation>\n";
		echo "\t\t\t<location>".$files[$key]."</location>\n";
		print "\t\t</track>\n";
	} 
print "\t</tracklist>\n";
print "</playlist>";
?>