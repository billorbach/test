#!/bin/sh
#saved in vmconnect /home/jeos/
#then upload to the server /vmfs/volumes/Delta/

#only when user finish editing the new master image can run the following command
#ssh $user@$server sh /vmfs/volumes/Storage/web-edit-master2.sh $1 $2 $3
#when client finishes editing the system, the new master should be poweredoff
#command:  sh web-edit-master2.sh  current_image_name  #_clones
#          sh web-edit-master2.sh  master0.001  3

$power_on=$3
NewMasterName=$1
Number=$2
n=1

#power off NewMasterName
mid=$(vim-cmd vmsvc/getallvms|grep $NewMasterName|awk '{print $1}')
powerstatus=$(vim-cmd vmsvc/get.summary $mid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
#echo $NewMasterName $mid $powerstatus
if test $powerstatus="poweredOn"
then
vim-cmd vmsvc/power.off $mid
fi

count=0
cd    /vmfs/volumes/Delta/
while [ $n -le $Number ]
do
	DIRECTORY=Clone_$n
	#check if directory exists, only work when exists
	if [ -d "$DIRECTORY" ]; then
	
		#id=$(vim-cmd vmsvc/getallvms|grep Clone_$n/Clone_$n.vmx |awk '{print $1}')
		#powerst=$(vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')

		#power off Clone
		#if test $powerst = "poweredOn"
		#then
		#	vim-cmd vmsvc/power.off $id
		#fi

		#sleep 10

		cd  Clone_$n/
		sh update.sh $NewMasterName

		#edit vmx,delete some lines 
		#cd  Clone_$n/
		#sed '/scsi0:0.fileName/d' $DIRECTORY.vmx >1
		#sed '/scsi0:0.redo/d' 1 > 2
		#rm 1
	
		#add some lines
		#echo "scsi0:0.fileName = "/vmfs/volumes/Master/$NewMasterName/$NewMasterName.vmdk"" >> 2
		#echo "scsi0:0.redo = "./$NewMasterName.vmdk.REDO_UWxTUZ"" >> 2
		#mv 2  $DIRECTORY.vmx	

		#power on Clone
		#if[ $n -le $power_on ];then
		#	vim-cmd vmsvc/power.on $id
		#fi
			
	fi
	
	cd /vmfs/volumes/Delta/
	n=$(( n+1 ))
	
done



