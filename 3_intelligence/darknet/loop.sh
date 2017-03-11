#!/bin/bash  
for i in `seq 14400`  
do  
    echo $i
    php /var/www/html/darknet/run.php 2>&1 | tee /var/www/html/darknet/ipfs.log
    sleep 60
done  
 
