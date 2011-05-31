<?php
function exec_system( $command, $result )
{
	if( file_exists( "/var/www/nginx-default/config/doit" ) )
		system( "sudo " . $command );
	//else
	//	echo "Did not do it";
	//echo $command >> trace.txt;
	//$result = " ";
	//return $result;
}
?>
