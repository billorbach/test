<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd"> 
<html lang="en"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>CSS Frames, version 2: Example 2, specified width | 456 Berea Street</title> 
	<style type="text/css" media="screen,print"> 
html,
body {
	margin:0;
	padding:0;
	height:100%; /* 100 % height */
}
html>body #wrap {height:100%;} /* 100 % height */
#wrap {
	width:40em;
	margin:0 auto;
}
#header {
	width:40em;
	height:5em;
}
html>body #header {
	position:fixed;
	z-index:10; /* Prevent certain problems with form controls */
}
html>body #content-wrap {height:100%;} /* 100 % height */
html>body #content {padding:6em 1em;} /* 6em = height of #header and #footer + 1em, 1em = give the content some breathing space */
#footer {
	width:40em;
	height:5em;
}
html>body #footer {
	position:fixed;
	bottom:0;
	z-index:10; /* Prevent certain problems with form controls */
}
 
/* Styling to make this demo page look just a little bit better */
html,
body {
	color:#333;
	background:#fff url(../bg.gif) fixed;
}
body {font:76%/1.5 "Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;}
h1,
h2 {
	margin:0.25em 0;
	font:normal 1.5em/1.1 "Century Gothic","Trebuchet MS",Helvetica,Arial,Geneva,sans-serif;
	text-align:center;
	letter-spacing:1px;
}
p {margin:1em 0;}
.info {
	position:relative;
	padding:0.5em;
	border:2px solid #999;
	background:#fff;
}
a:link,
a:visited {
	border-bottom:1px dotted;
	color:#AE4F0C;
	font-weight:bold;
	text-decoration:none;
}
a:focus,
a:hover {
	border-bottom-style:solid;
	color:#D03900;
}
#header,
#footer {
	color:#111;
	background:#ddd;
	text-align:center;
}
#content-wrap,
#content {background:#f8f8f3 url(/i/demo.gif);}
#footer a {color:#111;}
	</style> 
<!--[if lt IE 7]>
	<link rel="stylesheet" href="../ie.css" type="text/css">
<![endif]--> 
</head> 
<body> 
<div id="wrap"> 
	<div id="header"> 
		<h1>CSS Frames, version 2</h1> 
		<h2>Example 2, specified width</h2> 
	</div> 
	<div id="content-wrap"> 
		<div id="content"> 
			<p class="info">This page demonstrates the technique described in the article <a href="http://www.456bereastreet.com/archive/200609/css_frames_v2_fullheight/">CSS Frames v2, full-height</a>. Please read that article for more info on how this technique works. Should you want to link to this, please link to the related article instead of to this demo page. Thanks!</p> 
 
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
			<p>This is the last line.</p> 
 
		</div> 
	</div> 
	<div id="footer"> 
<div id="labfooter"> 
	<p><a href="/lab/">Lab Index</a> | <a href="/">456 Berea Street Home</a> | Copyright &#169; 2003-2011 Roger Johansson</p> 
</div> 
	</div> 
</div> 
</body> 
</html>
