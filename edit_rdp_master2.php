<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Edit Master</title>
<?php include("header.css"); ?>
</head>
<body >
<?php include("header.html"); ?>
<?php include("read_configuration_files.php"); ?>


<center>

<div  style="font-size:22px;font-family:Century Gothic;font-weight:bold;color:#fff;background-color:#353a33">


Launch the Remote Desktop Connection. You can see the image below if you are using windows 7. 
</br>
Otherwise, you can always click the windows icon on your left down side.
</br>
Open "run" from the application list and type "mstsc.exe" to launch the Remote Desktop Connection.
</br>
Enter the remote IP Address in the Remote Desktop Connection. 
</br>
</br>
If there is no IP Address, please refresh the page until one appears.
</br>
<?php 
$String = "sh get_ip_address.sh " .  " " . $Master;
//echo $String;
//echo '</br>';
$handle = popen( $String, 'r');
//echo "'$handle'; " . gettype($handle) . "\n";
$read = fread($handle, 2096);
echo $read;
pclose($handle);

?>
</br>
</br>
<a href="edit_rdp_master1.php"><img src="images/previous.png" /></a>
<a href="edit_rdp_master3.php"><img src="images/next.png" /></a>
</br>
</br>
</br>
<center><img src="images/remote_desktop1.jpg" /></center>
</br>
</br>
</br>
</center>


</div>





</div>
</body>
</html>


