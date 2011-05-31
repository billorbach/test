<?php include("expand.php"); ?>


<?php
$vim = $_GET['vim'];

$file_handle = fopen("datafile.txt", "r");
while (!feof($file_handle))
{
   $line = fgets($file_handle);
   $num = strtok( $line, "," );
   if( $num == $vim )
   {
   	$name = strtok( "," );
   	$virtual_ip = strtok( "," );
   	$terminal_ip = strtok( "," );
   	$null = strtok( "," );
   	$status = strtok( "," );
   	$user = strtok( "," );
   	$null2 = strtok( "," );
   	$flag = strtok( "," );
   	$time = strtok( "," );
	echo( "<table bgcolor=\"00ff00\" border=\"10\" border-style=\"ridge\" border-color=\"gray\">" );
   	echo "<tr><td>";
   	echo "Number: " . $num;
   	echo "</td></tr>";
   	echo "<tr><td>";
   	echo "Name: " . $name;
   	echo "</td></tr>";
   	echo "<tr><td>";
   	echo "Virtual IP: " . $virtual_ip;
   	echo "</td></tr>";
   	echo "<tr><td>";
   	echo "Terminal IP: " . $terminal_ip;
   	echo "</td></tr>";
   	echo "<tr><td>";
   	echo "Status: " . $status;
   	echo "</td></tr>";
   	echo "<tr><td>";
   	echo "Time Logged On: " . $time;
   	echo "</td></tr>";
	echo( "</table>" );
   }
}
fclose($file_handle);

?>
</body>
</html>

