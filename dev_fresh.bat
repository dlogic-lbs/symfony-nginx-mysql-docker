Rem : Prune the docker
docker-compose down
docker system prune -y
docker-compose up -d --build --remove-orphans
