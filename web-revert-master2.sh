#!/bin/sh

#upload to esxiserver  /vmfs/volumes/Storage/

#the image master0.001 is to be replaced,  client will use  master0.000, 
#command is  sh web-revert-master1.sh   master0.000  3

power_on=$3
NewMasterName=$1
Number=$2
n=1

#power off master 
mid=$(vim-cmd vmsvc/getallvms|grep $NewMasterName|awk '{print $1}')
status=$(vim-cmd vmsvc/get.summary $mid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
#echo $mid $status
if test $status = "poweredOn"
then
vim-cmd vmsvc/power.shutdown $mid
fi


cd    /vmfs/volumes/Delta/
while [ $n -le $Number ]
do
	DIRECTORY=Clone_$n
	if [ -d "$DIRECTORY" ]; then	
		#get vmid
		id=$(vim-cmd vmsvc/getallvms|grep $DIRECTORY|awk '{print $1}')
		powerst=$(vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
		
		#power off Clone
		if test $powerst = "poweredOn"
		then
			vim-cmd vmsvc/power.off $id
		fi

		sleep 10

		#edit vmx,delete some lines 
		cd  Clone_$n/
		sed '/scsi0:0.fileName/d' $DIRECTORY.vmx >1
		sed '/scsi0:0.redo/d' 1 > 2
		rm 1
	
		#add some lines
		echo "scsi0:0.fileName = "/vmfs/volumes/Master/$NewMasterName/$NewMasterName.vmdk"" >> 2
		echo "scsi0:0.redo = "./$NewMasterName.vmdk.REDO_UWxTUZ"" >> 2
		mv 2  $DIRECTORY.vmx	

		#power on Clone
		if[ $n -le $power_on ];then
			vim-cmd vmsvc/power.on $id
		fi

		#power on Clone
		##vim-cmd vmsvc/power.on $id

	fi

	cd    /vmfs/volumes/Delta/
	n=$(( n+1 ))
done



