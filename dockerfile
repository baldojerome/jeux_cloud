FROM php:8.0-apache
WORKDIR /var/www/html
COPY index.php index.php
COPY ./controleur /var/www/html/controleur
COPY ./modele /var/www/html/modele
COPY ./vue /var/www/html/vue
RUN chmod -R a+w ./modele
EXPOSE 80
ENTRYPOINT ["apache2ctl", "-D", "FOREGROUND"]