FROM php:8.4-fpm-alpine

# Laravel と PostgreSQL に必要なもの
#   pdo_pgsql : PHP から PostgreSQL につなぐ拡張
#   git, unzip: composer がパッケージを取ってくるときに使う
RUN apk add --no-cache git unzip libpq \
 && apk add --no-cache --virtual .build-deps postgresql-dev \
 && docker-php-ext-install pdo_pgsql \
 && apk del .build-deps

# composer（PHP のパッケージ管理ツール）
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# コンテナ内の www-data をホストの一般ユーザーと同じ UID 1000 にそろえる。
# WSL2 で作ったファイルを、コンテナからもホストからも編集できるようにするため。
RUN apk add --no-cache shadow \
 && usermod -u 1000 www-data && groupmod -g 1000 www-data \
 && apk del shadow

ENV COMPOSER_HOME=/tmp/composer
WORKDIR /var/www/html
USER www-data
