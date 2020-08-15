FROM php:7.4.8-apache
RUN apt-get update && apt-get install -y \
        libicu-dev \
    && docker-php-ext-install \
        mysqli \
    && docker-php-ext-enable \
        mysqli
RUN a2enmode rewrite