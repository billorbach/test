<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Create Master</title>
<?php include("header.css"); ?>
</head>
<?php include("scrollbody.html"); ?>
<?php include("header.html"); ?>

<div  style="font-size:12px;font-family:Century Gothic;font-weight:bold;font-color:black">

<form action="" method="get">
<br>
We will first select which version of Windows 7.
</br>
Please note: Processing this will take some time.
</br>

<div align="left"><br>
Guest Operating System:
<select name="guest_os" id="guest_os">
  <option value="Microsoft Windows 7 (32-bit)">Microsoft Windows 7 (32-bit)</option>
  <option value="Microsoft Windows 7 (64-bit)">Microsoft Windows 7 (64-bit)</option>
</select>

</br>
</br>
<!--<center><input type="button" value="submit" onClick="next()" /></center>-->
<center>
<img src="images/previous.png" onclick="javascript:create_master_previous()" />
<img src="images/next.png" onclick="javascript:create_master_next()" />
</center>

</form>



</div>

</body>
</html>


