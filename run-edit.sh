#!/bin/sh

OldMasterName="VNCtest"
NewMasterName="copymaster"
Number=$1
n=1

chmod 744 edit-master.sh
sh  edit-master.sh  $OldMasterName $NewMasterName


while [ $n -le $Number ]
do
	DIRECTORY=CreateTest_$n
	if [ -d "$DIRECTORY" ]; then
	#get vmid
	id=$(vim-cmd vmsvc/getallvms|grep CreateTest_$n|awk '{print $1}')

	#shutdown
	vim-cmd vmsvc/power.off $id

	#unregister vm
	vim-cmd vmsvc/unregister $id

	#edit vmx
	cd /vmfs/volumes/Storage/$CreateTest_Sn/
	sed '/scsi0:1.fileName/d' $CreateTest_Sn.vmx >1
	sed '/scsi0:1.redo/d' 1 > $CreateTest_Sn.vmx
	rm 1

	echo "scsi0:1.fileName = "/vmfs/volumes/Storage/$NewMasterName/$NewMasterName.vmdk"" >> $CreateTest_Sn.vmx
	echo "scsi0:1.fileName = "scsi0:1.redo = "./$NewMasterName.vmdk.REDO_UWxTUZ""" >> $CreateTest_Sn.vmx

	#register vm
	vim-cmd   solo/registervm    /vmfs/volumes/Storage/$CreateTest_Sn/$CreateTest_Sn.vmx   $CreateTest_Sn

	#poweron
	vim-cmd vmsvc/power.on $id
	fi

	n=$(( n+1 ))
done
