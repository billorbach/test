#!/bin/sh
#saved in vmconnect   
#install vmware tools after operation system is setup.
#sh install-vmtools.sh host-name

server="`sh getip.sh esxi`"
user="root"

	#power on master 
	mastername=$1
	mid=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep $mastername|awk '{print $1}')
	status=$(ssh $user@$server vim-cmd vmsvc/get.summary $mid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	
	if test $status = "poweredOff"
	then
	ssh $user@$server vim-cmd vmsvc/power.on $mid
	fi

	#install vmware tools
	ssh $user@$server vim-cmd vmsvc/tools.install $mid
