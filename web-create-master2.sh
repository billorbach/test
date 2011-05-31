#!/bin/sh
#saved in vmconnect  

n=0
ShownName=$1 #"master1.0$n"
FileName=$ShownName.vmx
#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"
path="/vmfs/volumes/Delta/"
path1="/vmfs/volumes/Master/"
vmxpath="/var/www/nginx-default/virtual_machines/$ShownName"
#localisopath="/var/www/nginx-default/upload/"
#localisopath="/media/cdrom/"

#in vmconnect
#ssh $user@$server rm -rf $path
#ssh $user@$server mkdir $path

#upload iso file
#sudo umount /dev/cdrom
#sudo mount /dev/cdrom /media/cdrom
#scp -r $localisopath  $user@$server:$path

#upload master0.00x folder
scp -r $vmxpath $user@$server:$path1
rm -rf $vmxpath
