FROM ubuntu:latest

ENV TZ=Europe/London

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get update && apt-get install -qqy software-properties-common && add-apt-repository ppa:ondrej/php
RUN apt-get update && apt-get install -qqy \
	  php8.1-cli \
	  php8.1-fpm \
	  php8.1-mbstring \
      php8.1-dom


WORKDIR /app

ENTRYPOINT bash
