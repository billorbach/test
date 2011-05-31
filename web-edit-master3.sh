#!/bin/sh
#saved in vmconnect  /home/jeos/
#to copy master image
#command:  sh web-edit-master3.sh old_image_name  new_image_name
#          sh web-edit-master3.sh master0.000  master0.001
#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"

cd /var/www/nginx-default/
chmod +x  web-edit-master4.sh
serverpath=/vmfs/volumes/Delta/ 
scp web-edit-master4.sh $user@$server:$serverpath 
ssh $user@$server sh /vmfs/volumes/Delta/web-edit-master4.sh $1 $2


