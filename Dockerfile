FROM php:8.1.1-fpm

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN apt-get update -y && apt-get install -y sendmail libpng-dev

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
		libonig-dev \
		libzip-dev \
		nano

RUN docker-php-ext-install mbstring

RUN docker-php-ext-install zip

RUN docker-php-ext-install gd

RUN apt-get install -y libmcrypt-dev
RUN pecl install mcrypt-1.0.5 && docker-php-ext-enable mcrypt

