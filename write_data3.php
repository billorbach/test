<html>
<head>
</head>
<body> 


<?php 

$master_name = $_GET['master_name'];
 echo "Master Name= ";
 echo  $master_name;
 echo "</br>";
$storage = $_GET['storage'];
 echo "Storage= ";
 echo  $storage;
 echo "</br>";
$guest_os = $_GET['guest_os'];
 echo "OS= ";
 echo  $os;
 echo "</br>";
$processors = $_GET['processors'];
 echo "Processors= ";
 echo  $processors;
 echo "</br>";
$memory = $_GET['memory'];
 echo "Memory= ";
 echo  $memory;
 echo "</br>";
$network = $_GET['network'];
 echo "Network= ";
 echo  $network;
 echo "</br>";
$virtual_disk = $_GET['virtual_disk'];
 echo "Virtual Disk = ";
 echo  $virtual_disk;
 echo "</br>";
$virtual_disk_size = $_GET['virtual_disk_size'];
 echo "Virtual Disk Size= ";
 echo  $virtual_disk_size;
 echo "</br>";
$existing_virtual_disk = $_GET['existing_virtual_disk'];
 echo "Existing Virtual Disk= ";
 echo  $existing_virtual_disk;
 echo "</br>";

 $File = "create_master.sh"; 
 $Handle = fopen($File, 'w');
 $Data = "#!/bin/sh\n";
 fwrite($Handle, $Data); 
 $Data = "n=5\n";
 fwrite($Handle, $Data); 

 $Data = "echo \$n\n";
 fwrite($Handle, $Data); 
 $Data = "#while [ \$n -le \$number ]\n";
 fwrite($Handle, $Data); 
 $Data="#do\n";
 fwrite($Handle, $Data); 
 $Data="#echo master0.00\$n\n";
 fwrite($Handle, $Data); 
 $Data="mkdir /vmfs/volumes/Storage/master0.00\$n\n";
 fwrite($Handle, $Data); 

 $Data="cp /vmfs/volumes/Storage/base_master.vmx   /vmfs/volumes/Storage/master0.00\$n/\n";
 fwrite($Handle, $Data); 
 $Data="cd /vmfs/volumes/Storage/master0.00\$n/\n";
 fwrite($Handle, $Data); 
    

 $Data="#configure vmx file\n";
 fwrite($Handle, $Data); 
 $Data="echo displayName = \"master0.00\$n\" >> base_master.vmx\n";
 fwrite($Handle, $Data); 
 $Data="echo nvram = \"master0.00\$n.nvram\" >> base_master.vmx\n";
 fwrite($Handle, $Data); 

 $Data="echo extendedConfigFile  = \"master0.00\$n.vmxf\" >> base_master.vmx\n";
 fwrite($Handle, $Data); 

 $Data="echo scsi0:0.fileName = \"master0.00\$n.vmdk\" >> base_master.vmx\n";
 fwrite($Handle, $Data); 

 $Data="mv base_master.vmx master0.00\$n.vmx\n";
 fwrite($Handle, $Data); 

 $Data="#generate vmdk file\n";
 fwrite($Handle, $Data); 
 $Data="vmkfstools -c 24G -a lsilogic master0.00\$n.vmdk\n";
 fwrite($Handle, $Data); 

 $Data="#register vm\n";
 fwrite($Handle, $Data); 
 $Data="vim-cmd  solo/registervm /vmfs/volumes/Storage/master0.00\$n/master0.00\$n.vmx master0.00\$n\n";
 fwrite($Handle, $Data); 
 $Data="#n=$(( n+1 ))\n";
 fwrite($Handle, $Data); 
 $Data="#done\n";
 fwrite($Handle, $Data); 
 print "Data Written\n"; 
 fclose($Handle); 


 ?>

</body>
</html>


