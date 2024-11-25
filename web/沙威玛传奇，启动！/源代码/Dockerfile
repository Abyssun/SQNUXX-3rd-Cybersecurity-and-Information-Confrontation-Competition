FROM php:5.6-apache

LABEL Organization="abyssun" Author="M0x1n <lqn@sierting.com>"


COPY files /tmp/

RUN mv /tmp/sources.list /etc/apt/sources.list \
    && apt-get update -y && apt-get install -y net-tools wget \
    && mv /tmp/flag.sh /flag.sh \
    && mv /tmp/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint \
    && mv /tmp/apache2.conf /etc/apache2/apache2.conf \
    && chmod +x /usr/local/bin/docker-php-entrypoint \
    && mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    # clear
    && rm -rf /tmp/*


WORKDIR /var/www/html

COPY www /var/www/html/

EXPOSE 80

