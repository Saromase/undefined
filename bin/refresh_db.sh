#!/bin/sh

php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
php bin/console fos:user:create admin admin@admin.fr discord --super-admin