#!/bin/sh
#input: name CreatTest
#what it does: check vmx file, and correct master's vmdk version.

while read myline
do
  if [ $myline -gt "0" ]; then
	version=$myline
  fi
done < /var/www/nginx-default/master.txt
echo $version

cd  /vmfs/volumes/Delta/webscript/

#edit vmx,delete some lines 
cd $1
sed '/scsi0:0.fileName/d' $1.vmx >1
sed '/scsi0:0.redo/d' 1 > 2
rm 1

#add some lines
echo "scsi0:0.fileName = "/vmfs/volumes/Master/master0.$version/master0.$version.vmdk"" >> 2
echo "scsi0:0.redo = "./master0.$version.vmdk.REDO_UWxTUZ"" >> 2
mv 2  $1.vmx	

		
