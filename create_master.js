var finite_state_machine_step = 1 ;

function step()
{
var xmlhttp;

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
    document.getElementById("step").innerHTML=xmlhttp.responseText;
    }
  }	
	xmlhttp.open("GET","get_data.php?finite_state_machine_step="+finite_state_machine_step,true);
	xmlhttp.send( );
}



function create_master_next()
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
	xmlhttp.open("GET","create_master_intro.php",true);
	finite_state_machine_step = 2;
	break;
case 2:
	xmlhttp.open("GET","copy_iso.php",true);
	finite_state_machine_step = 3;
	break;
case 3:
	xmlhttp.open("GET","create_master.php",true);
	finite_state_machine_step = 4;
	break;
case 4:
	var guest_os_value=encodeURIComponent(document.getElementById("guest_os").value)
	xmlhttp.open("GET","write_master1.php?guest_os="+guest_os_value,true);
	//xmlhttp.open("GET","write_master1.php",true);
	finite_state_machine_step = 5;
	break;
case 5:
	xmlhttp.open("GET","write_master2.php",true);
	finite_state_machine_step = 6;
	break;
case 6:
	xmlhttp.open("GET","write_master2-0.php",true);
	finite_state_machine_step = 7;
	break;
case 7:
	xmlhttp.open("GET","write_master2-1.php",true);
	finite_state_machine_step = 8;
	break;
case 8:
	xmlhttp.open("GET","write_master2-2.php",true);
	finite_state_machine_step = 9;
	break;
case 9:
	xmlhttp.open("GET","write_master2-3.php",true);
	finite_state_machine_step = 10;
	break;
case 10:
	xmlhttp.open("GET","write_master2-4.php",true);
	finite_state_machine_step = 11;
	break;
case 11:
	xmlhttp.open("GET","write_master2-5.php",true);
	finite_state_machine_step = 12;
	break;
case 12:
	xmlhttp.open("GET","write_master2-6.php",true);
	finite_state_machine_step = 13;
	break;
case 13:
	xmlhttp.open("GET","write_master8.php",true);
	finite_state_machine_step = 14;
	break;
case 14:
	xmlhttp.open("GET","write_master9.php",true);
	finite_state_machine_step = 15;
	break;
case 15:
	xmlhttp.open("GET","write_master10.php",true);
	finite_state_machine_step = 16;
	break;
case 16:
	xmlhttp.open("GET","write_master11.php",true);
	finite_state_machine_step = 17;
	break;
case 17:
	xmlhttp.open("GET","write_master11-0.php",true);
	finite_state_machine_step = 18;
	break;
case 18:
	xmlhttp.open("GET","write_master12.php",true);
	finite_state_machine_step = 19;
	break;
case 19:
	xmlhttp.open("GET","write_master13.php",true);
	finite_state_machine_step = 20;
	break;
case 20:
	xmlhttp.open("GET","write_master14.php",true);
	finite_state_machine_step = 21;
	break;
case 21:
	xmlhttp.open("GET","write_master15.php",true);
	finite_state_machine_step = 22;
	break;
case 22:
	xmlhttp.open("GET","write_master16.php",true);
	finite_state_machine_step = 23;
	break;
case 23:
	xmlhttp.open("GET","write_master17.php",true);
	finite_state_machine_step = 24;
	break;
case 24:
	xmlhttp.open("GET","write_master18.php",true);
	finite_state_machine_step = 25;
	break;
case 25:
	xmlhttp.open("GET","write_master19.php",true);
	finite_state_machine_step = 26;
	break;
case 26:
	xmlhttp.open("GET","write_master20.php",true);
	finite_state_machine_step = 27;
	break;
case 27:
	xmlhttp.open("GET","write_master21.php",true);
	finite_state_machine_step = 28;
	break;
case 28:
	xmlhttp.open("GET","write_master21-0.php",true);
	finite_state_machine_step = 29;
	break;
case 29:
	xmlhttp.open("GET","write_master22.php",true);
	finite_state_machine_step = 30;
	break;
case 30:
	xmlhttp.open("GET","write_master23.php",true);
	finite_state_machine_step = 31;
	break;
case 31:
	xmlhttp.open("GET","write_master24.php",true);
	finite_state_machine_step = 32;
	break;
case 32:
	xmlhttp.open("GET","write_master25.php",true);
	finite_state_machine_step = 33;
	break;
