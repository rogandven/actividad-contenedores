# docker build -t intranet-frontend .
# docker run -d --name intranet-frontend intranet-frontend 

FROM namoshek/php-mssql:8.2-cli
USER root

RUN cat "deb http://deb.debian.org/debian bookworm main" | tee -a /etc/apt/sources.list 

RUN apt update && apt upgrade -y && apt autoremove -y

RUN apt-get -y install lsb-release ca-certificates curl
RUN curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb
RUN dpkg -i /tmp/debsuryorg-archive-keyring.deb
RUN sh -c 'echo "deb [signed-by=/usr/share/keyrings/debsuryorg-archive-keyring.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
RUN apt update

RUN apt install aptitude -y
RUN aptitude install apache2 libapache2-mod-php8.2 -y

RUN rm -rf /var/www/html/*
COPY src /var/www/html
EXPOSE 80 443

