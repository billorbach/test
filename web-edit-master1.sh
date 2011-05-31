#!/bin/sh
#saved in vmconnect  /home/jeos/
#to change clone path
#command:  sh web-edit-master1.sh current_image_name  #_clones
#          sh web-edit-master1.sh master0.001  3
#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"

cd /var/www/nginx-default/
chmod +x  web-edit-master2.sh
serverpath=/vmfs/volumes/Delta/ 
scp web-edit-master2.sh $user@$server:$serverpath
ssh $user@$server sh /vmfs/volumes/Delta/web-edit-master2.sh $1 $2 $3



