#!/bin/bash

sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y "php${1}"
php --version
find src -type f -name "*.php" | xargs -n1 php -l
