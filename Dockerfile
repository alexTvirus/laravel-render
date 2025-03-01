FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV APP_KEY base64:qKieeboLsDmpW8qISpXunQoiPW2iyBr5/whnGIstu1A=

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apk update && apk add --no-cache openjdk11 coreutils

# Thiết lập biến môi trường cho Java
ENV JAVA_HOME=/usr/lib/jvm/java-11-openjdk
ENV PATH="$JAVA_HOME/bin:${PATH}"

CMD ["/start.sh"]
