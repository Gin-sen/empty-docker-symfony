all:			up
up:
				docker-compose up -d --build
install:
				cd trad_app && composer install && composer fund
				cd ..
				up
dinstall:
				docker-compose exec php composer install && composer fund
dcontrol:
				docker-compose exec php symfony console make:controller TradController
update:
				docker-compose up -d --build php
require:
				docker-compose exec php composer require
clean:
				docker-compose down

re:				clean up

.PHONY: all up update install dinstall dcontrol require clean re