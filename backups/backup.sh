#! /bin/bash
d=$(date -I) ;
mysqldump --host navbellapi_db_1 -u slamat -pslamat navbell --result-file=$d".sql";
zip -r /var/backups/$d".zip" /var/www/html
