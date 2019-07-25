#! /bin/bash 
# coded by m.slamat
DIR=$(pwd);
if [$1 == ""] 2>/dev/null ;
then
	printf "Please provide cron configuration\nExample: ./backup.sh '0 11 * * *'\n\n";
	exit 1 ;
fi
crontab -l > cronbackup ; 
echo "$1 $DIR/backups/init.sh"  >> cronbackup ; 
crontab cronbackup ;
rm cronbackup;
docker exec  navbel_api_1 /bin/chown www-data:www-data /var/www/html/images;
echo "docker exec  navbel_api_1 bash /var/backups/backup.sh ; mv $DIR/backups/files/* /var/www/html/backups/files/ ;  mv $DIR/backups/db/* /var/www/html/backups/db/ ; chown www-data:www-data /var/www/html/backups ; docker exec  navbel_api_1 php /var/www/html/cron.php" >>  backups/init.sh; 
mkdir -p /var/www/html/backups/files; mkdir -p /var/www/html/backups/db;
mv $DIR/backups/.htaccess /var/www/html/backups/.htaccess;
mv $DIR/backups/.htpasswd /var/www/html/backups/.htpasswd;
printf "\n[+] BACKUP SYSTEM INSTALLED SUCCESSFULLY !\n"
