<html>
<head>
</head>
<?php include("scrollbody.html"); ?>

<?php
error_reporting( E_ALL );
//print_r( $_FILES );
if ($_FILES["file"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
      echo $_FILES["file"]["name"] . " already exists. ";
    }
    else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
}

?>
<div  style="font-size:22px;font-family:Century Gothic;font-weight:bold;color:#fff;background-color:#353a33">

<center>
<h2>You have successfully uploaded 
<?php 
echo $_FILES["file"]["name"]
?>
.  Please click Next to continue.</h2>

<a href="create_master.php"><img src="images/next.png" /></a>
</center>
</div>

</body>
</html>
