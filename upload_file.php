<html>
<head>
</head>
<?php include("scrollbody.html"); ?>

<body onload="parent.pageScroll(60);"> 
<div  style="font-size:22px;font-family:Century Gothic;font-weight:bold;color:#fff;background-color:#353a33">
Please select the location of the iso file.
</br>
Please use the Chrome browser for this upload.
</br>

<form action="upload_file2.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</div>

</body>
</html>
