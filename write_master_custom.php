<html>
<head>
</head>
<body> 

<?php include("exec_system.php"); ?>

<?php 
$master_name = $_GET['master_name'];
 echo "Master Name= ";
 echo  $master_name;
 echo "</br>";
$storage_type = $_GET['storage_type'];
 echo "Storage Type= ";
 echo  $storage_type;
 echo "</br>";
$guest_os = $_GET['guest_os'];
 echo "OS= ";
 echo  $guest_os;
 echo "</br>";
$processors = $_GET['processors'];
 echo "Processors= ";
 echo  $processors;
 echo "</br>";
$memory = $_GET['memory'];
 echo "Memory= ";
 echo  $memory;
 echo "</br>";
$network_number = $_GET['network_number'];
 echo "Number of Network= ";
 echo  $network_number;
 echo "</br>";
$network_interface = $_GET['network_interface'];
 echo "Network Interface= ";
 echo  $network_interface;
 echo "</br>";
$scsi_controller = $_GET['scsi_controller'];
 echo "Scsi Controller= ";
 echo  $scsi_controller;
 echo "</br>";
$virtual_disk = $_GET['virtual_disk'];
 echo "Virtual Disk = ";
 echo  $virtual_disk;
 echo "</br>";
$virtual_disk_size = $_GET['virtual_disk_size'];
 echo "Virtual Disk Size= ";
 echo  $virtual_disk_size;
 echo "</br>";
$virtual_disk_mode = $_GET['virtual_disk_mode'];
 echo "Virtual Disk Mode= ";
 echo  $virtual_disk_mode;
 echo "</br>";
$existing_virtual_disk = $_GET['existing_virtual_disk'];
 echo "Existing Virtual Disk= ";
 echo  $existing_virtual_disk;
 echo "</br>";



$File = "create-master.sh"; 
$Handle = fopen($File, 'w');
$Data="#!/bin/sh\n\n";
fwrite($Handle, $Data); 

$Data="n=4\n";
fwrite($Handle, $Data); 
$Data="ShownName=$master_name\n";
fwrite($Handle, $Data); 
$Data="datastore=$storage_type\n";
fwrite($Handle, $Data); 
$Data="isofilename=\"Windows-7_32-bit2.iso\"\n";
fwrite($Handle, $Data); 
$Data="isopath=\/vmfs\/volumes\/\$datastore\/OS\/\$isofilename\n";
fwrite($Handle, $Data); 
$Data="osAltName=\"Microsoft Windows 7 (32-bit)\"\n";
fwrite($Handle, $Data); 
$Data="NICs=\"VM Network\"\n";
fwrite($Handle, $Data); 
$Data="Adapter=$network_interface\n";
fwrite($Handle, $Data); 
$Data="#E1000 Flexible  VMXNet2-Enhanced VMXNet3\n";
fwrite($Handle, $Data); 
$Data="SCSIcontroller=$scsi_controller\n";  
fwrite($Handle, $Data); 
$Data="#buslogic-Parallel   Lsilogic-Parallel Lsilogic-SAS  VMWare-Paravirtual\n";
fwrite($Handle, $Data); 
$Data="memorysize=$memory\n";
fwrite($Handle, $Data); 
$Data="guestos=$guest_os\n";
fwrite($Handle, $Data); 
$Data="virtualversion=7\n";
fwrite($Handle, $Data); 
$Data="Disksize=$virtual_disk_size\n";
fwrite($Handle, $Data); 
$Data="vmdklogic=lsilogic\n";
fwrite($Handle, $Data); 
$Data="virutaldev=\"scsi-hardDisk\"\n\n";
fwrite($Handle, $Data); 

$Data="cd /vmfs/volumes/\n";
fwrite($Handle, $Data); 
$Data="cd \$datastore\n";
fwrite($Handle, $Data); 
$Data="mkdir \$ShownName\n";
fwrite($Handle, $Data); 
$Data="cp base_master.vmx   \$ShownName/\n";
fwrite($Handle, $Data); 
$Data="cd \$ShownName/\n\n\n";
fwrite($Handle, $Data); 
     

$Data="#configure vmx file\n";
fwrite($Handle, $Data); 
$Data="echo virtualHW.version = \"\$virtualversion\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo scsi0.virtualDev = \"\$SCSIcontroller\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo ethernet0.virtualDev = \"\$Adapter\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo ethernet0.networkName = \"\$NICs\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo guestOSAltName = \"\$osAltName\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo guestOS = \"\$guestos\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo memsize = \"\$memorysize\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo ide1:0.fileName = \"\$isopath\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo displayName = \"\$ShownName\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo nvram = \"\$ShownName.nvram\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo extendedConfigFile  = \"\$ShownName.vmxf\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo scsi0:0.fileName = \"\$ShownName.vmdk\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo scsi0:0.deviceType = \"\$virutaldev\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="mv base_master.vmx \$ShownName.vmx\n\n";
fwrite($Handle, $Data); 

$Data="#generate vmdk file\n";
fwrite($Handle, $Data); 
$Data="vmkfstools -c \$Disksize -a \$vmdklogic \$ShownName.vmdk\n\n";
fwrite($Handle, $Data); 

$Data="#register vm\n";
fwrite($Handle, $Data); 
$Data="vim-cmd  solo/registervm /vmfs/volumes/\$datastore/\$ShownName/\$ShownName.vmx \$ShownName\n\n";
fwrite($Handle, $Data); 

/*
$Data="displayName = \"\$ShownName\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo nvram = \"\$ShownName.nvram\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo extendedConfigFile  = \"\$ShownName.vmxf\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo scsi0:0.fileName = \"\$ShownName.vmdk\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="echo scsi0:0.deviceType = \"\$virutaldev\" >> base_master.vmx\n";
fwrite($Handle, $Data); 
$Data="mv base_master.vmx \$ShownName.vmx\n\n";
fwrite($Handle, $Data); 

$Data="#generate vmdk file\n";
fwrite($Handle, $Data); 
$Data="vmkfstools -c \$Disksize -a \$vmdklogic \$ShownName.vmdk\n\n";
fwrite($Handle, $Data); 

$Data="#register vm\n";
fwrite($Handle, $Data); 
$Data="vim-cmd  solo/registervm /\n";
fwrite($Handle, $Data); 
*/
fclose($Handle); 

 print "Data Written\n"; 
//system( 'sh create-master.sh', $retval );
exec_system( 'sh create-master.sh', $retval );
echo $retval;

 ?>
</body>
</html>




