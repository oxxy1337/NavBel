#! /bin/bash
dd=$(date -I);
mysqldump --host navbel_db_1 -u slamat -pslamat navbell --result-file=/var/backups/db/$dd".sql";
zip -r /var/backups/files/$dd".zip" /var/www/html;
