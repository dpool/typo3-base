#!/usr/bin/env bash

echo "make sure that standard folder is available"
[ -d gitlab-ci-scripts ] || mkdir gitlab-ci-scripts
[ -d public ] || mkdir -p public
[ -d public/typo3conf ] || mkdir -p public/typo3conf

echo "copy additional configuration for TYPO3"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/AdditionalConfiguration.php public/typo3conf/AdditionalConfiguration.php

cp public/typo3conf/ext/base/GitlabCI/Scaffolding/.gitignore .gitignore

echo "copy the CI/CD yml configuration"
cp public/typo3conf/ext/base/GitlabCI/.gitlab-ci.yml .gitlab-ci.yml
echo "copy gulp setup"
cp public/typo3conf/ext/base/GitlabCI/Gulp/Gulpfile.js Gulpfile.js
cp public/typo3conf/ext/base/GitlabCI/Gulp/package.json package.json

echo "copy the git-pull.sh file to the project root directory"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/git-pull.sh git-pull.sh
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/update.sh update.sh

echo "copy empty files for customising of CI/CD processes in an individual project"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/after-composer.sh gitlab-ci-scripts/after-composer.sh
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/build-extensions.sh gitlab-ci-scripts/build-extensions.sh
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/pre-deploy.sh gitlab-ci-scripts/pre-deploy.sh
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/rsync-build-excludes.txt gitlab-ci-scripts/rsync-build-excludes.txt
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/rsync-deploy-excludes.txt gitlab-ci-scripts/rsync-deploy-excludes.txt

echo "build website extension if not exist"

cp -R public/typo3conf/ext/base/GitlabCI/Scaffolding-Ext/* public/typo3conf/ext/

echo "copy gulp-file infrastructure"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/gulp-config.js gulp-config.js


echo "create .env file"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/.env-example .env

echo "write developer path to .env file"
echo 'Bitte Zielpfad auf bionic angeben (/srv/projects/$/$)';
echo 'Beispiel: Andreas und nbc etwa (/srv/projects/habel/nbc-channels)';
read DEV_PATH
echo "DEV_PATH=$DEV_PATH" >> .env