<?php
function createOutput($image, $previous, $next )
{
	echo "<center>";
	echo "<img src=\"images/previous.png\" onclick=\"javascript:edit_master_previous()\" />";
	echo "<img src=\"images/next.png\" onclick=\"javascript:edit_master_next()\" />";
	echo "</center>";
	echo "</br>";
	echo "<center>";
	echo "<img src=\"$image\" height=\"300\" width=\"300\" />";
	//echo "<img src=\"$image\" />";
        echo "</center>";
	echo "</div>";
}
?>
