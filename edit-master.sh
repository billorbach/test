#!/bin/sh

cd /vmfs/volumes/Storage/
rm  -rf copymaster

#n=0
premaster="VNCtest"

#poweroff old master
id=$(vim-cmd vmsvc/getallvms|grep $premaster|awk '{print $1}')
powerstatus=$(vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
#echo $id $powerstatus

if test $powerstatus="poweredOn"
then
vim-cmd vmsvc/power.off $id
fi


#mkdir newmaster
newmaster=copymaster
mkdir $newmaster


#copy and rename vmx, vmdk,flat.vmdk,nvram
cp $premaster/$premaster.vmx   $newmaster/$newmaster.vmx
cp $premaster/$premaster.vmdk  $newmaster/$newmaster.vmdk
cp $premaster/$premaster.nvram   $newmaster/$newmaster.nvram

#cp /vmfs/volumes/Storage/VNCtest/VNCtest.vmx  /vmfs/volumes/Storage/copymaster/copymaster.vmx
#cp /vmfs/volumes/Storage/VNCtest/VNCtest.vmdk  /vmfs/volumes/Storage/copymaster/copymaster.vmdk
#cp /vmfs/volumes/Storage/VNCtest/VNCtest.nvram  /vmfs/volumes/Storage/copymaster/copymaster.nvram
cp $path$premaster/$premaster-flat.vmdk   $path$newmaster/$newmaster-flat.vmdk


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
vim-cmd   solo/registervm    /vmfs/volumes/Storage/$newmaster/$newmaster.vmx $newmaster


#power on newmaster
nid=$(vim-cmd vmsvc/getallvms|grep $newmaster|awk '{print $1}')
nstatus=$(vim-cmd vmsvc/get.summary $nid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
#echo $nid $nstatus

if test $nstatus="poweredOff"
then
vim-cmd vmsvc/power.on $nid
fi


#change the master name in create-clone.sh




