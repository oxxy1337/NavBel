#! /bin/bash
d=$(date +"%H:%M") ;
dd=$(date -I);
mysqldump --host navbel_db_1 -u slamat -pslamat navbell --result-file=/var/backups/db/$d"-"$dd".sql";
zip -r /var/backups/files/$d"-"$dd".zip" /var/www/html;
