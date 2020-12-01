all:			up
up:
				docker-compose up -d --build
install:
				docker-compose run --rm php composer install