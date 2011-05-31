#!/bin/sh
#saved in vmconnect   
#Gets IP Address of current master for RDP.
#sh get_ip_address.sh host-name

server="`sh getip.sh esxi`"
user="root"

        #power on master 
        mastername=$1
        mid=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep $mastername|awk '{print $1}')
        status=$(ssh $user@$server vim-cmd vmsvc/get.summary $mid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')

        #echo $status

        if test $status = "poweredOff"
        then
        #echo "I am starting the vm!!!!!"
        ssh $user@$server vim-cmd vmsvc/power.on $mid
        fi

        #Get IP Address 
        ipAddress=$(ssh $user@$server vim-cmd vmsvc/get.summary $mid|grep 'ipAddress')
        echo $ipAddress
	exit $ipAddress
