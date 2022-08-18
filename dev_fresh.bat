Rem : Prune the docker
docker-compose down
docker system prune -y
docker-compose up -d --build --remove-orphans

Rem : Get into php_front container and run some scripts
docker exec php_front /bin/sh -c "composer install"

Rem : Get into php_api container and run some scripts
docker exec php_api /bin/sh -c "composer install"
docker exec php_api /bin/sh -c "php bin/console doc:mig:mig --no-interaction --allow-no-migration --all-or-nothing"
