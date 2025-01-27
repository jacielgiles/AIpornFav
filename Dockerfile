# Usa una imagen de PHP con soporte para MySQL
FROM php:8.1-apache

# Copia los archivos del proyecto al servidor
COPY . /var/www/html/

# Instala extensiones necesarias para MySQL
RUN docker-php-ext-install mysqli

# Configura permisos para Apache
RUN chown -R www-data:www-data /var/www/html/

# Expone el puerto 80
EXPOSE 80

# Comando para iniciar el servidor
CMD ["apache2-foreground"]
