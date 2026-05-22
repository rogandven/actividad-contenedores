FROM debian:13
USER root
RUN apt update && apt upgrade -y && apt autoremove -y
RUN apt install apache2 libapache2-mod-php8.4 php8.4 -y
RUN rm -rf /var/www/html/*
COPY src /var/www/html
EXPOSE 80
RUN mkdir /etc/apache2/logs && mkdir /etc/apache2/locks
COPY /server /etc/apache2/
CMD apache2 -DFOREGROUND