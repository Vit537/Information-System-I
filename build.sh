#!/usr/bin/env bash
# exit on error
set -o errexit

# Instala Composer (si no está presente)
if ! command -v composer &> /dev/null; then
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

# Instala dependencias de PHP para PostgreSQL (necesario en Render)
sudo apt-get update && sudo apt-get install -y php-pgsql

# Instala dependencias de Laravel
composer install --no-interaction --no-dev --prefer-dist

# Configuración de Laravel
php artisan key:generate --force
php artisan migrate --force  # Solo si necesitas migraciones
php artisan storage:link  # Solo si usas archivos públicos
