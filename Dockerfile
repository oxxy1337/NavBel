# install php 
FROM php:7.3-apache 
#updating & upgrading install packages
RUN apt-get update -y && apt-get upgrade -y && apt-get install -y cron && apt-get install -y zip && apt-get install -y unzip && apt-get install -y git curl libmcrypt-dev default-mysql-client
#RUN apt-get install -y mysql-client 
# install mysqli
RUN docker-php-ext-install mysqli
# install extenstion
RUN docker-php-ext-install pdo_mysql 

# install nano 
RUN apt-get install -y nano 
# clear cache 
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
