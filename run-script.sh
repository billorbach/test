#!/bin/sh
#saved in vmconnect  /home/jeos/

n=0
ShownName="master0.00$n"
server="192.168.3.5"
user="root"
path="/vmfs/volumes/Storage/webscript/"
vmxpath="/var/www/nginx-default/testing/$ShownName"
localisopath="/var/www/nginx-default/upload/"

#in vmconnect
ssh $user@$server rm -rf $path
ssh $user@$server mkdir $path

#upload iso file
scp -r $localisopath  $user@$server:$path

#upload master0.00x folder
scp -r $vmxpath $user@$server:$path

chmod +x /home/jeos/web-create-master2.sh
sh /home/jeos/web-create-master2.sh


