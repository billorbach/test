<html>
<head>
<?php include("header.css"); ?>
</head>
<?php include("scrollbody.html"); ?>
<?php include("header.html"); ?>
<?php include("read_configuration_files.php"); ?>

<center>
<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">

Launch the client and input the IP address of your ESXI server:
<?php
if( file_exists( "config/doit" ) )
{
	$String = "sh getip.sh " .  "esxi";
	//echo $String;
	$handle = popen( $String, 'r');
	//echo "'$handle'; " . gettype($handle) . "\n";
	$read = fread($handle, 2096);
	echo $read;
	pclose($handle);
}
?>
</br>
Also, input the user name and password of the ESXI server.

</br>
<?php 
echo "Version Number is: " . $Work
 ?>

</br>
<center>
<img src="images/previous.png" onclick="javascript:create_master_previous()" />
<img src="images/next.png" onclick="javascript:create_master_next()" />
</center>
</br>
<center><img src="images/vmrc.jpg" /></center>
</center>
</form>
</div>

</body>
</html>




