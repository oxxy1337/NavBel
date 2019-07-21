#! /bin/bash 
crontab -l > cronbackup ; 
echo "* * * * * docker exec navbelapi_api_1 bash /var/backups/init.sh"  >> cronbackup ; 
crontab cronbackup ;
rm cronbackup 