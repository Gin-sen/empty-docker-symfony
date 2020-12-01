# empty-docker-symfony
Empty docker-compose project running a symfony app with nginx gateway, mysql database and php-fpm engine


## Prerequisites
- Docker & DockerCompose installed
- Composer installed

## Installation (dev mode)
At the root of the project :
```bash
cd app
composer install
```

## Launch the app
At the root of the project :
```bash
docker-compose up -d --build
```
then go to `http://localhost:8080`

To update your code, launch the same command.

## Stop the app
At the root of the project :
```bash
docker-compose down
```
