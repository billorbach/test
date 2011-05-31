#!/bin/sh

iso_file=$1
sudo umount /dev/cdrom >test 2>test1
sudo mkdir /media/cdrom >test 2>test1
sudo mount /dev/cdrom /media/cdrom > test 2>test1
sudo cp /media/cdrom/$iso_file /var/www/nginx-default/upload >test4 2>test5
