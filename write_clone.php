<html>
<head>
<?php include("header.css"); ?>
</head>
<body> 
<?php include("header.html"); ?>
<?php include("exec_system.php"); ?>
<?php include("read_configuration_files.php"); ?>

<?php 

//echo "Number of clones is " .  $number_of_clones;
//Note:Please be careful when creating the master_create.txt and master_edit.txt files.
//In Linux, vi or echo will add a LineFeed to the end of the number and this will then be 
// in the master name thus: master1 .0 with the extra LF between. 
//The solution is to vi it in windows and copy it to Linux since vi in Linux adds the extraneous line feed which messes up the name.

$retval = 0;
$String = "sudo sh web-edit-master1.sh " .  " " . $Current_Master  . " " . $number_of_clones . " " . $powered_up_clones . " > /dev/null 2>&1";
//echo $String . "</br>";
exec_system( $String, $retval );
//system(  $String, $retval );

//$String = "sh web-create-clone1.sh " . " " . $Current_Master  . " " . $number_of_clones . " " . $powered_up_clones . "  > /dev/null 2>&1";
//echo $String . "</br>";
//system( $String, $retval );
//exec_system( $String, $retval );

$String = "sh web-edit-master3.sh " .  " " . $Current_Master  . " " . $New_Master . "> /dev/null 2>&1";
//echo $String . "</br>";
exec_system( $String, $retval );
//system(  $String, $retval );

$File = "config/master_create.txt"; 
$Handle = fopen($File, 'w');
fwrite($Handle, $tok1 ); 
fclose($Handle); 

$Edit1 = 0;

$File = "config/master_edit.txt"; 
$Handle = fopen($File, 'w');
fwrite($Handle, $Edit1 ); 
fclose($Handle); 

//$String = "sh reset.sh > /dev/null 2>&1";
//$String = "sh /home/jeos/link/new.sh > /dev/null 2>&1";
//echo $String . "</br>";
//exec_system( $String, $retval );
//system(  $String, $retval );

?>
<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">
<br/>
You have successfully created a new system.
<br/>
Now you can click the "Edit Master" button above to continue modifying as you wish.
<br/>
Please wait about two hours before doing this as there are still background processes running. 
</div>

<center>
<img src="images/previous.png" onclick="javascript:create_master_previous()" />
<img src="images/next.png" onclick="javascript:create_master_next()" />
</center>

</body>
</html>




