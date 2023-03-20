FROM php:8.1.2

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y zlib1g-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN mkdir /app

ADD . /app

WORKDIR /app

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000 &  php artisan queue:listen & php artisan schedule:work


EXPOSE 8000
