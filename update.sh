#!/bin/sh
#saved in vmconnect /home/jeos/
#then upload to the server /vmfs/volumes/Delta/


NewMasterName=$1

	#edit vmx,delete some lines 
	#cd  /vmfs/volumes/Delta/Clone_$n/
	sed '/scsi0:0.fileName/d' *.vmx >1
	sed '/scsi0:0.redo/d' 1 > 2
	rm 1
	
	#add some lines
	echo "scsi0:0.fileName = "/vmfs/volumes/Master/$NewMasterName/$NewMasterName.vmdk"" >> 2
	echo "scsi0:0.redo = "./$NewMasterName.vmdk.REDO_UWxTUZ"" >> 2
	mv 2  *.vmx	