case 33:
	xmlhttp.open("GET","write_master26.php",true);
	finite_state_machine_step = 34;
	break;
case 34:
	xmlhttp.open("GET","write_master27.php",true);
	finite_state_machine_step = 35;
	break;
case 35:
	xmlhttp.open("GET","write_master28.php",true);
	finite_state_machine_step = 36;
	break;
case 36:
	xmlhttp.open("GET","write_master29.php",true);
	finite_state_machine_step = 37;
	break;
case 37:
	xmlhttp.open("GET","write_master30.php",true);
	finite_state_machine_step = 38;
	break;
case 38:
	xmlhttp.open("GET","write_master31.php",true);
	finite_state_machine_step = 39;
	break;
case 39:
	xmlhttp.open("GET","write_master32.php",true);
	finite_state_machine_step = 40;
	break;
case 40:
	xmlhttp.open("GET","write_master33.php",true);
	finite_state_machine_step = 41;
	break;
case 41:
	xmlhttp.open("GET","write_master34.php",true);
	finite_state_machine_step = 42;
	break;
case 42:
	xmlhttp.open("GET","write_master35.php",true);
	finite_state_machine_step = 43;
	break;
case 43:
	xmlhttp.open("GET","write_master36.php",true);
	finite_state_machine_step = 44;
	break;
case 44:
	xmlhttp.open("GET","write_master37.php",true);
	finite_state_machine_step = 45;
	break;
case 45:
	xmlhttp.open("GET","write_master23-1.php",true);
	finite_state_machine_step = 46;
	break;
case 46:
	xmlhttp.open("GET","write_master23-2.php",true);
	finite_state_machine_step = 47;
	break;
case 47:
	xmlhttp.open("GET","write_master23-3.php",true);
	finite_state_machine_step = 48;
	break;
case 48:
	xmlhttp.open("GET","write_master23-4.php",true);
	finite_state_machine_step = 49;
	break;
case 49:
	xmlhttp.open("GET","write_master23-5.php",true);
	finite_state_machine_step = 50;
	break;
case 50:
	xmlhttp.open("GET","write_clone.php",true);
	finite_state_machine_step = 51;
	break;
case 51:
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


function create_master_previous()
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
	xmlhttp.open("GET","create_master_intro.php",true);
	finite_state_machine_step = 1;
	break;
case 3:
	xmlhttp.open("GET","copy_iso.php",true);
	finite_state_machine_step = 2;
	break;
case 4:
	xmlhttp.open("GET","create_master.php",true);
	finite_state_machine_step = 3;
	break;
case 5:
	//var guest_os_value=encodeURIComponent(document.getElementById("guest_os").value)
	//xmlhttp.open("GET","write_master1.php?guest_os="+guest_os_value,true);
	xmlhttp.open("GET","write_master1.php",true);
	finite_state_machine_step = 4 ;
	break;
case 6:
	xmlhttp.open("GET","write_master2.php",true);
	finite_state_machine_step = 5;
	break;
case 7:
	xmlhttp.open("GET","write_master2-0.php",true);
	finite_state_machine_step = 6;
	break;
case 8:
	xmlhttp.open("GET","write_master2-1.php",true);
	finite_state_machine_step = 7;
	break;
case 9:
	xmlhttp.open("GET","write_master2-2.php",true);
	finite_state_machine_step = 8;
	break;
case 10:
	xmlhttp.open("GET","write_master2-3.php",true);
	finite_state_machine_step = 9;
	break;
case 11:
	xmlhttp.open("GET","write_master2-4.php",true);
	finite_state_machine_step = 10;
	break;
case 12:
	xmlhttp.open("GET","write_master2-5.php",true);
	finite_state_machine_step = 11;
	break;
case 13:
	xmlhttp.open("GET","write_master2-6.php",true);
	finite_state_machine_step = 12;
	break;
case 14:
	xmlhttp.open("GET","write_master8.php",true);
	finite_state_machine_step = 13;
	break;
case 15:
	xmlhttp.open("GET","write_master9.php",true);
	finite_state_machine_step = 14;
	break;
case 16:
	xmlhttp.open("GET","write_master10.php",true);
	finite_state_machine_step = 15;
	break;
case 17:
	xmlhttp.open("GET","write_master11.php",true);
	finite_state_machine_step = 16;
	break;
