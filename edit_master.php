<html>
<head>
<?php include("header.css"); ?>
</head>
<?php include("scrollbody.html"); ?>
<?php include("header.html"); ?>
<?php include("exec_system.php"); ?>
<?php include("read_configuration_files.php"); ?>

<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">
<center>

<?php
$Edit3=$Edit-1;

$OldestMaster = "master" . $Create . "." . $Edit3;

$retval = 0;


set_time_limit( 0 );
$String = "sh web-remove-master.sh " . " > /dev/null";
exec_system(  $String, $retval );

set_time_limit( 0 );
$String = "sh web-create-master0.sh " . $OldestMaster . " > /dev/null";
exec_system(  $String, $retval );
//echo $String;
 
$String = "sh web-edit-master0.sh " . $Master1 . "> /dev/null 2>&1";
//$String = "sh web-edit-master0.sh " . $Master1;

//echo $String;


exec_system( $String, $retval);
$version = $Create . "." . $Edit1;

echo "Version Number is: " . $version
 ?>
<center>
Please remember this version number.
</br>
We will use VMRC to set up the master copy of Windows.
</br>
Please download it from <a href="vmrc/setup.exe">here.</a>


</br>
</br>
<center>
<img src="images/previous.png" onclick="javascript:edit_master_previous()" />
<img src="images/next.png" onclick="javascript:edit_master_next()" />
<!--<a href="edit_master_intro.php"><img src="images/previous.png" /></a>
<a href="edit_master2.php"><img src="images/next.png" /></a>-->i

</center>
</div>

</body>
</html>




