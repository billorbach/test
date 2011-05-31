
function edit_master_next()
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
	xmlhttp.open("GET","edit_master_intro.php",true);
	finite_state_machine_step = 2;
	break;
case 2:
	xmlhttp.open("GET","edit_master.php",true);
	finite_state_machine_step = 3;
	break;
case 3:
	xmlhttp.open("GET","edit_master2.php",true);
	finite_state_machine_step = 4;
	break;
case 4:
	xmlhttp.open("GET","edit_master2-0.php",true);
	finite_state_machine_step = 5;
	break;
case 5:
	xmlhttp.open("GET","edit_master2-1.php",true);
	finite_state_machine_step = 6;
	break;
case 6:
	xmlhttp.open("GET","edit_master2-2.php",true);
	finite_state_machine_step = 7;
	break;
case 7:
	xmlhttp.open("GET","edit_master2-3.php",true);
	finite_state_machine_step = 8;
	break;
case 8:
	xmlhttp.open("GET","edit_master2-4.php",true);
	finite_state_machine_step = 9;
	break;
case 9:
	xmlhttp.open("GET","edit_master2-5.php",true);
	finite_state_machine_step = 10;
	break;
case 10:
	xmlhttp.open("GET","edit_master2-6.php",true);
	finite_state_machine_step = 11;
	break;
case 11:
	xmlhttp.open("GET","edit_master3.php",true);
	finite_state_machine_step = 12;
	break;
case 12:
	xmlhttp.open("GET","edit_master4.php",true);
	finite_state_machine_step = 13;
	break;
case 13:
	xmlhttp.open("GET","edit_master5.php",true);
	finite_state_machine_step = 14;
	break;
case 14:
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


function edit_master_previous()
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
	xmlhttp.open("GET","edit_master_intro.php",true);
	finite_state_machine_step = 1;
	break;
case 3:
	xmlhttp.open("GET","edit_master.php",true);
	finite_state_machine_step = 2;
	break;
case 4:
	xmlhttp.open("GET","edit_master2.php",true);
	finite_state_machine_step = 3;
	break;
case 5:
	xmlhttp.open("GET","edit_master2-0.php",true);
	finite_state_machine_step = 4 ;
	break;
case 6:
	xmlhttp.open("GET","edit_master2-1.php",true);
	finite_state_machine_step = 5;
	break;
case 7:
	xmlhttp.open("GET","edit_master2-2.php",true);
	finite_state_machine_step = 6;
	break;
case 8:
	xmlhttp.open("GET","edit_master2-3.php",true);
	finite_state_machine_step = 7;
	break;
case 9:
	xmlhttp.open("GET","edit_master2-4.php",true);
	finite_state_machine_step = 8;
	break;
case 10:
	xmlhttp.open("GET","edit_master2-5.php",true);
	finite_state_machine_step = 9;
	break;
case 11:
	xmlhttp.open("GET","edit_master2-6.php",true);
	finite_state_machine_step = 10;
	break;
case 12:
	xmlhttp.open("GET","edit_master3.php",true);
	finite_state_machine_step = 11;
	break;
case 13:
	xmlhttp.open("GET","edit_master4.php",true);
	finite_state_machine_step = 12;
	break;
case 14:
	xmlhttp.open("GET","edit_master5.php",true);
	finite_state_machine_step = 13;
	break;
case 15:
	xmlhttp.open("GET","",true);
	finite_state_machine_step = 14;
	break;
default:
	break;

}

xmlhttp.send();
//document.write( finite_state_machine_step );
step();
}
