<html>
<head>
</head>
<body> 

<?php 
$count = $_GET['count'];
 echo "The number received is ";
 echo  $count;

 $File = "create-vm-script.sh"; 
 $Handle = fopen($File, 'w');
 $Data = "#!/bin/sh\n";
 fwrite($Handle, $Data); 

 //$Data = "number=2\n";
 //fwrite($Handle, $Data); 
 $Data = "#enter the number of vm to create from keyboard\n";
 fwrite($Handle, $Data); 
$Data = "number=";

 fwrite($Handle, $Data); 
 fwrite($Handle, $count); 
 $Data = "\n";
 fwrite($Handle, $Data); 
 //$Data = " #number=$1\n";
 //fwrite($Handle, $Data); 
 $Data = "n=1\n";
 fwrite($Handle, $Data); 
 $Data = "while [ \$n -le \$number ]\n";
 fwrite($Handle, $Data); 
 $Data = "do\n";
 fwrite($Handle, $Data); 

 $Data = "#echo CreateTest_\$n\n";
 fwrite($Handle, $Data); 
 $Data = "mkdir /vmfs/volumes/Delta/CreateTest_\$n\n";
 fwrite($Handle, $Data); 
 $Data = "cp /vmfs/volumes/Delta/base.vmx   /vmfs/volumes/Delta/CreateTest_\$n/\n";
 fwrite($Handle, $Data); 
 $Data = "cd /vmfs/volumes/Delta/CreateTest_\$n/\n";
 fwrite($Handle, $Data); 
 $Data = "#configure vmx file\n";
 fwrite($Handle, $Data); 

 $Data = "echo displayName = \"CreateTest_\$n\" >> base.vmx\n";
 fwrite($Handle, $Data); 
 $Data = "echo nvram =  \"CreateTest_\$n.nvram\" >> base.vmx\n";
 fwrite($Handle, $Data); 
 $Data = "echo sched.swap.derivedName = \"/vmfs/volumes/Delta/CreateTest_\$n/CreateTest_\$n.vswp\" >> base.vmx\n";
 fwrite($Handle, $Data); 
 $Data = "mv base.vmx CreateTest_\$n.vmx\n";
 fwrite($Handle, $Data); 
 $Data = "chmod 744 CreateTest_\$n.vmx\n";
 fwrite($Handle, $Data); 

 $Data = "#register vm\n";
 fwrite($Handle, $Data); 
 $Data = "vim-cmd  solo/registervm /vmfs/volumes/Delta/CreateTest_\$n/CreateTest_\$n.vmx CreateTest_\$n\n";
 fwrite($Handle, $Data); 
 $Data = "n=$(( n+1 ))\n";
 fwrite($Handle, $Data); 
 $Data = "done\n";
 fwrite($Handle, $Data); 

 print "Data Written"; 
 fclose($Handle); 
 ?>
</body>
</html>
