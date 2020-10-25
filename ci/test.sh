#!/bin/bash

sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y wget mariadb-server postgresql "php${1}" "php${1}-mysql" "php${1}-pgsql"
sudo service mysql start
sudo service postgresql start
sudo mysql -uroot < ./sql/mysql_database.sql
sudo su -c "psql -f ./sql/postgresql_database.sql" postgres
sudo wget -O /usr/local/bin/phpunit https://phar.phpunit.de/phpunit-9.phar
sudo chmod +x /usr/local/bin/phpunit
php --version
phpunit --version
phpunit
