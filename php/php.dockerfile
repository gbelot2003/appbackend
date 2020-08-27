FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

#Install imagemagick:
ENV MAGICK_HOME=/usr

    RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        curl-dev \
        imagemagick-dev \
        libtool \
        libxml2-dev \
        postgresql-dev \
        sqlite-dev 


    RUN  apk --no-cache update \
        && apk --no-cache upgrade \
        && apk add --update \
        curl \
        curl-dev \
        git \
        mysql-client \
        postgresql-libs \
        coreutils \
        freetype-dev \
        libwebp-dev \
        libjpeg \
        libpng-dev \
        libjpeg-turbo \
        libzip-dev \
        jpeg-dev \
        icu \
        icu-dev \
        imap-dev \
        libxslt-dev libxml2-dev \
        postgresql-dev \
        libgcrypt-dev \
        oniguruma-dev \
        libpng \
        libpng-dev \
        zlib-dev \
        libxpm-dev \
        libxml2-dev \
        libzip-dev \
        gd \
        autoconf g++ imagemagick-dev imagemagick libtool make

    RUN docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg
    
    RUN docker-php-ext-install \
        mbstring \
        mysqli \
        opcache \
        soap \
        pdo \
        pdo_mysql
    
    RUN pecl install imagick
    
    RUN docker-php-ext-enable imagick
    
    RUN apk del autoconf g++ libtool make

    RUN docker-php-ext-install -j "$(nproc)" \
        gd \
        soap \
        imap \
        mbstring \
        curl \ 
        sockets \
        opcache \
        bcmath \
        pdo_pgsql \
        xsl \
        exif \
        iconv \
        mysqli \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        pdo_sqlite \
        pcntl \
        tokenizer \
        xml \
        intl \
        zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk del -f .build-deps