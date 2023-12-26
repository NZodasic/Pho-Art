FROM php:8.0.30-apache

VOLUME [ "/app" ]

#Install module mysqli for connect mysql
RUN docker-php-ext-install mysqli

WORKDIR /app

# Your command start php project (not incluce space). Now disable for DEV when run PRODUCTION please uncomment line below.
CMD ["php","-S","0.0.0.0:8000"]
