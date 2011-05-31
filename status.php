<?php include("expand.php"); ?>

<div  style="font-size:22px;font-family:Century Gothic;font-weight:bold;color:#fff;background-color:#353a33">
</br>
<?php 
$String = "cat status.txt 2>&1";
//echo $String;
$handle = popen( $String, 'r');
while (!feof($handle)) 
{ 
   $data = fgets($handle, 512); 
   echo $data; 
   echo "<br>"; 
} 
pclose($handle);

?>
</div>
</body>
</html>


