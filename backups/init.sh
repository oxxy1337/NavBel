#! /bin/bash
docker exec  navbel_api_1 bash /var/backups/backup.sh &&
mv  /home/$USERNAME/navbel/backups/files/* /var/www/html/backups/files/ &&
mv  /home/$USERNAME/navbel/backups/db/* /var/www/html/backups/db/ &&
chown www-data:www-data /var/www/html/backups
