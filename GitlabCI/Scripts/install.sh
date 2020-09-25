#!/usr/bin/env bash

echo "make sure that standard folder is available"
[ -d public ] || mkdir -p public
[ -d public/typo3conf ] || mkdir -p public/typo3conf

cp public/typo3conf/ext/base/GitlabCI/Scaffolding/.gitignore .gitignore

echo "copy the CI/CD yml configuration"
cp public/typo3conf/ext/base/GitlabCI/.gitlab-ci.yml .gitlab-ci.yml
echo "copy gulp setup"
cp public/typo3conf/ext/base/GitlabCI/Gulp/Gulpfile.js Gulpfile.js
cp public/typo3conf/ext/base/GitlabCI/Gulp/package.json package.json

echo "copy the git-pull.sh file to the project root directory"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/git-pull.sh git-pull.sh

echo "build website extension if not exist"
cp -R public/typo3conf/ext/base/GitlabCI/Scaffolding-Ext/* public/typo3conf/ext/

echo "copy gulp-file infrastructure"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/gulp-config.js gulp-config.js

echo "create .env file"
cp public/typo3conf/ext/base/GitlabCI/Scaffolding/.env-example .env