#!/bin/sh
git pull
ddev composer install
cp public/typo3conf/ext/base/GitlabCI/Gulp/Gulpfile.js Gulpfile.js
npm install
npx gulp styles
npx gulp scripts