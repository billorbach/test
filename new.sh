sudo rm /home/jeos/link/file2.txt
sudo rm /home/jeos/link/datafile.txt
sudo kill -9 `ps -e | grep main | awk '{print $1}'`
sudo rm /home/jeos/link/datafile.txt

