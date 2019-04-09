#!/bin/sh

# 1: execute git pull
git pull

# 2: update dependencies
npm update

# 3: build styles and scripts
gulp styles
gulp scripts
