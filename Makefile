all: 
	grunt build -v && webpack -v && start_server

js_build:
	rm -rf app/build && grunt build -v && webpack -v

js_watch:
	rm -rf app/build && grunt build -v && webpack --watch & grunt watch:styles & grunt watch:templates

js_clean_modules:
	rm -rf node_modules && rm -rf app/vendor

js_clean_build:
	rm -rf app/build

js_install:
	npm install -v && bower install -v && grunt build -v && webpack -v

start_server:
	cd app && php -S 127.0.0.1:8000

migrate:
	php bin/database migrations:migrate

phpcs:
	./vendor/bin/phpcs -p --standard=resources/phpcs-ruleset.xml --error-severity=1 --encoding=utf-8 src/
