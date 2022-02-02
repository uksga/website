#!/bin/sh

git pull origin master && \
php bin/console cache:clear --no-warmup --env=prod && \
php bin/console cache:warmup --env=prod && \