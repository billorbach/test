#!/bin/sh

count=$(ls -ltr /vmfs/volumes/Master/ | wc -l)
echo $count
if [ $count -ge 3 ]
then
   array=$(ls -ltr /vmfs/volumes/Master/ | awk '{print $9}')
   array1=$( echo $array | awk '{print $1}') 
   echo "rm -rf /vmfs/volumes/Master/"$array1
   rm -rf /vmfs/volumes/Master/$array1
fi
