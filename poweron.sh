#!/bin/sh

Number=$1
n=1

count=0
cd    /vmfs/volumes/Delta/
while [ $n -le $Number ]
do
	DIRECTORY=Clone_$n
	#check if directory exists, only work when exists
	if [ -d "$DIRECTORY" ]; then
		id=$(vim-cmd vmsvc/getallvms|grep Clone_$n/Clone_$n.vmx |awk '{print $1}')
		echo "id at n is " $id
		powerstatus=$(vim-cmd vmsvc/get.summary $id|grep 'powerState'|awk '{print $3}'|sed 's/[^"]*"\([^"]*\).*/\1/')
	
		if test $powerstatus = "poweredOff"
		then
			vim-cmd vmsvc/power.on $id
		fi

	fi
	
	cd /vmfs/volumes/Delta/
	n=$(( n+1 ))
	
done



