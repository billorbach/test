#!/bin/sh

MasterName="VNCtest"
Number=$number_of_clones
chmod 744 create-master.sh
chmod 744 create-clone.sh
sh  create-master.sh  $MasterName
sh  create-clone.sh   $MasterName  $Number
