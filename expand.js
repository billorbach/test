//<script language="JavaScript"> 
// Expanding images script copyright Matthew LaCerais MLacerais@osc.state.ny.us 
// Distributed by hypergurl http://www.hypergurl.com 
// Permission to use script granted if above credits are left intact 
function resizeImage(e) 
{ 
      	if (document.layers) 
      	{ //Netscape 
          var xMousePos = e.pageX;
          var xMousePosMax = window.innerWidth+window.pageXOffset; i
      	}
 	else
	 if (document.all) 
	{ // IE 
		var xMousePos = window.event.x+document.body.scrollLeft;
	} 
	else if (document.getElementById) 
	{//Netscape 
		var xMousePos = e.pageX; var xMousePosMax = window.innerWidth+window.pageXOffset; 
	}
	var i = (-1 * (((xMousePos/340) - (250/340)) * ((xMousePos/340) - (250/340)))) + 1;
	if (i < .4)
		i = .4; 
	if (i > 2) 
		i = 2;
	picture1.width=(170 * i);
 	picture1.height=(125 * i); i = (-1 * (((xMousePos/340) - (420/340)) * ((xMousePos/340) - (420/340)))) + 1;
	if (i < .4)
		 i = .4; 
	if (i > 2)
		 i = 2;
	picture2.width=(170 * i);
 	picture2.height=(125 * i); i = (-1 * (((xMousePos/340) - (525/340)) * ((xMousePos/340) - (525/340)))) + 1;
	if (i < .4)
		 i = .4;
	if (i > 2) 
		i = 2; 
	picture3.width=(170 * i); 
	picture3.height=(125 * i);
 	i = (-1 * (((xMousePos/340) - (600/340)) * ((xMousePos/340) - (600/340)))) + 1;
	if (i < .4)
		 i = .4;
	if (i > 2) 
		i = 2;
	picture4.width=(170 * i);
 	picture4.height=(125 * i);
	i = (-1 * (((xMousePos/340) - (680/340)) * ((xMousePos/340) - (680/340)))) + 1;
	if (i < .4)
		 i = .4;
	if (i > 2)
		 i = 2;
	picture5.width=(170 * i);
 	picture5.height=(125 * i);
	} 
function output(message)
{ 
	obj = eval("text");
 	obj.innerHTML = "<font size=\"4\" font-family=\"Century Gothic\";font-weight=\"bold\"; color=\"#fff\";>"+message+"</font>"; 
}
function handleMouse() 
{ 
	if (document.layers) 
	{ // Netscape 
		document.captureEvents(Event.MOUSEMOVE); 
		document.onmousemove = resizeImage;
	}
	else
	if (document.all)
	{ // Internet Explorer 
		document.onmousemove = resizeImage;
	}
	else 
	if (document.getElementById) 
	{ // Netcsape6
	 	document.onmousemove = resizeImage; 
	}
}
function doNothing(e)
{ 
	var i = 0.4; 
	picture1.width=(170 * i);
	picture1.height=(125 * i);
	picture2.width=(170 * i); 
	picture2.height=(125 * i);
	picture3.width=(170 * i);
	picture3.height=(125 * i); 
	picture4.width=(170 * i);
	picture4.height=(125 * i);
	picture5.width=(170 * i); 
	picture5.height=(125 * i);
}
function ignoreMouse()
{ 
	if (document.layers) 
	{ // Netscape 
		document.captureEvents(Event.MOUSEMOVE);
		 document.onmousemove = doNothing; 
	} 
	else
	if (document.all) 
	{ // Internet Explorer
		 document.onmousemove = doNothing; 
	} 
	else 
	if (document.getElementById) 
	{ // Netcsape 6
		 document.onmousemove = doNothing; 
	}
} 
function link_shadow_up()
{
	var str='';
	var browser_type  =   navigator.appName;
	if( browser_type  == 'Microsoft Internet Explorer')
	{
		str+="<div  class='portletHeader portletHeader3'>Change all these labels in the HTML template</div>";
		document.write(str);
	}
	else
	{
		str+="<div  class='portletHeader portletHeader2'>Change all these labels in the HTML template</div>";
		document.write(str);
	}
}
//</script>
