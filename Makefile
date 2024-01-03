docker-build:
	docker compose build --pull
docker-up:
	docker compose up -d
docker-down:
	docker compose down --remove-orphans
#composer
composer-install:
	docker compose run --rm php-cli composer install
composer-be-updated-all:
	docker compose run --rm php-cli composer show -l -o