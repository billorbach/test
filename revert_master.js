
function revert_master_next()
{
var xmlhttp;

//finite_state_machine_step++;
//finite_state_machine_step = finite_state_machine_step + step;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("master").innerHTML=xmlhttp.responseText;
    }
  }

switch( finite_state_machine_step )
{
case 1:
	xmlhttp.open("GET","revert_master_intro.php",true);
	finite_state_machine_step = 2;
	break;
case 2:
	xmlhttp.open("GET","revert_master1.php",true);
	finite_state_machine_step = 3;
	break;
case 3:
	xmlhttp.open("GET","",true);
	finite_state_machine_step = 1;
	break;
default:
	break;
//document.write( finite_state_machine_step );
}

//document.write( finite_state_machine_step );
xmlhttp.send( null );
//document.write( finite_state_machine_step );
step();
}


function revert_master_previous()
{
var xmlhttp;

//finite_state_machine_step--;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("master").innerHTML=xmlhttp.responseText;
    }
  }

switch( finite_state_machine_step )
{
case 2:
	xmlhttp.open("GET","revert_master_intro.php",true);
	finite_state_machine_step = 1;
	break;
case 3:
	xmlhttp.open("GET","revert_master1.php",true);
	finite_state_machine_step = 2;
	break;
case 4:
	xmlhttp.open("GET","",true);
	finite_state_machine_step = 3;
	break;
default:
	break;

}

xmlhttp.send();
//document.write( finite_state_machine_step );
step();
}
