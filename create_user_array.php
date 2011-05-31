<?php include("piechart.php"); ?>

<?php
function createUserArray( $actUser )
{
	$name = array();
	$timeStart = array();
	$timeEnd = array();
        $timeOn = array();
	$actIP = array();
	$size = -1;

	$file_handle = fopen("t", "r");
	while (!feof($file_handle))
	{
	   	$line = fgets($file_handle);
		$date = strtok( $line, "\t" );
		$get = strtok( "\t" );
  		$ip = strtok( "\t" );
  		$user = strtok( "\t" );
  		$ip2 = strtok( "\t" );
		if( $user == $actUser )
		{
			$name[ ++$size ] = $user;
			$timeStart[ $size ] = $date;
			$actIP[ $size ] = $ip;
			//echo $size . "====>" . $actIP[ $size ] . "</br>";
			continue;
		}
		if( $size >= 0 && $user == "logoff" && $ip == $actIP[ $size ] )
		{
			$timeEnd[ $size ] = $date;
			continue;		
		}
	}
	fclose($file_handle);
	$i = 0;
	for( $i = 0; $i < $size; $i++ )
	{
		$get = strtok( $timeStart[ $i ], " " );
		$hourStart = strtok( ":" );
		$minStart = strtok( ":" );
		$get = strtok( $timeEnd[ $i ], " " );
		$hourEnd = strtok( ":" );
		$minEnd = strtok( ":" );
		$timeOn[ $i ] = ( ( $hourEnd - $hourStart ) * 60 ) + ( $minEnd - $minStart );
		if( $timeOn[ $i ] <= 0 )
			$timeOn[ $i ] = 1;
		//echo $name[ $i ] . "====>" . $timeOn[ $i ];
	}
	createCharts( $name, $timeOn, $size, "User Log On Time In Minutes", "User", "Time" );

	unset( $name );
	unset( $timeStart );
	unset( $timeEnd );
        unset( $timeOn );
	unset( $actIP );
}
?>



