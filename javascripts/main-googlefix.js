//OPEN NEW WINDOW
function extUrl(url) {
	var myWin = window.open(url, '_blank', "statusbar,status,menubar,titlebar,toolbar,location,width=760,height=600,resizable=yes,scrollbars=yes");
	myWin.focus();
}
//END

//OPEN NEW WINDOW
function extUrl2(url) {
	var myWin = window.open(url, '_blank', "width=550,height=380,resizable=yes,scrollbars=yes");
	myWin.focus();
}

//BEGIN WIN CLOSE
function winClose(){
	window.parent.close();
}
//END WIN CLOSE

// BEGIN VIDEO VARIABLES
var elgWinH;
var elgWinW;
var imgEnlarge;
var imgEnlargeW;
var imgEnlargeH;
// END VIDEO VARIABLES


//OPEN FLASH WINDOW
function openEWin(url,w,h) { 
	topWin = (screen.availHeight - h) / 2;
	leftWin = (screen.availWidth - w) / 2;
	props="status=no,width="+w+",height="+h+",top="+topWin+",screenY="+topWin+",left="+leftWin+",screenX="+leftWin+",resizable=no";
	var myEng = window.open(url,"engWin",props);
	myEng.focus();
}
//END OPEN FLASH WINDOW

// ENLARGE WINDOW
function openEnlarge(imgurl,imgwidth,imgheight) {
	imgEnlarge = imgurl;
	imgEnlargeW = imgwidth;
	imgEnlargeH = imgheight;
	
	elgWinW = (imgwidth + 50);
	elgWinH = (imgheight + 103);
	topWin = (screen.availHeight - elgWinW) / 2;
	leftWin = (screen.availWidth - elgWinH) / 2;
	
	props="scrollbars,status=no,width="+elgWinW+",height="+elgWinH;
	openEWin(""+baseDir+"main/alienresident_enlarge.html",'Enlarged',props);
}


//BEGIN TOP NAV ROLLOVER
//Caches images for right nav 
if (document.images) { 			
		topnav1on = new Image();  
		topnav1on.src = ""+baseDir+"images/main/alienresident_dot_net_over.gif";
		
		topnav1off = new Image();   
		topnav1off.src = ""+baseDir+"images/main/alienresident_dot_net.gif";
}
// Function to 'activate' images.
function navOn(imgName) {
    if (document.images) {
      document[imgName].src = eval(imgName + "on.src");
    }
}

// Function to 'deactivate' images.
function navOff(imgName) {
    if (document.images) {
      document[imgName].src = eval(imgName + "off.src");
    }
}

// FLASH WINDOW
function openFlash(imgurl,imgwidth,imgheight) {
	imgEnlarge = imgurl;
	imgEnlargeW = imgwidth;
	imgEnlargeH = imgheight;
	
	elgWinW = (imgwidth + 50);
	elgWinH = (imgheight + 103);
	topWin = (screen.availHeight - elgWinW) / 2;
	leftWin = (screen.availWidth - elgWinH) / 2;
	
	props="scrollbars,status=no,width="+elgWinW+",height="+elgWinH;
	openEWin(""+baseDir+"main/alienresident_flash.html",'Enlarged',props);
}

// QUICKTIME WINDOW
function openQT(imgurl,imgwidth,imgheight) {
	imgEnlarge = imgurl;
	imgEnlargeW = imgwidth;
	imgEnlargeH = imgheight;
	
	elgWinW = (imgwidth + 50);
	elgWinH = (imgheight + 103);
	topWin = (screen.availHeight - elgWinW) / 2;
	leftWin = (screen.availWidth - elgWinH) / 2;
	
	props="scrollbars,status=no,width="+elgWinW+",height="+elgWinH;
	openEWin(""+baseDir+"main/alienresident_quicktime.html",'Enlarged',props);
}

// Variables to generate footer
var addresshome= "http://www.alienresident.net/";
var addressmail= "webserf@alienresident.net";
var addressmail2= "mark2@alienresident.net";
var email= '<a href="mailto:'+addressmail2+'">mark@alienresident.net</a>';
var footer= '<span class="copyright">All material herein copyright &#169; 1996&#8211;2004. Mark Reilly &#8212; alienresident.<br />All Rights Reserved. <a href="http://www.alienresident.net/">alienresident.net</a> &#8226; Mark Reilly &#8226; Brooklyn, NY.<br /> This site uses valid <strong>XHTML 1.0</strong> and <strong>CSS.</strong> Validate this page\'s <a href="http://validator.w3.org/check?uri='+document.URL+'">XHTML</a> and <a href="http://jigsaw.w3.org/css-validator/validator?uri='+document.URL+'">CSS</a>.<br />Translate this page to <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_de">German</a> | <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_fr"target=translate>French</a> | <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_it">Italian</a> | <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_sp">Spanish</a> | <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_pt">Portuguese</a> | <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_ja">Japanese</a> | <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_ko">Korean</a> | <a href="http://babelfish.altavista.com/babelfish/tr?doit=done&url='+document.URL+'&lp=en_zh">Chinese</a><br />Questions/comments/suggestions email <a href="mailto:'+addressmail+'">webserf</a>. Last modified '+document.lastModified+' GMT -05:00;<br />This URL is <a href="'+document.URL+'">'+document.URL+'</a>.<br /><form method="get" action="http://www.google.com/custom"><input type="text" name="q" size="25" maxlength="255" value="" />&#160;<input type="submit" name="sa" value="search google" /><input type="hidden" name="cof" value="GALT:#333333;S:http://www.alienresident.net/;VLC:#aa0000;AH:left;BGC:#ffffff;LH:45;LC:#cc0000;GFNT:#444444;L:http://www.alienresident.net/images/main/alienresident-google-logo.gif;ALC:#cc0000;BIMG:;LW:530;T:#222222;GIMP:#000000;AWFID:f4ca8c04a9bde19a;" /><input type="hidden" name="domains" value="www.alienresident.net" />&#160;<input type="radio" name="sitesearch" value="" />internet <input type="radio" name="sitesearch" value="www.alienresident.net" checked="checked" />alienresident.net </form></span>';
if(window.attachEvent)
    window.attachEvent("onload",setListeners);

function setListeners(){
    inputList = document.getElementsByTagName("INPUT");
    for(i=0;i<inputList.length;i++){
        inputList[i].attachEvent("onpropertychange",restoreStyles);
        inputList[i].style.backgroundColor = "";
    }
    selectList = document.getElementsByTagName("SELECT");
    for(i=0;i<selectList.length;i++){
        selectList[i].attachEvent("onpropertychange",restoreStyles);
        selectList[i].style.backgroundColor = "";
    }
}

function restoreStyles(){
    if(event.srcElement.style.backgroundColor != "")
        event.srcElement.style.backgroundColor = "";
}
