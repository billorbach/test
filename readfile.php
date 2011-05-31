<html>
<head>
<!--<?php include("stye.css"); ?>-->
</head>
<body>

<?php
$file_handle = fopen("testing4", "r");
while (!feof($file_handle))
{
   $line = fgets($file_handle);
   if( ( substr( $line, 0, 7 ) ) == "   vm =" )
   {
	echo( "</table>" );
	echo( "</br></br>" );
	echo( "<table border=\"10\" border-style=\"ridge\" border-color=\"gray\">" );
   }
   echo "<tr><td>";
   echo $line;
   echo "</td></tr>";
}
fclose($file_handle);

?>
</tr>
</table>
</body>
</html>

