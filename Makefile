GIT_BRANCH := $(shell git rev-parse --abbrev-ref HEAD)
COMMIT ?= $(GIT_BRANCH)

# docker
init:
	@if [ ! -e .env ]; then cp .env.example .env; fi
	@if [ ! -e docker/php/logs/error.log ]; then touch docker/php/logs/error.log; fi
	@if [ ! -e docker/nginx/logs/access.log ]; then touch docker/nginx/logs/access.log docker/nginx/logs/error.log; fi
	docker compose up --build -d
	docker exec work-fusion-php composer install
build:
	docker compose build --pull --no-cache
start:
	docker compose up -d --build
up:
	docker compose up -d
down:
	docker compose down
ver:
	docker exec work-fusion-php php -v

#vendors
composeri:
	docker exec work-fusion-php composer update -W
npmi:
	docker exec work-fusion-php npm i
