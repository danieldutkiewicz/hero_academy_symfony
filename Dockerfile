FROM php:7.4
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update

RUN apt-get install wget -y
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

COPY . /app
WORKDIR /app

EXPOSE 8000
CMD symfony serve