# Utiliser une image PHP 7.4 avec Apache
FROM php:8.4-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    libpng-dev libjpeg-dev libpq-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql zip gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

## yarn / npm


# Installer Node.js (version LTS compatible)
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Vérifier les versions de Node.js et NPM
RUN node -v && npm -v

# Installer Yarn globalement
RUN npm install -g yarn

# Vérifier la version de Yarn
RUN yarn -v



# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet dans le conteneur
COPY . /var/www/html

# Donner les permissions nécessaires
RUN chown -R www-data:www-data /var/www/html

# Copier le fichier de configuration du vhost
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Activer le module Apache rewrite
RUN a2enmod rewrite

# Exposer le port 80
EXPOSE 80