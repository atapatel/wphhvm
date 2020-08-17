FROM diegomarangoni/hhvm

COPY docker-hhvm/config/php.ini /etc/hhvm
COPY docker-hhvm/config/server.ini /etc/hhvm

EXPOSE 9000

RUN usermod -u 1000 www-data
WORKDIR /var/www/app

#CMD ["hhvm", "--mode=server", "-d hhvm.server.type=fastcgi",  "-d hhvm.server.port=9000"]

CMD ["hhvm", "--mode=server", "-d hhvm.server.type=fastcgi",  "-d hhvm.server.port=9000"]