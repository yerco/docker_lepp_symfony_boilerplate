# php-fpm/Dockerfile

FROM php:fpm-alpine
RUN apk --update --no-cache add git
RUN set -ex \
  && apk --no-cache add \
    postgresql-dev
RUN docker-php-ext-install pdo_pgsql
COPY composer.phar /usr/bin/composer.phar
CMD php composer.phar self-update
WORKDIR /var/www
CMD php composer.phar install ; app/console doctrine:migrations:migrate ;  php-fpm
EXPOSE 9000
