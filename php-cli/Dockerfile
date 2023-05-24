FROM php:8.1-cli-alpine3.15

RUN apk add --no-cache --virtual build-dependencies icu-dev libxml2-dev $PHPIZE_DEPS \
    && docker-php-ext-install -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) mysqli opcache pdo_mysql xml fileinfo pdo exif\
	&& pecl install xdebug redis \
    && docker-php-ext-enable xdebug redis
