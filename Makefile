all: fix static test


fix:
	docker-compose exec phpinvariant vendor/bin/php-cs-fixer fix

static:
	docker-compose exec phpinvariant vendor/bin/phpstan analyze src -c phpstan.neon

test:
	docker-compose exec phpinvariant vendor/bin/phpunit tests

invariant:
	docker-compose exec phpinvariant php app.php check --config=config.yml


