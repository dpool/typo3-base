mkdir .Build
curl -sS https://getcomposer.org/installer | php -- --install-dir=./ --filename=composer.phar
export COMPOSER_ALLOW_SUPERUSER=1
export COMPOSER_MIRROR_PATH_REPOS=1
export COMPOSER_NO_INTERACTION=1
./composer.phar install --no-dev --prefer-dist --optimize-autoloader
./composer.phar dumpautoload --optimize