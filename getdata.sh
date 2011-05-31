#!/bin/sh

names=$(vim-cmd vmsvc/getallvms | awk '{print $1}')

 for f in $names
 do
 if [ "$f" != "Vmid"  ];
   then
       vim-cmd vmsvc/get.summary $f >> testing
       vim-cmd vmsvc/get.summary $f > $f.txt
       grep "VirtualMachine" $f.txt >> testing2
       grep "connectionState" $f.txt >> testing2
       grep "powerState" $f.txt >> testing2
       grep "bootTime" $f.txt >> testing2
       grep "maxCpuUsage" $f.txt >> testing2 
       grep "maxMemoryUsage" $f.txt >> testing2 
       grep "toolsStatus" $f.txt >> testing2 
       grep "vmPathName" $f.txt >> testing2 
       grep "memorySizeMB" $f.txt >> testing2 
       grep "numCpu" $f.txt >> testing2
       grep "numEthernetCards" $f.txt >> testing2 
       grep "numVirtualDisks" $f.txt >> testing2 
       grep "overallCpuUsage" $f.txt >> testing2 
       grep "guestMemoryUsage" $f.txt >> testing2 
       grep "hostMemoryUsage" $f.txt >> testing2 
       grep "guestFullName" $f.txt >> testing2 
       grep "committed" $f.txt >> testing2 
       grep "uncommitted" $f.txt >> testing2 
       grep "unshared" $f.txt >> testing2 
       grep "getHeartbeatStatus" $f.txt >> testing2 
       grep "overallStatus" $f.txt >> testing2 
 fi
 done
