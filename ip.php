<?php
$ip = $_SERVER['REMOTE_ADDR'];
$dt = date("l dS \of F Y h:i:s A");
$file=fopen("ip_log.txt","a");
$data = $ip.' '.$dt."\n";
fwrite($file, $data);
fclose($file);
header( 'Location: http://www.google.com' ) ;
?>