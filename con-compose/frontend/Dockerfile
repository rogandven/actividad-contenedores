# docker build -t intranet-frontend
# docker run -d --name intranet-frontend intranet-frontend 

FROM php:8.2-apache-trixie
USER root

RUN apt update && apt upgrade -y && apt autoremove -y

RUN rm -rf /var/www/html/*
COPY src /var/www/html
EXPOSE 80 443