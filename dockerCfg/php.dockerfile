FROM php:8.2-fpm

ENV TZ=Europe/Moscow
RUN apt-get update \
	&& apt-get install -y \
    default-jre  \
    libxinerama1  \
    libdbus-1-dev  \
    libcups2-dev \
    libcairo2\
    libcairo2-dev \
    libx11-xcb-dev \
    libzip-dev \
    librabbitmq-dev \
    libssh-dev\
    enca \
    zip \
    locales \
    locales-all \
    git
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/install-php-extensions
RUN docker-php-ext-install opcache && docker-php-ext-enable opcache \
&& docker-php-ext-install pdo pdo_mysql \
&& echo date.timezone=$TZ >> /usr/local/etc/php/conf.d/docker-php-timezone.ini \
&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
&& echo date.timezone=$TZ >> /usr/local/etc/php/conf.d/docker-php-timezone.ini
WORKDIR /app
CMD bash -c "cd /app && composer install && php-fpm"
ENV LC_ALL ru_RU.UTF-8
ENV LANG ru_RU.UTF-8
ENV LANGUAGE ru_RU.UTF-8
