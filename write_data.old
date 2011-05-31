<html>
<head>
</head>
<body> 


<?php 
$count = $_GET['count'];
 echo "The number received is ";
 echo  $count;

 $File = "clean-vm-script.sh"; 
 $Handle = fopen($File, 'w');
 $Data = "#!/bin/sh\n";
 fwrite($Handle, $Data); 
 $Data = "#number=2\n";
 fwrite($Handle, $Data); 
 $Data = "#enter the number of vm to delete\n";
 fwrite($Handle, $Data); 
 $Data = "number=";

 fwrite($Handle, $Data); 
 fwrite($Handle, $count); 
 $Data = "\n";
 fwrite($Handle, $Data); 
 $Data = "n=1\n";
 fwrite($Handle, $Data); 
 $Data = "while [ \$n -le \$number ]\n";
 fwrite($Handle, $Data); 
 $Data = "do\n";
 fwrite($Handle, $Data); 
 $Data = "#get vmid\n";
 fwrite($Handle, $Data); 
 $Data = "id=$(vim-cmd vmsvc/getallvms|grep CreateTest_\$n|awk '{print \$1}')\n";
 fwrite($Handle, $Data); 
 $Data = "#shutdown\n";
 fwrite($Handle, $Data); 
 $Data = "vim-cmd vmsvc/powered.off \$id\n";
 fwrite($Handle, $Data); 
 $Data = "#unregister vm\n";
 fwrite($Handle, $Data); 
 $Data = "vim-cmd vmsvc/unregister \$id\n";
 fwrite($Handle, $Data); 
 $Data = "#clear vmx file\n";
 fwrite($Handle, $Data); 
 $Data = "cd /vmfs/volumes/Delta/CreateTest_\$n/\n";
 fwrite($Handle, $Data); 
 $Data = "rm *\n";
 fwrite($Handle, $Data); 
 $Data = "cd /vmfs/volumes/Delta\n";
 fwrite($Handle, $Data); 
 $Data = "rmdir /vmfs/volumes/Delta/CreateTest_\$n\n";
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
