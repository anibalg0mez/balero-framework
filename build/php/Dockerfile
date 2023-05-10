FROM php:8.2-apache

RUN apt-get update && \
    docker-php-ext-install mysqli pdo pdo_mysql
# Enable mod_rewrite for images with apache
RUN if command -v a2enmod >/dev/null 2>&1; then \
        a2enmod rewrite headers \
    ;fi