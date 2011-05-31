<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Create Master</title>
<?php include("header.css"); ?>
</head>
<body >
<?php include("header.html"); ?>

<div  class="box" style="position:absolute;top:200px;left:10%;font-size:22px;font-family:Century Gothic;font-weight:bold;color:#fff">

<form action="write_master.php" method="get">

<div align="left"><br>
Name of New Master: <input type="text" name="master_name" size="30" value="master0.000" />
</br>
</div>
<div align="left"><br>
Type of DataStorage:
<select name="storage_type">
  <option value="Master">Master</option>
  <option value="Storage">Storage</option>
  <option value="Delta">Delta</option>
</select>
</br>
</div>
<div align="left"><br>
Guest Operating System: <input type="text" name="guest_os" size="30" value="Windows7 (32) bit" />
</br>
</div>
<div align="left"><br>
Number of Processors:
<select name="processors">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</br>
</div>
<div align="left"><br>
Memory Size:
<select name="memory">
  <option value="512MB">512MB</option>
  <option value="1GB">1GB</option>
  <option value="1.5GB">1.5GB</option>
  <option value="2GB">2GB</option>
  <option value="2.5GB">2.5GB</option>
  <option value="3GB">3GB</option>
  <option value="3.5GB">3.5GB</option>
  <option value="4GB">4GB</option>
  <option value="4.5GB">4.5GB</option>
  <option value="5GB">5GB</option>
  <option value="5.5GB">5.5GB</option>
  <option value="6GB">6GB</option>
</select>
</br>
</div>

<div align="left"><br>
Number of Network Interfaces:
<select name="network_number">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</br>
</div>

<div align="left"><br>
Type of Network Interface:
<select name="network_interface">
  <option value="e1000">E1000</option>
  <option value="flexible">Flexible</option>
  <option value="vmxnet">VMXNet</option>
  <option value="vmxnet3">VMXNet3</option>
</select>
</br>
</div>

<div align="left"><br>
SCSI Controller:
<select name="scsi_controller">
  <option value="buslogic-parallel">Buslogic Parallel</option>
  <option value="lsilogic">Lsilogic Parallel</option>
  <option value="lsisas1068">Lsilogic SAS</option>
  <option value="pvscsi">VMWare Paravirtual</option>
</select>
</br>
</div>
<div align="left"><br>
Virtual Disk<br>
<input type="radio" name="virtual_disk" value="create_new" checked>Create New Virtual Disk<br>
Disk Size:
<select name="virtual_disk_size">
  <option value="5GB">5GB</option>
  <option value="10GB">10GB</option>
  <option value="15GB">15GB</option>
  <option value="20GB">20GB</option>
  <option value="30GB">30GB</option>
  <option value="40GB">40GB</option>
</select>
</br>

Disk Mode:
<select name="virtual_disk_mode">
  <option value="independent-persistent">Independent/Persistent</option>
  <option value="independent-nonpersistent">Independent/NonPersistent</option>
  <option value="persistent">Not Independent</option>
</select>
</br>

<input type="radio" name="virtual_disk" value="use_existing"> Use Existing Virtual Disk<br>
Existing Virtual Disk: <input type="text" name="existing_virtual_disk" size="30" value="" /><br>
<input type="radio" name="virtual_disk" value="no_disk"> No Disk<br>
</div>

<center><input class="button" type="submit" value="Submit" /></center>


</form>



</div>
</body>
</html>


