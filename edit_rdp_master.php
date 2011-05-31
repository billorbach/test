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
$String = "sh web-edit-master0.sh " .  " " . $Master . "> /dev/null 2>&1";
//echo $String;

$retval = 0;

exec_system( $String, $retval);

//system(  $String, $retval );

 ?>

<center>
<div  style="font-size:22px;font-family:Century Gothic;font-weight:bold;color:#fff;background-color:#353a33">


If you are using Windows 7 system in your own local machine, </br>
click on the Start Button and then type in Remote Desktop Connection:
</br>
</br>

</br>
<a href="edit_master_intro.php"><img src="images/previous.png" /></a>
<a href="edit_rdp_master1.php"><img src="images/next.png" /></a>
</br>
</br>
</br>
<img src="images/start_menu.jpg" />
</center>

</div>





</div>
</body>
</html>


