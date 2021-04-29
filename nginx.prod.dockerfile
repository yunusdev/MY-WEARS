FROM nginx:stable-alpine

ADD ./nginx/default.prod.conf /etc/nginx/conf.d/default.conf
ADD ./nginx/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /var/www/html

ADD . /var/www/html
