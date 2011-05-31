#!/bin/sh
#saved in vmconnect   /home/jeos/
#Precondition:  this script can be called only after client finishes installing Windows7 system
#run command to create 3 vms using master0.000 as master image:    sh web-create-Clone1.sh  master0.000  3
#client is able to access from VNC view type:  server's ip:Clone#, for example:  192.168.3.5:2 is to open Clone2
#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"

	#power off master 
	mastername=$1
	mid=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep $mastername|awk '{print $1}')
	status=$(ssh $user@$server vim-cmd vmsvc/get.summary $mid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	echo $mid $status

	if test $status = "poweredOn"
	then
		ssh $user@$server vim-cmd vmsvc/power.shutdown $mid
	fi

power_on=$3
number=$2
n=1
count="0"

while [ $n -le $number ]
do
	#power off Clone
        #clone=`echo Clone_$n/Clone_$n.vmx`
        #echo $clone
	#id=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep Clone_$n/Clone_$n.vmx |awk '{print $1}')
	#echo "id at n is " $id
	#powerstatus=$(ssh $user@$server vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	
	#if test $powerstatus = "poweredOn"
	#then
	#	ssh $user@$server vim-cmd vmsvc/power.off $id
	#fi

	#unregister vm
	#ssh $user@$server vim-cmd vmsvc/unregister $id

	#delete the old Clone
	#ssh $user@$server rm -rf /vmfs/volumes/Delta/Clone_$n	

	#localpath=/var/www/nginx-default/virtual_machines/
	#cd $localpath

	#generate vmx file
	#rm Clone_$n.vmx
	#cp base_clone.vmx   Clone_$n.vmx
	#serverpath="/vmfs/volumes/Delta/Clone_$n/Clone_$n.vswp"
	#echo displayName = \"Clone_$n\" >> Clone_$n.vmx
	#echo nvram = \"Clone_$n.nvram\" >> Clone_$n.vmx
	#echo sched.swap.derivedName = \"$serverpath\" >> Clone_$n.vmx
	#echo scsi0:0.fileName = "/vmfs/volumes/Master/$mastername/$mastername.vmdk" >> Clone_$n.vmx

	#enable vnc client access
	#echo RemoteDisplay.vnc.enabled = \"True\" >> Clone_$n.vmx
   	#echo RemoteDisplay.vnc.port = \"590$n\" >> Clone_$n.vmx

	#cat Clone_$n.vmx
	#chmod 744 Clone_$n.vmx
	
	#ssh $user@$server rm -rf /vmfs/volumes/Delta/Clone_$n	
	
	#if [ ! -d "Clone_"$n ]; then
		#create folder Clone_$n
		#ssh $user@$server mkdir /vmfs/volumes/Delta/Clone_$n

		#scp vmx file to Clone_$n	
		#scp /var/www/nginx-default/virtual_machines/Clone_$n.vmx  $user@$server:/vmfs/volumes/Delta/Clone_$n/
		#scp /var/www/nginx-default/update.sh  $user@$server:/vmfs/volumes/Delta/Clone_$n/update.sh
		#ssh $user@$server chmod 777 /vmfs/volumes/Delta/Clone_$n/update.sh
		ssh $user@$server sh /vmfs/volumes/Delta/Clone_$n/update.sh $mastername
		#echo "id is " $id     
		#register vm
		#if [ $id -le "0" ]; then
		#	ssh $user@$server vim-cmd  solo/registervm /vmfs/volumes/Delta/Clone_$n/Clone_$n.vmx Clone_$n
                #	echo "registering the VM"
		#fi
	#fi

	#power on Clone 
	#if [ $count -lt "10" ]; then
        echo "n is " $n " and power_on is " $power_on
        echo "working on clone " $n

	if [ $n -le $power_on ]; then
		#count=$(( count+1 ))
		id=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep Clone_$n/Clone_$n.vmx |awk '{print $1}')

		#id=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep Clone_$n|awk '{print $1}')
		echo "id in power on scheme is " $id
		powerstatus=$(ssh $user@$server vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
		echo $id $powerstatus
		if test $powerstatus="poweredOff"
		then
			ssh $user@$server vim-cmd vmsvc/power.on $id
		fi
	fi	

	
	rm  /var/www/nginx-default/virtual_machines/Clone_$n.vmx
	n=$(( n+1 ))
	#$id=0
done

#power off master 
	mid=$(ssh $user@$server vim-cmd vmsvc/getallvms|grep $mastername|awk '{print $1}')
	status=$(ssh $user@$server vim-cmd vmsvc/get.summary $mid|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	echo $mid $status

	if test $status = "poweredOn"
	then
	ssh $user@$server vim-cmd vmsvc/power.shutdown $mid
	fi

