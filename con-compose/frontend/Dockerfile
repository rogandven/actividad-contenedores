# docker build -t intranet-frontend .
# docker run -d --name intranet-frontend intranet-frontend 

FROM php:8.2-apache-bookworm
USER root

RUN apt update && apt upgrade -y && apt autoremove -y

# Install SQL Server Dependencies
RUN apt install freetds-common freetds-bin unixodbc unixodbc-dev curl -y
RUN curl http://http.us.debian.org/debian/pool/main/p/php-defaults/php-common_93_all.deb > php-common.deb
RUN apt install ./php-common.deb -y
RUN curl http://http.us.debian.org/debian/pool/main/p/php8.2/php8.2-common_8.2.31-1~deb12u1_amd64.deb > php8.2-common.deb 
RUN apt install ./php8.2-common.deb -y
RUN curl http://http.us.debian.org/debian/pool/main/p/php8.2/php8.2-sybase_8.2.31-1~deb12u1_amd64.deb > sybase.deb 
RUN apt install ./sybase.deb -y

RUN pecl install sqlsrv-5.11.0
RUN pecl install pdo_sqlsrv-5.11.0

RUN (cat /usr/local/etc/php/php.ini && echo "; priority=30\nextension=pdo_sqlsrv.so\n; priority=20\nextension=sqlsrv.so\n") > /usr/local/etc/php/php.ini

RUN phpenmod -v 8.2 sqlsrv pdo_sqlsrv

RUN /etc/init.d/apache2 restart



RUN rm -f *.deb

RUN rm -rf /var/www/html/*
COPY src /var/www/html
EXPOSE 80 443