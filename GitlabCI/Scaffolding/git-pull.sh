#!/bin/sh

echo "1: execute git pull"
git pull

# read developer path on remote server from .env file
DEV_PATH=$(grep DEV_PATH .env | xargs)
IFS='=' read -ra DEV_PATH <<< "$DEV_PATH"
DEV_PATH=${DEV_PATH[1]}


echo "2: composer install"
scp composer.json preview-bionic.dpool.net:$DEV_PATH
ssh preview-bionic.dpool.net "cd $DEV_PATH && composer install"


echo "3: update dependencies"
scp package.json preview-bionic.dpool.net:$DEV_PATH
ssh preview-bionic.dpool.net "cd $DEV_PATH && npm install"


echo "4: copy the CI/CD yml configuration"
scp preview-bionic.dpool.net:"$DEV_PATH"public/typo3conf/ext/base/GitlabCI/.gitlab-ci.yml .gitlab-ci.yml

echo "5: copy gulp setup"
scp preview-bionic.dpool.net:"$DEV_PATH"public/typo3conf/ext/base/GitlabCI/Gulp/Gulpfile.js Gulpfile.js



echo "Script wartet jetzt 15 Sekunden, um den Upload durch PHP-Storm abzuwarten"
sleep 15s


echo "7: build styles and scripts"
ssh preview-bionic.dpool.net "cd $DEV_PATH && gulp styles"
ssh preview-bionic.dpool.net "cd $DEV_PATH && gulp scripts"


echo "Bitte kontrollieren, ob sich die git-pull.sh Datei geändert hat. Falls ja => nochmals ausführen!"
