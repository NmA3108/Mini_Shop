FROM webdevops/php-nginx:8.2

WORKDIR /app

COPY ./src /app

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chown -R application:application /app

EXPOSE 8080
