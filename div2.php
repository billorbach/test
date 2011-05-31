<html>
<head>
</head>
<body name=list>
<ul>
<?php
$string = "datafile.txt"; 
$handle = fopen( $string, "r" );
while( !feof( $handle ) )
{
 	$data = fgets($handle, 512);
 	$num = strtok( $data, "," ); 
   	$name = strtok( "," );
   	$virtual_ip = strtok( "," );
   	$terminal_ip = strtok( "," );
   	$null = strtok( "," );
   	$status = strtok( "," );
   	$user = strtok( "," );
   	$null2 = strtok( "," );
   	$flag = strtok( "," );
   	$time = strtok( "," );
	//echo $status;
        if( $status == "connected" )
	{
   		$output = "<li><a href=\"readfile5.php?vim=";
       	 	echo $output;
        	echo $num;
		echo "&user=";
		echo $user;
   		$output2= "\"target=\"iframe2\" ><img src=\"images/comp.jpg\" height=\"30\" width=\"30\" />";
   		echo $output2;
   		echo $user;
   		echo "</a></li>"; 
	}
} 
pclose($handle);
?>
</ul>

</body>
</html>

