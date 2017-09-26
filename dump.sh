#! /bin/bash 
echo "creating tables...."
mysql -uroot -proot surveydb < /var/www/html/surveydb.sql
echo "done creating tables.."
exit
