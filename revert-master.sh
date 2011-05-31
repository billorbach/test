#!/bin/sh

OldMasterName="copymaster"
NewMasterName="VNCtest"
Number=$1
n=1

#chmod 744 edit-master.sh
#sh  edit-master.sh  $OldMasterName $NewMasterName


cd    /vmfs/volumes/Storage/
while [ $n -le $Number ]
do
	DIRECTORY=CreateTest_$n
	if [ -d "$DIRECTORY" ]; then

		#get vmid
		id=$(vim-cmd vmsvc/getallvms|grep $DIRECTORY|awk '{print $1}')

		#shutdown
		vim-cmd vmsvc/power.off $id

		#edit vmx
		cd  CreateTest_$n/
		sed '/scsi0:0.fileName/d' $DIRECTORY.vmx >1
		sed '/scsi0:0.redo/d' 1 > 2
		rm 1

		echo "scsi0:0.fileName = "/vmfs/volumes/Storage/$NewMasterName/$NewMasterName.vmdk"" >> 2
		echo "scsi0:0.redo = "./$NewMasterName.vmdk.REDO_UWxTUZ"" >> 2
		mv 2  $DIRECTORY.vmx

		#register vm
		vim-cmd   solo/registervm    /vmfs/volumes/Storage/$DIRECTORY/$DIRECTORY.vmx   $DIRECTORY

		#poweron
		vim-cmd vmsvc/power.on $id
	fi

	n=$(( n+1 ))
done
