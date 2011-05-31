#!/bin/sh
#saved in vmconnect   /home/jeos/
#Precondition:  this script can be called only after client finishes installing Windows7 system
#run command to create 3 vms using master0.000 as master image:    sh web-create-clone1.sh  master0.000  3
#client is able to access from VNC view type:  server's ip:clone#, for example:  192.168.3.5:2 is to open clone2
#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"

	#power on master 
	mastername=$1
	mid=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep $mastername|awk '{print $1}')
	status=$(ssh $user@$server vim-cmd vmsvc/get.summary $mid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	#echo $mid $status

	if test $status="poweredOff"
	then
	ssh $user@$server vim-cmd vmsvc/power.on $mid
	fi

