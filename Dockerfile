# Dockerfile
# Usa una imagen base de PHP con Apache o Nginx
FROM php:8.2-apache # O php:8.2-fpm si prefieres configurar Nginx manualmente (más complejo)

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copia tus archivos de Composer
COPY composer.json composer.lock ./

# Instala Composer (ya debería venir con la imagen PHP, pero lo aseguramos si fuera necesario)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las dependencias de PHP
RUN composer install --no-dev --prefer-dist

# Si usas yarn, instala Node.js y Yarn
RUN apt-get update && apt-get install -y nodejs npm && \
    npm install -g yarn && \
    yarn

# Copia el resto de tus archivos de proyecto (incluyendo srv, css, js, etc.)
COPY . .

# Opcional: Si tienes un archivo .htaccess para reescrituras, asegúrate de que Apache lo use
# RUN a2enmod rewrite

# Exponer el puerto (Apache ya escucha en el 80, pero es buena práctica)
EXPOSE 80

# Comando de inicio (Apache ya inicia por defecto con la imagen base)
# Si usas php-fpm con Nginx, tendrías un CMD diferente
# CMD ["apache2-foreground"] # Este es el comando por defecto para php:apache