case 18:
	xmlhttp.open("GET","write_master11-0.php",true);
	finite_state_machine_step = 17;
	break;
case 19:
	xmlhttp.open("GET","write_master12.php",true);
	finite_state_machine_step = 18;
	break;
case 20:
	xmlhttp.open("GET","write_master13.php",true);
	finite_state_machine_step = 19;
	break;
case 21:
	xmlhttp.open("GET","write_master14.php",true);
	finite_state_machine_step = 20;
	break;
case 22:
	xmlhttp.open("GET","write_master15.php",true);
	finite_state_machine_step = 21;
	break;
case 23:
	xmlhttp.open("GET","write_master16.php",true);
	finite_state_machine_step = 22;
	break;
case 24:
	xmlhttp.open("GET","write_master17.php",true);
	finite_state_machine_step = 23;
	break;
case 25:
	xmlhttp.open("GET","write_master18.php",true);
	finite_state_machine_step = 24;
	break;
case 26:
	xmlhttp.open("GET","write_master19.php",true);
	finite_state_machine_step = 25;
	break;
case 27:
	xmlhttp.open("GET","write_master20.php",true);
	finite_state_machine_step = 26;
	break;
case 28:
	xmlhttp.open("GET","write_master21.php",true);
	finite_state_machine_step = 27;
	break;
case 29:
	xmlhttp.open("GET","write_master21-0.php",true);
	finite_state_machine_step = 28;
	break;
case 30:
	xmlhttp.open("GET","write_master22.php",true);
	finite_state_machine_step = 29;
	break;
case 31:
	xmlhttp.open("GET","write_master23.php",true);
	finite_state_machine_step = 30;
	break;
case 32:
	xmlhttp.open("GET","write_master24.php",true);
	finite_state_machine_step = 31;
	break;
case 33:
	xmlhttp.open("GET","write_master25.php",true);
	finite_state_machine_step = 32;
	break;
case 34:
	xmlhttp.open("GET","write_master26.php",true);
	finite_state_machine_step = 33;
	break;
case 35:
	xmlhttp.open("GET","write_master27.php",true);
	finite_state_machine_step = 34;
	break;
case 36:
	xmlhttp.open("GET","write_master28.php",true);
	finite_state_machine_step = 35;
	break;
case 37:
	xmlhttp.open("GET","write_master29.php",true);
	finite_state_machine_step = 36;
	break;
case 38:
	xmlhttp.open("GET","write_master30.php",true);
	finite_state_machine_step = 37;
	break;
case 39:
	xmlhttp.open("GET","write_master31.php",true);
	finite_state_machine_step = 38;
	break;
case 40:
	xmlhttp.open("GET","write_master32.php",true);
	finite_state_machine_step = 39;
	break;
case 41:
	xmlhttp.open("GET","write_master33.php",true);
	finite_state_machine_step = 40;
	break;
case 42:
	xmlhttp.open("GET","write_master34.php",true);
	finite_state_machine_step = 41;
	break;
case 43:
	xmlhttp.open("GET","write_master35.php",true);
	finite_state_machine_step = 42;
	break;
case 44:
	xmlhttp.open("GET","write_master36.php",true);
	finite_state_machine_step = 43;
	break;
case 45:
	xmlhttp.open("GET","write_master37.php",true);
	finite_state_machine_step = 44;
	break;
case 46:
	xmlhttp.open("GET","write_master23-1.php",true);
	finite_state_machine_step = 45;
	break;
case 47:
	xmlhttp.open("GET","write_master23-2.php",true);
	finite_state_machine_step = 46;
	break;
case 48:
	xmlhttp.open("GET","write_master23-3.php",true);
	finite_state_machine_step = 47;
	break;
case 49:
	xmlhttp.open("GET","write_master23-4.php",true);
	finite_state_machine_step = 48;
	break;
case 50:
	xmlhttp.open("GET","write_master23-5.php",true);
	finite_state_machine_step = 49;
	break;
case 51:
	xmlhttp.open("GET","write_clone.php",true);
	finite_state_machine_step = 50;
	break;
case 52:
	xmlhttp.open("GET","",true);
	finite_state_machine_step = 51;
	break;
default:
	break;

}

xmlhttp.send();
//document.write( finite_state_machine_step );
step();

}
