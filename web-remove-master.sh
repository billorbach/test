#!/bin/sh

server="`sh getip.sh esxi`"
user="root"


chmod +x  remove_master.sh
serverpath=/ 
scp remove_master.sh $user@$server:$serverpath 
ssh $user@$server sh remove_master.sh 
