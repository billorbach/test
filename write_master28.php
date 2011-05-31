<html>
<head>
<?php include("header.css"); ?>
</head>
<?php include("scrollbody.html"); ?>
<?php include("header.html"); ?>
<?php include("exec_system.php"); ?>
<?php include("read_configuration_files.php"); ?>

<?php
$retval = 0;

$command="sh install-vmtools.sh " . $Current_Master;
//echo $command;
exec_system( $command, $retval );
?>
<center>

<?php include("explain.html"); ?>
<?php include("template.php"); ?>

<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">
<center>

<?php
echo "<font color='red'>Please wait for 10 seconds, and you will see a cd-rom pop up.</font>";
createOutput( "images/restart.jpg", "write_master27.php", "write_master29.php" );
?>
</body>
</html>

