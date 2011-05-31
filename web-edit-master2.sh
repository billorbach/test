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
vim-cmd vmsvc/power.shutdown $mid
fi

count=0
cd    /vmfs/volumes/Delta/
while [ $n -le $Number ]
do
	DIRECTORY=Clone_$n
	#check if directory exists, only work when exists
	if [ -d "$DIRECTORY" ]; then
		#id=$(vim-cmd vmsvc/getallvms|grep Clone_$n/Clone_$n.vmx |awk '{print $1}')
		#echo "id at n is " $id
		#powerstatus=$(vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	
		#if test $powerstatus = "poweredOn"
		#then
		#	vim-cmd vmsvc/power.off $id
		#fi

		#unregister vm
		#vim-cmd vmsvc/unregister $id

		#update vmx file
		cd  Clone_$n/
		sh update.sh $NewMasterName

		#register vm
		#vim-cmd  solo/registervm /vmfs/volumes/Delta/Clone_$n/Clone_$n.vmx Clone_$n

		#if test $powerstatus = "poweredOn"
		#then
		#	id=$(vim-cmd vmsvc/getallvms|grep Clone_$n/Clone_$n.vmx |awk '{print $1}')
		#	vim-cmd vmsvc/power.on $id
		#fi
	fi
	
	cd /vmfs/volumes/Delta/
	n=$(( n+1 ))
	
done



