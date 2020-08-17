FROM alpine:3.12
WORKDIR /srv/app

ADD https://dl.bintray.com/php-alpine/key/php-alpine.rsa.pub /etc/apk/keys/php-alpine.rsa.pub

RUN apk add --no-cache  --repository http://dl-cdn.alpinelinux.org/alpine/edge/community php

# PHP

RUN apk add --no-cache \
        php7

# OpCache

RUN apk add --no-cache \
        php7-opcache \
        php7-apcu

COPY docker-php/_config/cache.ini /etc/php7/conf.d/cache.ini

# Symfony requirements

RUN apk add --no-cache \
        php7-intl \
        php7-ctype \
        php7-bcmath \
        php7-mbstring \
        php7-iconv \
        php7-pcntl \
        php7-json \
        php7-xml \
        php7-dom \
        php7-posix \
        php7-session \
        php7-pdo \
        php7-tokenizer \
        php7-zip \
        php7-simplexml \
        file

COPY docker-php/_config/symfony.ini /etc/php7/conf.d/symfony.ini

ENV SF_PROJECT_DIRS="/srv/app"

# Entrypoints

RUN apk add --no-cache \
    bash \
    coreutils \
    su-exec

COPY docker-php/_config/entrypoint-init /bin/entrypoint-init

ENTRYPOINT ["/bin/entrypoint-init"]

COPY docker-php/_config/entrypoint-exec /bin/entrypoint-exec

# MySQL

RUN apk add --no-cache \
        php7-mysqli

# Api

RUN apk add --no-cache \
        php7-curl
# Nginx

RUN apk add --no-cache \
        nginx \
        php7-fpm

COPY docker-php/_config/nginx.conf /etc/nginx/nginx.conf

COPY docker-php/_config/php-fpm.conf /etc/php7/php-fpm.conf

COPY docker-php/_config/supervisord_fpm.conf /etc/supervisor/conf_enabled/fpm.conf

EXPOSE 80

# Permission fixer

ENV PERMISSION_FIXER_USERS="root nginx"

ENV PERMISSION_FIXER_UID=1000

ENV PERMISSION_FIXER_GID=1000

RUN apk add --no-cache \
    shadow


ENV ENTRYPOINT_UMASK=002

# Supervisor

RUN apk add --no-cache \
        supervisor

COPY docker-php/_config/supervisord.conf /etc/supervisor/supervisord.conf

CMD ["supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]

ENV LOGSTREAM_PATH=/tmp/stdoutfifo

COPY docker-php/_config/logstream /usr/bin/logstream

COPY docker-php/_config/supervisord_logstream.conf /etc/supervisor/conf_enabled/logstream.conf

RUN apk add --no-cache \
        curl

STOPSIGNAL SIGQUIT

EXPOSE 80
