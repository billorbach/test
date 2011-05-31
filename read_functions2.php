<?php

function userMachineInfo( $vim )
{
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
			echo( "<table width=\"30%\"  cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"00ff00\" border=\"10\" border-style=\"ridge\" border-color=\"gray\">" );
   			echo "<tr><td>";
   			echo "Machine ID: " . $num;
   			echo "</td></tr>";
   			echo "<tr><td>";
   			echo "Machine Name: " . $name;
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
}

function userLogIns( $user )
{
	//echo( "</td><td width=\"50%\">";
	system( "grep connection data/trace.txt > t" );
	echo( "<table width=\"30%\"  cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"0000ff\" border=\"10\" border-style=\"ridge\" border-color=\"gray\">" );

	$file_handle = fopen("t", "r");
	while (!feof($file_handle))
	{
   		$line = fgets($file_handle);
   		if( ( strrpos( $line, $user, 0 ) ) > 0 )
   		{
  			$date = strtok( $line, "\t" );
   			$get = strtok( "\t" );
   			$ip = strtok( "\t" );
   			$user = strtok( "\t" );
   			$ip2 = strtok( "\t" );
	  		echo "<tr><td>";
   			echo $user;
   			echo "</td><td>";
   			echo $date;
   			echo "</td><td>";
   			echo $ip;
   			echo "</td></tr>";
   		}
	}
	echo( "</table>" );
	fclose($file_handle);
	echo "</td>";
	//echo "</tr>";
	//echo "</table>";
}

function machineInfo( $vim )
{
	$file_handle = fopen("testing4", "r");
	while (!feof($file_handle))
	{
   		$line = fgets($file_handle);
   		//echo $line;
   		if( ( substr( $line, 0, 7 ) ) == "   vm =" )
   		{
			$data = strtok( $line, ":" ); 
   			$data = strtok( ":" );
			$data1 = strtok( $data, "'" ); 
        		//echo $data1;
        		//echo "------";
        		echo $vim;
        		echo "</br>";
        		if( $data1 == $vim )
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
}

?>


