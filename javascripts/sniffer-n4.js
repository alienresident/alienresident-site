if(navigator.userAgent.indexOf("MSIE 4.5") != -1){	document.write();}else if(navigator.userAgent.indexOf("IE") != -1){	document.write();}else if(navigator.userAgent.indexOf("Mozilla/5") != -1){	document.write();}else if(navigator.userAgent.indexOf("Opera/6") != -1){	document.write();}else if(navigator.userAgent.indexOf("Mac") != -1 && navigator.appName.indexOf("Netscape") != -1){	document.write('<link rel="stylesheet" href="'+baseDir+'style/stylesheet-n4.css" type="text/css" media="screen">');}else if(navigator.userAgent.indexOf("Mac") != -1){	document.write();}else{	document.write('<link rel="stylesheet" href="'+baseDir+'style/stylesheet-n4.css" type="text/css" media="screen">')}