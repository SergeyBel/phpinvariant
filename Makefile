test:
	docker-compose exec phpinvariant vendor/bin/phpunit .

fix:
	docker-compose exec phpinvariant vendor/bin/php-cs-fixer fix

static:
	docker-compose exec phpinvariant vendor/bin/phpstan analyze src -c phpstan.neon

