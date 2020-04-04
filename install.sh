#!/usr/bin/env bash

docker run -it --rm --name my-running-script \
  -v "$PWD":/usr/src/myapp \
  -w /usr/src/myapp thecodingmachine/php:7.4-v3-slim-cli php composer.phar install
