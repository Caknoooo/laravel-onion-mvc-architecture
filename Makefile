pint:
	./vendor/bin/pint

update:
	composer update

install:
	composer install

test:
	php artisan test -c phpunit.xml

test-coverage:
	php artisan test -c phpunit.xml --coverage-clover build/logs/clover.xml
