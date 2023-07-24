FROM php:8.2-alpine

RUN apk update
RUN apk add bash
RUN apk add curl

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \ php composer-setup.php \ php -r "unlink('composer-setup.php');"

RUN php composer-setup.php --install-dir=bin --filename=composer

WORKDIR /var/www/html

RUN composer create-project laravel/laravel .

CMD php artisan serve --host=0.0.0.0 --port=8000