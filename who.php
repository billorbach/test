<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
echo exec('whoami');
echo "</br>";
echo exec('ls -ltr *');
echo "</br>";
echo exec( 'pwd' );
echo "</br>";
echo shell_exec( "sh copy.sh  Windows-7_32-bit2.iso" );
echo "</br>";
?>
