#!/bin/sh
#saved in: vmconnect  /home/jeos/    
#upload to esxi server /vmfs/volumes/Delta/
#command       sh   web-edit-master4.sh   master0.000   master0.001 
#VNCviewer command to edit new image:   server's ip:7000    for example: 192.168.3.5:7000
cd /vmfs/volumes/Master/

premaster=$1 
newmaster=$2
rm  -rf $newmaster
mkdir $newmaster

#poweroff old master
id=$(vim-cmd vmsvc/getallvms|grep $premaster|awk '{print $1}')
powerstatus=$(vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
#echo $premaster $id $powerstatus

if test $powerstatus = "poweredOn"
then
vim-cmd vmsvc/power.shutdown $id
fi


#copy and rename vmx, vmdk,flat.vmdk,nvram
cp $premaster/$premaster.vmx   $newmaster/$newmaster.vmx
#cp $premaster/$premaster.vmdk  $newmaster/$newmaster.vmdk
cp $premaster/$premaster.nvram   $newmaster/$newmaster.nvram
#echo "copying flat vmdk"
#cp $path$premaster/$premaster-flat.vmdk   $path$newmaster/$newmaster-flat.vmdk 
vmkfstools -i  $path$premaster/$premaster.vmdk   $path$newmaster/$newmaster.vmdk
cp $newmaster/$newmaster.vmdk  $newmaster/$newmaster.vmdk.back

#search and replace .vmx
cd $newmaster
sed -e "s/$premaster/$newmaster/g" $newmaster.vmx >1
mv 1 $newmaster.vmx


#remove lines in .vmx
#echo 'here now'
sed '/Ethernet0.generatedAddress/d' $newmaster.vmx >2
sed '/uuid/d' 2 > $newmaster.vmx
rm 2


#change name in vmdk 
sed -e "s/$premaster/$newmaster/g" $newmaster.vmdk >3
mv 3 $newmaster.vmdk


#register vm
vim-cmd   solo/registervm    /vmfs/volumes/Master/$newmaster/$newmaster.vmx $newmaster

#power on newmaster
nid=$(vim-cmd vmsvc/getallvms|grep $newmaster|awk '{print $1}')
nstatus=$(vim-cmd vmsvc/get.summary $nid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
#echo $nid $nstatus

if test $nstatus = "poweredOff"
then
vim-cmd vmsvc/power.on $nid
fi

