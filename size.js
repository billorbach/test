
<script type="text/javascript">
function getWindowSize()
{
var winW = 630, winH = 460;

	if (document.body && document.body.offsetWidth) 
	{
 		winW = document.body.offsetWidth;
 		winH = document.body.offsetHeight;
	}
	if (document.compatMode=='CSS1Compat' && 
	    document.documentElement &&
    	document.documentElement.offsetWidth ) 
	{
 		winW = document.documentElement.offsetWidth;
 		winH = document.documentElement.offsetHeight;
	}
	if (window.innerWidth && window.innerHeight) 
	{
 		winW = window.innerWidth;
 		winH = window.innerHeight;
	}
}

function getWindowWidth()
{
var winW = 630;

	if (document.body && document.body.offsetWidth) 
	{
 		winW = document.body.offsetWidth;
 	inH = document.body.offsetHeight;
	}
	if (document.compatMode=='CSS1Compat' && 
	    document.documentElement &&
    	document.documentElement.offsetWidth ) 
	{
 		winW = document.documentElement.offsetWidth;
	}
	if (window.innerWidth && window.innerHeight) 
	{
 		winW = window.innerWidth;
	}
	return winW;
}


function getWindowHeight()
{
var winH = 460;

	if (document.body && document.body.offsetWidth) 
	{
 		winH = document.body.offsetHeight;
	}
	if (document.compatMode=='CSS1Compat' && 
	    document.documentElement &&
    	document.documentElement.offsetWidth ) 
	{
 		winH = document.documentElement.offsetHeight;
	}
	if (window.innerWidth && window.innerHeight) 
	{
 		winH = window.innerHeight;
	}
	return winH;
}

</script>

