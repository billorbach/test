#!/bin/sh

server="`sh getip.sh esxi`"
user="root"

number=100
n=1
count="0"

while [ $n -le $number ]
do

	localpath=/var/www/nginx-default/virtual_machines/
	cd $localpath

	#generate vmx file
	rm Clone_$n.vmx
	cp base_clone.vmx   Clone_$n.vmx
	serverpath="/vmfs/volumes/Delta/Clone_$n/Clone_$n.vswp"
	echo displayName = \"Clone_$n\" >> Clone_$n.vmx
	echo nvram = \"Clone_$n.nvram\" >> Clone_$n.vmx
	echo sched.swap.derivedName = \"$serverpath\" >> Clone_$n.vmx
	echo scsi0:0.fileName = "/vmfs/volumes/Master/mastername/mastername.vmdk" >> Clone_$n.vmx

	#enable vnc client access
	echo RemoteDisplay.vnc.enabled = \"True\" >> Clone_$n.vmx
   	echo RemoteDisplay.vnc.port = \"590$n\" >> Clone_$n.vmx

	#cat Clone_$n.vmx
	chmod 744 Clone_$n.vmx
	
	#create folder Clone_$n
	ssh $user@$server mkdir /vmfs/volumes/Delta/Clone_$n

	#scp vmx file to Clone_$n	
	scp /var/www/nginx-default/virtual_machines/Clone_$n.vmx  $user@$server:/vmfs/volumes/Delta/Clone_$n/
	scp /var/www/nginx-default/update.sh  $user@$server:/vmfs/volumes/Delta/Clone_$n/update.sh
	ssh $user@$server chmod 777 /vmfs/volumes/Delta/Clone_$n/update.sh

	#register vm
	ssh $user@$server vim-cmd  solo/registervm /vmfs/volumes/Delta/Clone_$n/Clone_$n.vmx Clone_$n

	rm  /var/www/nginx-default/virtual_machines/Clone_$n.vmx
	n=$(( n+1 ))
done
