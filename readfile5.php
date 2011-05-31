<html>
<head>
	<title>Neverware Dashboard</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />	
	<script type="text/JavaScript" src="expand.js"></script>
</head>
<body>
<?php include("read_functions.php");?>

<?php include("create_user_array.php"); ?>

<?php
$vim = $_GET['vim'];
$user = $_GET['user'];

createUserArray( $user );
userMachineInfo( $vim );
userLogIns( $user );
//machineInfo( $vim );
?>

<!--<?php include("expand.php"); ?>-->
</body>
</html>

