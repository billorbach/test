<html>
<head>
</head>
<body name=list>
<ul>
<?php
$String = "grep name testing4";
$String1 = "grep vim.VirtualMachine: testing4";
//echo $String;
$handle = popen( $String, 'r');
$handle1 = popen( $String1, 'r');
while (!feof($handle)) 
{ 
   $data = fgets($handle, 512); 
   //$output = "<li><a href=\"readfile.php\"target=\"iframe2\" ><img src=\"images/comp.jpg\" height=\"30\" width=\"30\" />";
   //echo $output; 
   $data0 = substr( $data, 12 );
   //echo $data0; 
   $data1 = fgets($handle1, 512);
   $data2 = strtok( $data1, ":" ); 
   $data2 = strtok( ":" );
   //echo $data2; 
   $output = "<li><a href=\"readfile1.php?vim=";
   if( strlen( $data2 ) < 1 )
	break;
   echo $output;
   echo $data2;
   $output2= "\"target=\"iframe2\" ><img src=\"images/comp.jpg\" height=\"30\" width=\"30\" />";
   echo $output2;
   echo $data0;
   echo "</a></li>"; 
} 
pclose($handle);
pclose($handle1);
?>
</ul>

</body>
</html>

