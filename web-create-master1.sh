#!/bin/sh
#saved in vmconnect  /home/jeos/
#usage    sh web-create-master1.sh   mastername      isofilename             version
#version can only be "Microsoft Windows 7 (32-bit)"   or  "Microsoft Windows 7 (64-bit)"
#iso file is saved in /var/www/nginx-default/upload/
#example  
#         sh web-create-master1.sh   "master1.0"  32

   
   n=0
   ShownName=$1    
   echo $ShownName >showname.txt
   #isofilename=$2  #"Windows-7_32-bit2.iso"
   #isopath="/vmfs/volumes/Delta/upload/$isofilename"
   vmxpath="/var/www/nginx-default/virtual_machines/"
   if test $2 = "32" 
   then
  	osAltName="Microsoft Windows 7 (32-bit)"
   else
	osAltName="Microsoft Windows 7 (64-bit)"
   fi
   

   cd $vmxpath
   mkdir $ShownName
   cp /var/www/nginx-default/virtual_machines/base_master.vmx   $ShownName/
   cd $ShownName/
   mv base_master.vmx $ShownName.vmx
   chmod 744 $ShownName.vmx

   #configure vmx file
   echo guestOSAltName = \"$osAltName\" >> $ShownName.vmx
   echo ide1:0.fileName = \"/vmfs/devices/genscsi/mpx.vmhba0:C0:T0:L0\"   >> $ShownName.vmx
   #echo ide1:0.fileName = \"$isopath\" >> $ShownName.vmx
   echo displayName = \"$ShownName\" >> $ShownName.vmx
   echo nvram = \"$ShownName.nvram\" >> $ShownName.vmx
   echo extendedConfigFile  = \"$ShownName.vmxf\" >> $ShownName.vmx
   echo scsi0:0.fileName = \"$ShownName.vmdk\" >> $ShownName.vmx
   
   #enable vnc client access
   echo RemoteDisplay.vnc.enabled = \"True\" >> $ShownName.vmx
   echo RemoteDisplay.vnc.port = \"5900\" >> $ShownName.vmx

