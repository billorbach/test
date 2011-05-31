<html>
<head>
<?php include("header.css"); ?>
<script type="text/javascript" src="size.js">
</script>

</head>
<?php include("scrollbody.html"); ?>
<?php include("header.html"); ?>
<center>

<?php include("explain.html"); ?>
<?php include("template.php"); ?>

var winH = 0;
var winW = 0;

<script type="text/javascript" language="JavaScript">
         winH = getWindowHeight();
         winW = getWindowWidth();
      </script>

<?php
createOutput( "images/12.jpg", "write_master19.php", "write_master21.php", winH, winW );
?>
</body>
</html>


