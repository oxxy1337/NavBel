#! /bin/bash
docker exec  navbel_api_1 bash /var/backups/backup.sh;
mv /home/$USER/navbel/backups /var/www/html/backups;
chown www-data:www-data /var/www/html/backups