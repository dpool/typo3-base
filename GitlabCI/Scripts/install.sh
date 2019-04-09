#!/bin/bash

if [ -f .installed ]; then
    ## install node packages
    sh public/typo3conf/ext/base/GitlabCI/Scripts/npm-dependencies.sh

    ## copy the CI/CD yml configuration
    cp public/typo3conf/ext/base/GitlabCI/.gitlab-ci.yml .gitlab-ci.yml
    ## copy gulp setup
    cp public/typo3conf/ext/base/GitlabCI/Gulp/Gulpfile.js Gulpfile.js
    cp public/typo3conf/ext/base/GitlabCI/Gulp/package.json package.json

else
    ## make sure that standard folder is available
    [ -d gitlab-ci-scripts ] || mkdir gitlab-ci-scripts
    [ -d public ] || mkdir -p public
    [ -d public/typo3conf ] || mkdir -p public/typo3conf

    ## copy additional configuration for TYPO3
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/AdditionalConfiguration.php public/typo3conf/AdditionalConfiguration.php

    ## create .env file
#    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/.env-example .env
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/.gitignore .gitignore

    ## copy the CI/CD yml configuration
    cp public/typo3conf/ext/base/GitlabCI/.gitlab-ci.yml .gitlab-ci.yml
    ## copy gulp setup
    cp public/typo3conf/ext/base/GitlabCI/Gulp/Gulpfile.js Gulpfile.js
    cp public/typo3conf/ext/base/GitlabCI/Gulp/package.json package.json

    ## copy empty files for customising of CI/CD processes in an individual project
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/after-composer.sh gitlab-ci-scripts/after-composer.sh
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/build-extensions.sh gitlab-ci-scripts/build-extensions.sh
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/pre-deploy.sh gitlab-ci-scripts/pre-deploy.sh
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/rsync-build-excludes.txt gitlab-ci-scripts/rsync-build-excludes.txt
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/rsync-deploy-excludes.txt gitlab-ci-scripts/rsync-deploy-excludes.txt

    ## build website extension if not exist

    cp -R public/typo3conf/ext/base/GitlabCI/Scaffolding-Ext/* public/typo3conf/ext/

    ## copy npm infrastructure
    cp public/typo3conf/ext/base/GitlabCI/Scaffolding/gulp-config.js gulp-config.js

    ## install node packages
    sh public/typo3conf/ext/base/GitlabCI/Scripts/npm-dependencies.sh

    touch .installed
fi