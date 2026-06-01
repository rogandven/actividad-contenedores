# docker build -t intranet-frontend .
# docker run -d --name intranet-frontend intranet-frontend 

FROM namoshek/php-mssql:8.2-cli
USER root

RUN cat "deb http://deb.debian.org/debian bookworm main" | tee -a /etc/apt/sources.list 

RUN apt update && apt upgrade -y && apt autoremove -y
RUN apt install curl

RUN curl https://packages.sury.org/php/apt.gpg > /usr/share/keyrings/deb.sury.org-php.gpg
RUN echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php-sury.list
RUN apt update

RUN apt install aptitude -y
RUN aptitude install apache2 php8.2-common php8.2-opcache libapache2-mod-php8.2 -y

RUN rm -rf /var/www/html/*
COPY src /var/www/html
EXPOSE 80 443

