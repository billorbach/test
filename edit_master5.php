<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Edit Master</title>
<?php include("header.css"); ?>
</head>
<body >
<?php include("header.html"); ?>
<?php include("exec_system.php"); ?>
<?php include("read_configuration_files.php"); ?>


<?php 

$retval = 0;

$String = "sudo sh web-edit-master1.sh " .  " " . $Master1  . " " . $number_of_clones . " " . $powered_up_clones . " > /dev/null 2>&1";
//echo $String;
exec_system( $String, $retval );
//system(  $String, $retval );
 

//$String = "sh web-edit-master3.sh " .  " " . $Master1  . " " . $Master2 . " > /dev/null 2>&1 &";
$String = "sudo sh web-edit-master3.sh " .  " " . $Master1  . " " . $Master2 . " > /dev/null 2>&1";
//echo $String;
exec_system( $String, $retval );
//system(  $String, $retval );

//echo $String;

$File = "config/master_edit.txt"; 
$Handle = fopen($File, 'w');
fwrite($Handle, $Edit1 ); 
fclose($Handle); 

//$String = "sudo sh reset.sh " . " > /dev/null 2>&1";
$String = "sudo sh /home/jeos/link/new.sh " . " > /dev/null 2>&1";
//echo $String . "</br>";
//exec_system( $String, $retval );
//system(  $String, $retval );


?>
<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">

Congratulations. You have successfully edited your Windows 7 installation.
</br>
<center>
<img src="images/previous.png" onclick="javascript:edit_master_previous()" />
<img src="images/next.png" onclick="javascript:edit_master_next()" />
</center>
</br>
</br>


</div>





</div>
</body>
</html>


