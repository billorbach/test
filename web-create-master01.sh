#!/bin/sh
#saved in vmconnect  /home/jeos/ , but run in esxi server

#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"
n=0
ShownName=$1    #"master0.00$n"


#power off master
id=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep $ShownName|awk '{print $1}')
powerstatus=$(ssh $user@$server vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	
if test $powerstatus = "poweredOn"
then
ssh $user@$server vim-cmd vmsvc/power.shutdown $id
fi

#unregister vm
#ssh $user@$server vim-cmd vmsvc/unregister $id

