<html>
<head>
<?php include("stye.css"); ?>
</head>
<body>
<?php
$file_handle = fopen("testing4", "r");
$count=0;
while (!feof($file_handle))
{
   $line = fgets($file_handle);
   
   if( ( strrpos( $line, "vm =", 0 ) ) > 0 )
   {
 		$vm[ $count ] = $line;
		continue;
   }
   
   if( ( strrpos( $line, "connection", 0 ) ) > 0 )
   {
 		$connection[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "power", 0 ) ) > 0 )
   {
 		$power[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "bootTime", 0 ) ) > 0 )
   {
 		$bootTime[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "maxCpuUsage", 0 ) ) > 0 )
   {
 		$maxCpuUsage[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "maxMemoryUsage", 0 ) ) > 0 )
   {
 		$maxMemoryUsage[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "toolsStatus", 0 ) ) > 0 )
   {
 		$toolsStatus[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "memorySizeMB", 0 ) ) > 0 )
   {
 		$memorySizeMB[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "numCpu", 0 ) ) > 0 )
   {
 		$numCpu[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "numEthernetCards", 0 ) ) > 0 )
   {
 		$numEthernetCards[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "numVirtualDisk", 0 ) ) > 0 )
   {
 		$numVirtualDisks[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "overallCpuUsage", 0 ) ) > 0 )
   {
 		$overallCpuUsage[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "guestMemoryUsage", 0 ) ) > 0 )
   {
 		$guestMemoryUsage[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "hostMemoryUsage", 0 ) ) > 0 )
   {
 		$hostMemoryUsage[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "guestFullName = \"", 0 ) ) > 0 )
   {
 		$guestFullName[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "committed", 0 ) ) > 0 )
   {
 		$committed[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "uncommitted", 0 ) ) > 0 )
   {
 		$uncommitted[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "unshared", 0 ) ) > 0 )
   {
 		$unshared[ $count ] = $line;
		continue;
   }
   if( ( strrpos( $line, "overallStatus", 0 ) ) > 0 )
   {
 		$overallStatus[ $count++ ] = $line;
		continue;
   }
}
 
fclose( $handle );
$i = 0;

echo( "<table border=\"10\" border-style=\"ridge\" border-color=\"gray\">" );
echo( "<tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $vm[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $connection[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $power[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $bootTime[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $maxCpuUsage[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $maxCpuUsage[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $maxMemoryUsage[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $toolsStatus[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $memorySizeMB[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $numCpu[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $numEthernetCards[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $numVirtualDisks[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $overallCpuUsage[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $guestMemoryUsage[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $hostMemoryUsage[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $guestFullName[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $committed[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $uncommitted[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $unshared[$i] );
	echo( "</td>" );
}
echo( "</tr><tr>" );
for( $i = 0;$i < $count; $i++ )
{
	echo( "<td>" );
	echo( $overallStatus[$i] );
	echo( "</td>" );
}
echo( "</tr>" );
echo( "</table>" );
?>

</body>
</html>
