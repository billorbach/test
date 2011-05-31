<?php include("expand.php"); ?>


<?php
$vim = $_GET['vim'];
$vim1 = strtok( $vim, "'" ); 

$file_handle = fopen("testing4", "r");
while (!feof($file_handle))
{
   $line = fgets($file_handle);
   if( ( substr( $line, 0, 7 ) ) == "   vm =" )
   {
	$data = strtok( $line, ":" ); 
   	$data = strtok( ":" );
	$data1 = strtok( $data, "'" ); 
        //echo $data1;
        //echo "------";
        //echo $vim1;
        //echo "</br>";
        if( $data1 == $vim1 )
	{
		echo( "<table bgcolor=\"00ff00\" border=\"10\" border-style=\"ridge\" border-color=\"gray\">" );
   		echo "<tr><td>";
   		echo $line;
   		echo "</td></tr>";
   		$line = fgets($file_handle);
   		while( ( substr( $line, 0, 7 ) ) != "   vm =" && !feof($file_handle) )
		{
			if( ( ( strrpos( $line, "power", 0 ) ) > 0 )
			|| ( ( strrpos( $line, "toolsStatus", 0 ) ) > 0 )
			|| ( ( strrpos( $line, "memorySizeMB", 0 ) ) > 0 )
			|| ( ( strrpos( $line, "numCpu", 0 ) ) > 0 )
			|| ( ( strrpos( $line, "numEthernetCards", 0 ) ) > 0 )
			|| ( ( strrpos( $line, "numVirtualDisks", 0 ) ) > 0 )
			|| ( ( ( strrpos( $line, "guestFullName", 0 ) ) > 0 )
			&& ( ( strrpos( $line, "guestFullName = <unset>", 0 ) ) == 0 ) )
			|| ( ( strrpos( $line, "guestHeartbeatStatus", 0 ) ) > 0 )
			|| ( ( strrpos( $line, "overallStatus", 0 ) ) > 0 ) )
			{
   				echo "<tr><td>";
   				echo $line;
   				echo "</td></tr>";
			}
   			$line = fgets($file_handle);
		}
	        echo( "</table>" );
		break;
	}
   }
}
fclose($file_handle);

?>
</body>
</html>

