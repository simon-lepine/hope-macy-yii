#! /bin/bash

#install packages
apt-get update; apt-get upgrade -y; apt-get dist-upgrade -y;
apt-get install -y git openssh-server curl unzip mariadb-server apache2 php libapache2-mod-php php-mysql php-cli php-mbstring php-gd php-zip php-curl php-intl

#setup mariadb
echo "CREATE USER yii@'%' IDENTIFIED BY 'yii';" >> /tmp/script.sql
echo "GRANT ALL ON *.* TO yii@'%';" >> /tmp/script.sql
echo "CREATE DATABASE php_hope_macy;" >> /tmp/script.sql
mariadb < /tmp/script.sql

#composer
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
chmod +x /usr/local/bin/composer;
chmod 0777 /usr/local/bin/composer;