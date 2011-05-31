repoint_vmx.sh:cd  /vmfs/volumes/Delta/webscript/
run-script.sh:path="/vmfs/volumes/Storage/webscript/"
web-create-master1-back.sh:   isopath="/vmfs/volumes/Delta/webscript/upload/$isofilename"
web-create-master1.sh:   isopath="/vmfs/volumes/Delta/webscript/upload/$isofilename"
web-create-master2.sh:path="/vmfs/volumes/Delta/webscript/"
web-create-master3.sh:isopath="/vmfs/volumes/Delta/webscript/upload/$isofilename"
web-edit-master1.sh:serverpath=/vmfs/volumes/Delta/webscript/ 
web-edit-master1.sh:ssh $user@$server sh /vmfs/volumes/Delta/webscript/web-edit-master2.sh $1 $2
web-edit-master2.sh:#then upload to the server /vmfs/volumes/Delta/webscript/
web-edit-master2.sh:#ssh $user@$server sh /vmfs/volumes/Storage/webscript/web-edit-master2.sh $1 $2 $3
web-edit-master2.sh:cd    /vmfs/volumes/Delta/webscript/
web-edit-master2.sh:	cd /vmfs/volumes/Delta/webscript/
web-edit-master3.sh:serverpath=/vmfs/volumes/Delta/webscript/ 
web-edit-master3.sh:ssh $user@$server sh /vmfs/volumes/Delta/webscript/web-edit-master4.sh $1 $2
web-edit-master4.sh:#upload to esxi server /vmfs/volumes/Delta/webscript/
web-revert-master1.sh:#upload to esxiserver  /vmfs/volumes/Storage/webscript/
web-revert-master1.sh:serverpath=/vmfs/volumes/Delta/webscript/ 
web-revert-master1.sh:ssh $user@$server sh /vmfs/volumes/Delta/webscript/web-revert-master2.sh $1 $2
web-revert-master2.sh:#upload to esxiserver  /vmfs/volumes/Storage/webscript/
web-revert-master2.sh:cd    /vmfs/volumes/Delta/webscript/
web-revert-master2.sh:	cd    /vmfs/volumes/Delta/webscript/
