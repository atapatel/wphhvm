FROM nginx:latest

ADD config/nginx.conf /etc/nginx/

RUN usermod -u 1000 www-data

CMD ["nginx"]

EXPOSE 80
