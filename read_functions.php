<?php include("exec_system.php"); ?>

<?php

function userMachineInfo( $vim )
{
	$string = "sudo cp /home/jeos/link/datafile.txt datafile.txt";
	$retval = 0;
	exec_system( $string, $retval );

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
			
			echo ("<div id=\"conversionRates\" class=\"portletSmall\">" );
			//echo( "<span class=\"leftCorner\" style=\"float:left;\"></span>" );
			//echo( "<span class=\"portletHeader\" style=\"float:left;\"><h4>Another Portlet</h4></span>" );
			//echo( "<span class=\"rightCorner\" style=\"float:left;\"></span>" );
			
			echo( "<div class=\"portletContent\" style=\"width:400px; height:auto; float:left;\">" );
			echo( "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">" );

			echo( "<tr>" );
			echo( "<th class=\"bdoColumn\">Machine Number</th>" );
			echo( "<th class=\"bdoColumn\">Machine Name</th>" );
			echo( "<th class=\"bdoColumn\">IP</th>" );
			echo( "<th class=\"bdoColumn\">Terminal</th>" );
			echo( "<th class=\"bdoColumn\">Time</th>" );
			echo( "</tr>" );
			
			echo( "<tr>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $num;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $name;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $virtual_ip;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $terminal_ip;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $time;
			echo( "</td>" );
			
			echo( "</tr>" );
			
			echo( "</table>" );
			echo( "</div>" );
			
   		}
	}
	fclose($file_handle);
}

function userLogIns( $user )
{
        $string = "sudo grep connection /home/jeos/link/trace.txt > t";
	$retval = 0;
	exec_system( $string, $retval );
	//exec_system("grep connection /home/jeos/link/trace.txt > t", $retval );

	echo ("<div id=\"conversionRates\" class=\"portletSmall\">" );
			
	echo( "<div class=\"portletContent\" style=\"width:400px; height:auto; float:left;\">" );
	echo( "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">" );

	echo( "<tr>" );
	echo( "<th class=\"bdoColumn\">User</th>" );
	echo( "<th class=\"bdoColumn\">Date</th>" );
	echo( "<th class=\"bdoColumn\">IP</th>" );
	echo( "</tr>" );
			
		

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
			echo( "<tr>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $user;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $date;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $ip;
			echo( "</td>" );
			echo( "</tr>" );
   		}
	}
		
	echo( "</table>" );
	echo( "</div>" );

	fclose($file_handle);
}

function machineInfo( $vim )
{
	$file_handle = fopen("testing4", "r");
	while (!feof($file_handle))
	{
   		$line = fgets($file_handle);
   		if( ( substr( $line, 0, 7 ) ) == "   vm =" )
   		{
			$data = strtok( $line, ":" ); 
   			$data = strtok( ":" );
			$data1 = strtok( $data, "'" ); 
        		if( $data1 == $vim )
			{
				echo ("<div id=\"conversionRates\" class=\"portletSmall\">" );
			
				echo( "<div class=\"portletContent\" style=\"width:400px; height:auto; float:left;\">" );
				echo( "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">" );

				echo( "<tr>" );
				echo( "<th class=\"bdoColumn\">Machine Status</th>" );
				echo( "</tr>" );

				echo( "<tr>" );
				echo( "<td class=\"bdoColumn\">" );
				echo $line;
				echo( "</td>" );
				echo( "</tr>" );

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
						echo( "<tr>" );
						echo( "<td class=\"bdoColumn\">" );
						echo $line;
						echo( "</td>" );
						echo( "</tr>" );
					}
   					$line = fgets($file_handle);
				}
				echo( "</table>" );
				echo( "</div>" );
				break;
			}
   		}
	}
	fclose($file_handle);
}

function allUserMachineInfo()
{
	echo ("<div id=\"conversionRates\" class=\"portletSmall\">" );
			
	echo( "<div class=\"portletContent\" style=\"width:400px; height:auto; float:left;\">" );
	echo( "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">" );

	echo( "<tr>" );
	echo( "<th class=\"bdoColumn\">Machine Number</th>" );
	echo( "<th class=\"bdoColumn\">Machine Name</th>" );
	echo( "<th class=\"bdoColumn\">IP</th>" );
	echo( "<th class=\"bdoColumn\">User</th>" );
	echo( "<th class=\"bdoColumn\">Time</th>" );
	echo( "</tr>" );

	$string = "sudo cp /home/jeos/link/datafile.txt datafile.txt";
	$retval = 0;
	exec_system( $string, $retval );

	$file_handle = fopen("datafile.txt", "r");
	while (!feof($file_handle))
	{
   		$line = fgets($file_handle);
		$num = strtok( $line, "," );
   		//if( $num == $vim )
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
			
			if( $status == "connected" )
			{
				echo( "<tr>" );
				echo( "<td class=\"bdoColumn\">" );
				echo $num;
				echo( "</td>" );
				echo( "<td class=\"bdoColumn\">" );
				echo $name;
				echo( "</td>" );
				echo( "<td class=\"bdoColumn\">" );
				echo $virtual_ip;
				echo( "</td>" );
				echo( "<td class=\"bdoColumn\">" );
				echo $user;
				echo( "</td>" );
				echo( "<td class=\"bdoColumn\">" );
				echo $time;
				echo( "</td>" );
			}
			
			
   		}
	}
	echo( "</tr>" );
			
	echo( "</table>" );
	echo( "</div>" );

	fclose($file_handle);
}

function allUserLogIns()
{
        $string = "sudo grep connection /home/jeos/link/data/trace.txt > t";
	$retval = 0;
	exec_system( $string, $retval );
	//exec_system( "grep connection /home/jeos/link/data/trace.txt > t", $retval );

	echo ("<div id=\"conversionRates\" class=\"portletSmall\">" );
			
	echo( "<div class=\"portletContent\" style=\"width:400px; height:auto; float:left;\">" );
	echo( "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">" );

	echo( "<tr>" );
	echo( "<th class=\"bdoColumn\">User</th>" );
	echo( "<th class=\"bdoColumn\">Date</th>" );
	echo( "<th class=\"bdoColumn\">IP</th>" );
	echo( "</tr>" );
			
		

	$file_handle = fopen("t", "r");
	while (!feof($file_handle))
	{
   		$line = fgets($file_handle);
   		//if( ( strrpos( $line, $user, 0 ) ) > 0 )
   		{
  			$date = strtok( $line, "\t" );
   			$get = strtok( "\t" );
   			$ip = strtok( "\t" );
   			$user = strtok( "\t" );
   			$ip2 = strtok( "\t" );
			echo( "<tr>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $user;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $date;
			echo( "</td>" );
			echo( "<td class=\"bdoColumn\">" );
			echo $ip;
			echo( "</td>" );
   		}
	}
		
	echo( "</tr>" );
	echo( "</table>" );
	echo( "</div>" );

	fclose($file_handle);
}

?>


