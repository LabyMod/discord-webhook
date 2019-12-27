FROM php:7.3-stretch

LABEL maintainer="Scrummer <scrummer@gmx.ch>"

ENV COMPOSER_CACHE_DIR /cache/.composer

RUN apt-get update -q && \
    apt-get -yqq install \
        mysql-client \
        iproute \
        git \
        wget \
        curl \
        unzip \
        libmcrypt-dev \
        libzip-dev \
        libpq-dev \
        libxslt-dev \
        libcurl4-gnutls-dev \
        libicu-dev libvpx-dev libjpeg-dev \
        libpng-dev libxpm-dev zlib1g-dev \
        libfreetype6-dev libxml2-dev \
        libexpat1-dev libbz2-dev libgmp3-dev \
        libldap2-dev unixodbc-dev libsqlite3-dev \
        libaspell-dev libsnmp-dev libpcre3-dev libtidy-dev \
    && apt-get autoclean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql curl json intl gd xml zip bz2 opcache exif mysqli sysvsem xsl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
        && chmod +x /usr/local/bin/composer

# Goto temporary directory.
WORKDIR /tmp

# Run composer and phpunit installation.
RUN composer selfupdate && \
    composer require "phpunit/phpunit:~8.5.0" --prefer-source --no-interaction && \
    ln -s /tmp/vendor/bin/phpunit /usr/local/bin/phpunit

# Set up the application directory.
VOLUME ["/app"]
WORKDIR /app

# Set up entrypoint
ADD ./docker/docker-entrypoint /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

# Set up the command arguments.
ENTRYPOINT ["/usr/local/bin/docker-entrypoint"]
#ENTRYPOINT ["/usr/local/bin/phpunit"]
#CMD ["--help"]
