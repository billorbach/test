<html>
<head>
	<title>Neverware Dashboard</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />	
	<script type="text/JavaScript" src="expand.js"></script>
</head>
<body>
<?php include("read_functions.php");?>


<?php include("create_array.php"); ?>

<?php
createArray();
allUserMachineInfo();
allUserLogIns();
//machineInfo( $vim );
?>

<?php
//allUserMachineInfo();
//allUserLogIns();
//machineInfo( $vim );
?>
<!--<?php include("expand.php"); ?>-->
</body>
</html>

