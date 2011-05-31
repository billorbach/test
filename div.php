<?php include("password_protect.php"); ?>
<html>
<head>
<title>Configuration Manager</title>

<style type="text/css">
body {margin:0;padding:0;height:100%;}
div.leftdiv {float:left;height:100%;width:15%;border-style:solid;border-width:1px;border-color:gray;background-color:#ffffff;color:#000000;font-size:16px;text-align:center;} 
div.rightdiv {float:right;height:3%;width:83%;border-style:solid;border-width:1px;border-color:gray;background-color:#ffffff;color:#000000;font-size:16px;text-align:center;}
div.rightdiv2 {float:right;height:95%;width:83%;border-style:solid;border-width:1px;border-color:gray;background-color:#ffffff;color:#000000;font-size:22px;font-family:Century Gothic;font-weight:bold;text-align:center;}
</style>

<?php include("head1.css"); ?>
<script type="text/javascript">
function pageScroll( $amount) 
{
    	iframe1.window.scrollBy(0,$amount); // horizontal and vertical scroll increments
    	//scrolldelay = setTimeout('pageScroll()',100); // scrolls every 100 milliseconds
}
function setCreateMasterPages( ) 
{
    	iframe1.window.location = "div1.php";
    	iframe2.window.location = "create_master_intro.php";
}
function setMonitorPages( ) 
{
    	iframe1.window.location = "div2.php";
    	iframe2.window.location = "readfile_all.php";
}
function setDiagnosticPages( ) 
{
    	iframe1.window.location = "div3.php";
    	iframe2.window.location = "expand3.php";
}
</script>
</head>
<body>

<div class="leftdiv">
<p><IFRAME name="iframe1" src="div1.php" width="100%" height="100%" scrolling="auto" frameborder="0"></IFRAME></p>
</div>

<div class="rightdiv">
<ul class="tabs">
<li><a href="javascript:setCreateMasterPages()"><span>Create Master</span></a></li>
<li><a href="edit_master_intro.php" target="iframe2"><span>Edit Master</span></a></li>
<li><a href="revert_master_intro.php" target="iframe2"><span>Revert Master</span></a></li>
<li><a href="javascript:setMonitorPages()"><span>Monitor System</span></a></li>
<?php
//<!--Important: The next line is for diagnostic purposes. Do not remove!!!!!-->
if (isset($_GET['diag']) && $_GET['diag'] != "") 
       echo "<li><a href=\"javascript:setDiagnosticPages()\"><span>Diagnostics</span></a></li>";
?>
</ul>

</div>


<div class="rightdiv2">
<p id='configuration'> <IFRAME name="iframe2" src="" height="100%" width="100%"></IFRAME></p>
</div>
<!--<a href="javascript:pageScroll( 300 )"><img src=\"images/previous.png\" /></a>-->
</body> 
</html> 


