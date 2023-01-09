FROM webdevops/php-nginx:7.4

ENV WEB_DOCUMENT_ROOT=/app/web

RUN apt-get update && apt-get install -y mariadb-client fonts-freefont-ttf
COPY ./docker/nginx/location.conf /opt/docker/etc/nginx/vhost.common.d/10-location-root.conf

COPY --chown=application:application . /app
