FROM wordpress:5.2.2-php7.1-apache

RUN pecl install -f xdebug \
  && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini;
# Copy php.ini into image
COPY xdebug.ini /usr/local/etc/php/php.ini