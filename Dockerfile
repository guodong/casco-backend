FROM php:5
RUN apt-get update
RUN apt-get install -y libcurl3-dev
RUN docker-php-ext-install pdo pdo_mysql curl
ADD . /var/www/laravel
RUN chmod -R 777 /var/www/laravel/storage && chmod -R 777 /var/www/laravel/bootstrap/cache
EXPOSE 80
WORKDIR /var/www/laravel
CMD [ "php", "artisan", "serve", "--host", "0.0.0.0"]
