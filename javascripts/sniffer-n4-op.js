var detect = navigator.userAgent.toLowerCase();
var OS,browser,version,total,thestring;

if (checkIt('konqueror'))
{
	browser = "Konqueror";
	OS = "Linux";
}
else if (checkIt('safari')) browser = "Safari"
else if (checkIt('omniweb')) browser = "OmniWeb"
else if (checkIt('opera')) browser = "Opera"
else if (checkIt('webtv')) browser = "WebTV";
else if (checkIt('icab')) browser = "iCab"
else if (checkIt('msie')) browser = "Internet Explorer"
else if (!checkIt('compatible'))
{
	browser = "Netscape Navigator"
	version = detect.charAt(8);
}
else browser = "An unknown browser";

if (!version) version = detect.charAt(place + thestring.length);

if (!OS)
{
	if (checkIt('linux')) OS = "Linux";
	else if (checkIt('x11')) OS = "Unix";
	else if (checkIt('mac')) OS = "Mac"
	else if (checkIt('win')) OS = "Windows"
	else OS = "an unknown operating system";
}

function checkIt(string)
{
	place = detect.indexOf(string) + 1;
	thestring = string;
	return place;
}

if(version <= 4 && browser == "Netscape Navigator"){
	document.write('<link rel="stylesheet" href="'+baseDir+'style/homepage-n4.css" type="text/css" media="screen" />');
}
else if(browser == "Internet Explorer" && OS == "Windows"){
	document.write('<link rel="stylesheet" href="'+baseDir+'style/homepage-ie.css" type="text/css" media="all" />');
}
else if(version >= 5 && browser == "Netscape Navigator"){
	document.write('<link rel="stylesheet" href="'+baseDir+'style/homepage.css" type="text/css" media="all" />');
}
else if(version > 6 || browser == "Opera"){
	document.write('<link rel="stylesheet" href="'+baseDir+'style/homepage.css" type="text/css" media="all" />');
}
else if(version < 6 || browser == "Opera"){
	document.write('<link rel="stylesheet" href="'+baseDir+'style/homepage-op.css" type="text/css" media="all" />');
}
else{
	document.write('<link rel="stylesheet" href="'+baseDir+'style/homepage.css" type="text/css" media="all" />')
}

//end browser detect

function calculateBgX(oElement)		{	return document.body.scrollLeft	- getOffsetLeft(oElement);}
function calculateBgY(oElement)		{	return document.body.scrollTop	- getOffsetTop(oElement);}

// calculates the top position of oElement by adding up the positions of its ancestors
function getOffsetTop(oElement)
{
	var iResult = oElement.offsetTop;
	while (oElement.offsetParent)
	{
		oElement = oElement.offsetParent;
		iResult += oElement.offsetTop;
	}
	return iResult;
}

// calculates the left position of oElement by adding up the positions of its ancestors
function getOffsetLeft(oElement)
{
	var iResult = oElement.offsetLeft;
	while (oElement.offsetParent)
	{
		oElement = oElement.offsetParent;
		iResult += oElement.offsetLeft;
	}
	return iResult;
}