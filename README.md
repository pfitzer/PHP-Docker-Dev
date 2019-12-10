# Docker Container for PHP developing
Heavily inspired by [Structuring the Docker setup for PHP Projects](https://www.pascallandau.com/blog/structuring-the-docker-setup-for-php-projects/)

Development environment for PHP Developers

* PHP-fpm 7.3
    * opcache
    * xdebug
    * gettext
    * mysqli
    * pdo_mysql
* Nginx
* MySQL Community Edition 8.0.18
* adminer:latest

## Getting started
````
git clone https://github.com/pfitzer/PHP-Docker-Dev.git

# open .docker/.env.example and edit the mysql settings to your need
cd PHP-Docker-Dev
make docker-clean
make docker-init
make docker-build-from-scratch
make docker-test

# if not mysql root password is set in .env
# get the generated mysql root password
docker logs phpdd_mysql_1 2>&1 | grep GENERATED

# goto http://0.0.0.0
# adminer is running under http://0.0.0.0:8080
````

Connect to the defined database in .env with your prefered IDE: localhost:3306
