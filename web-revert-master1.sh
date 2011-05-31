#!/bin/sh
#save in vmconnect  /home/jeos/
#upload to esxiserver  /vmfs/volumes/Storage/
#command   sh web-revert-master1.sh   old_master_image   #_clones
#          sh web-revert-master1.sh   master0.000        3

#server="192.168.3.5"
server="`sh getip.sh esxi`"
user="root"


chmod +x  web-revert-master2.sh
serverpath=/vmfs/volumes/Delta/ 
scp web-revert-master2.sh $user@$server:$serverpath 
ssh $user@$server sh /vmfs/volumes/Delta/web-revert-master2.sh $1 $2 $3
