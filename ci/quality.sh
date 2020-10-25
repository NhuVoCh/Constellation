#!/bin/bash

sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y wget "php${1}" "php${1}-tokenizer" "php${1}-xml"
sudo wget -O /usr/local/bin/phpcs https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
sudo chmod +x /usr/local/bin/phpcs
php --version
phpcs --version
phpcs
