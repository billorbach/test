
<html>
<head>
<?php include("header.css"); ?>
</head>
<?php include("scrollbody.html"); ?>
<?php include("header.html"); ?>
<?php include("exec_system.php"); ?>
<?php include("read_configuration_files.php"); ?>

<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">

<?php 
$guest_os = $_GET['guest_os'];

$Create1 = $Create + 1;
$Create0 = $Create - 1;
$Create00 = $Create - 2;

$Edit1 = 0;

$Master = "master" . $Create1 . "." . $Edit1;
$OldMaster = "master" . $Create0 . "." . $Edit1;
$OldestMaster = "master" . $Create00 . "." . $Edit1;

if( $Edit >= 2 )
{
	$oldest = $Edit - 2;
	$older = $Edit - 1;
	$OldMaster = "master" . $Create . "." . $older;
	$OldestMaster = "master" . $Create . "." . $oldest;
}

if( $Edit == 1 )
{
	$OldMaster = "master" . $Create . "." . $Edit1;
	$OldestMaster = "master" . $Create0 . "." . $Edit1;
}


$retval = 0;
$version = $Create1 . "." . $Edit1;

$File = "config/working_version.txt"; 
$Handle = fopen($File, 'w');
fwrite($Handle, $version ); 
fclose($Handle); 


if( $guest_os == "Microsoft Windows 7 (32-bit)" )
{
	$ISOfilename = "Windows-7_32-bit2.iso";
	$Bit = "32";
	
}

if( $guest_os == "Microsoft Windows 7 (64-bit)" )
{
	$ISOfilename = "Windows-7_64-bit.iso";
	$Bit = "64";
}

	set_time_limit( 0 );
	$String = "sh web-remove-master.sh " . " > /dev/null";
	//$String = "sh web-copy-iso.sh " .  $ISOfilename . " > /dev/null";
	//$String = "sh web-copy-iso.sh " . " " . "\"" .  $ISOfilename . "\"" . " > /dev/null";
	exec_system(  $String, $retval );
	//echo $String;
	//echo "</br>";

	set_time_limit( 0 );
	$String = "sh web-create-master0.sh " . $OldestMaster . " > /dev/null";
	//$String = "sh web-create-master0.sh " . " " . "\"" . $OldestMaster . "\"" . " > /dev/null";
	exec_system(  $String, $retval );
	//echo $String;
	//echo "</br>";

	set_time_limit( 0 );
	$String = "sh web-create-master01.sh " . $OldMaster . " > /dev/null";
	//$String = "sh web-create-master01.sh " . " " . "\"" . $OldMaster . "\"" . " > /dev/null";
	exec_system(  $String, $retval );
	//echo $String;
	//echo "</br>";

	set_time_limit( 0 );
	$String = "sh web-create-master1.sh " . $Master . " " . $Bit . " > /dev/null";
	//$String = "sh web-create-master1.sh " . $Master . " " . "\"" . $ISOfilename . "\"" . " " . $Bit . " > /dev/null";
	//$String = "sh web-create-master1.sh " . " " . "\"". $Master . "\"". " " . "\"". $ISOfilename . "\"". " ". "\"" . $Bit. "\""  . " > /dev/null";
	exec_system(  $String, $retval );
	//echo $String;
	//echo "</br>";

	set_time_limit( 0 );
	$String = "sh web-create-master2.sh " . $Master . " > /dev/null";
	//$String = "sh web-create-master2.sh " . " " . "\"" . $Master . "\"" . " > /dev/null";
	exec_system(  $String, $retval );
	//echo $String;
	//echo "</br>";

	set_time_limit( 0 );
	$String = "sh web-create-master3.sh " . $Master . " > /dev/null";
	//$String = "sh web-create-master3.sh " . $Master. " " . "\"". $ISOfilename . "\"" . " " . "\"". $guest_os ."\"" . " > /dev/null";
	//$String = "sh web-create-master3.sh " . " " . "\"". $Master . "\"" . " " . "\"". $ISOfilename . "\"" . " " . "\"". $guest_os ."\"" . " > /dev/null";
	exec_system(  $String, $retval );
	//echo $String;
	//echo "</br>";

echo "Version Number is: " . $version
 ?>

</br>
Please remember this version number.
</br>
We will use VMRC to set up the master copy of Windows.
</br>
Please download it from <a href="vmrc/setup.exe">here.</a>


</br>
</br>
<!--<center>
<a href="create_master.php"><img src="images/previous.png" /></a>
<a href="write_master2.php"><img src="images/next.png" /></a>

</center>-->
<center>
<img src="images/previous.png" onclick="javascript:create_master_previous()" />
<img src="images/next.png" onclick="javascript:create_master_next()" />
</center>

</div>

</body>
</html>




