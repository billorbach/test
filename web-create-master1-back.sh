#!/bin/sh
#saved in vmconnect  /home/jeos/
#usage    sh web-create-master1.sh   mastername      isofilename             version
#version can only be "Microsoft Windows 7 (32-bit)"   or  "Microsoft Windows 7 (64-bit)"
#iso file is saved in /var/www/nginx-default/upload/
#example  
#         sh web-create-master1.sh   "master0.000"  "Windows-7_32-bit2.iso"   32

   
   n=0
   ShownName=$1    #"master0.00$n"
   isofilename=$2  #"Windows-7_32-bit2.iso"
   isopath="/vmfs/volumes/Delta/upload/$isofilename"
   vmxpath="/var/www/nginx-default/virtual_machines"
   if test $3 = "32" 
   then
  	osAltName="Microsoft Windows 7 (32-bit)"
   else
	osAltName="Microsoft Windows 7 (64-bit)"
   fi
   

   cd $vmxpath
   mkdir $ShownName
   cp base_master.vmx   $ShownName/
   cd $ShownName/

   #configure vmx file
   echo guestOSAltName = \"$osAltName\" >> base_master.vmx
   echo ide1:0.fileName = \"$isopath\" >> base_master.vmx
   echo displayName = \"$ShownName\" >> base_master.vmx
   echo nvram = \"$ShownName.nvram\" >> base_master.vmx
   echo extendedConfigFile  = \"$ShownName.vmxf\" >> base_master.vmx
   echo scsi0:0.fileName = \"$ShownName.vmdk\" >> base_master.vmx
   
   #enable vnc client access
   echo RemoteDisplay.vnc.enabled = \"True\" >> base_master.vmx
   echo RemoteDisplay.vnc.port = \"5900\" >> base_master.vmx
   
   mv base_master.vmx $ShownName.vmx
   chmod 744 $ShownName.vmx

   #echo "finish step1"
   #cd /var/www/nginx-default/
   #cd /home/jeos/

   #chmod +x web-create-master2.sh
   #sh web-create-master2.sh  $1

   #echo "finish step2"
	
   #chmod +x web-create-master3.sh
   #sh web-create-master3.sh $1 $2 $osAltName
 
   #echo "finish step3"
