FROM php:8.2-apache

# Copy semua file ke dalam image Docker
COPY . /var/www/html/

# Aktifkan mod_rewrite jika perlu
RUN a2enmod rewrite

# Set folder kerja
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80
