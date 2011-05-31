<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Revert Master</title>
<?php include("header.css"); ?>
</head>
<body >
<?php include("header.html"); ?>
<?php include("exec_system.php"); ?>
<?php include("read_configuration_files.php"); ?>

<?php 
$Edit1=$Edit-1;
if($Edit1<=0 )
	$Edit1=0;
$Master1 = "master" . $Create . "." . $Edit1;


$retval = 0;
$String = "sudo sh web-revert-master0.sh " . $Master . " > /dev/null 2>&1";
//system(  $String, $retval );
exec_system(  $String, $retval );
//echo $String;

//$retval = 0;
$String = "sudo sh web-revert-master1.sh " . $Master1  . "  " . $number_of_clones . " " . $powered_up_clones . " > /dev/null 2>&1";
//system(  $String, $retval );
exec_system(  $String, $retval );
//echo $String;

$File = "config/master_edit.txt"; 
$Handle = fopen($File, 'w');
fwrite($Handle, $Edit1 ); 
fclose($Handle); 

?>

<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">

Congratulations. You have successfully reverted your Windows 7 installation.
</br>
</br>
</br>
</div>
</body>
</html>


