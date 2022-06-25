FROM php:8.1-apache
COPY . /app
WORKDIR /app
RUN apt-get update && apt-get install -y curl git mariadb-client libgmp-dev libxml2-dev libzip-dev libicu-dev
RUN docker-php-ext-install gmp intl mysqli soap zip
RUN curl https://getcomposer.org/download/latest-stable/composer.phar -o composer.phar && \
    chmod +x composer.phar && \
    mv composer.phar /usr/local/bin/composer

RUN composer install
RUN chmod a+x /app/entrypoint.sh
ENTRYPOINT /app/entrypoint.sh

