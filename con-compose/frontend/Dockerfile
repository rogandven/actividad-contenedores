FROM debian:13 AS debian 
WORKDIR /
RUN apt update && apt upgrade -y && apt autoremove -y
RUN apt install apache2 apache2-php php-8.1
RUN rm -rf /var/www/html/*
COPY /src /var/www/html
EXPOSE 80
CMD bash &