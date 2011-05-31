#!/bin/sh

number=$1
n=1

while [ $n -le $number ]
do
	echo Clone_$n
	grep vmdk /vmfs/volumes/Delta/Clone_$n/Clone_$n.vmx	
	n=$(( n+1 ))
done


