<?php include("piechart.php"); ?>

<?php
function createArray()
{
	$name = array();
	$count = array();
	$i = 0;
	$j = 0;
	$size = 0;
	$file_handle = fopen("t", "r");
	while (!feof($file_handle))
	{
	   	$line = fgets($file_handle);
		$date = strtok( $line, "\t" );
		$get = strtok( "\t" );
  		$ip = strtok( "\t" );
  		$user = strtok( "\t" );
  		$ip2 = strtok( "\t" );
  		for( $i = 0; $i < $size; $i++ )
  		{
			if( $name[ $i ] == $user && $user != "logoff" && $user != "" )
			{
				$count[ $i ]++; 
				break;
			}
  		}
  		if( $i == $size && $user != "logoff" && $user != "") 
  		{
			$name[ $size ] = $user;
        		$count[ $size ] = 1;
			$size++;
  		}
	}
	fclose($file_handle);
	createCharts( $name, $count, $size, "Number of Times User Logged In", "User", "Count" );
}
?>



