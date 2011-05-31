#!/bin/sh

iso_file=$1

sudo umount /dev/cdrom
sudo mount /dev/cdrom /media/cdrom
sudo cp /media/cdrom/$iso_file /var/www/nginx-default/upload
