<html>
<head>
</head>
<body>
<?php include("read_functions.php");?>

<?php
$vim = $_GET['vim'];
$user = $_GET['user'];

userMachineInfo( $vim );
//userLogIns( $user );
//machineInfo( $vim );
?>

<?php include("expand.php"); ?>
</body>
</html>

