#!/bin/sh
#saved in vmconnect  /home/jeos/ , but run in esxi server

#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"
ShownName=$1    #"master1.0"
vmxpath="/vmfs/volumes/Master/$ShownName/"
#isofilename=$2  #"Windows-7_32-bit2.iso"
#isopath="/vmfs/volumes/Delta/upload/$isofilename"
#osAltName=$3  #"Microsoft Windows 7 (32-bit)"
Disksize=16G
vmdklogic=lsilogic

#generate vmdk file
ssh $user@$server vmkfstools -c $Disksize -a $vmdklogic $vmxpath$ShownName.vmdk

#register vm
ssh $user@$server vim-cmd   solo/registervm     $vmxpath$ShownName.vmx   $ShownName

#power on master
id=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep $ShownName|awk '{print $1}')
powerstatus=$(ssh $user@$server vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	
if test $powerstatus = "poweredOff"
then
ssh $user@$server vim-cmd vmsvc/power.on $id
fi

