FROM php:8.2-fpm-alpine

RUN apk update

RUN apk add --no-cache bash

RUN apk add --update nodejs npm

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN mkdir /app
WORKDIR /app

# Copy files
COPY . /app

# setup FE
RUN npm install

RUN npm rebuild node-sass

RUN npm run build

# setup composer and laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN composer dump-autoload

RUN php artisan optimize

RUN php artisan route:clear

RUN php artisan route:cache

RUN php artisan config:clear

RUN php artisan config:cache

RUN php artisan view:clear

RUN php artisan view:cache

EXPOSE 8000

CMD php artisan serve --host 0.0.0.0 --port 8000
