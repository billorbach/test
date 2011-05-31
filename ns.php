<html>
<head>
</head>
<body>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
echo "<bold>" . $ip . "</bold></br></br>";

for ( $counter = 1; $counter <= 256; $counter++)
{
$command = "wget 192.168.3." . $counter;
system( $command , $retval);
echo $command . " returns a " . $retval . "</br>";
}
?>
</body>
</html>
        
