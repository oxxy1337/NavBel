#! /bin/bash
d=$(date -I) ;
mysqldump --host navbelapi_db_1 -u slamat -pslamat navbell --result-file=/var/backups/db/$d".sql";
zip -r /var/backups/files/$d".zip" /var/www/html
