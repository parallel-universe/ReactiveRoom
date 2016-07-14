all: 
	grunt build -v && webpack -v && start_server

js_build:
	grunt build -v && webpack -v

js_watch:
	grunt build -v && webpack --watch

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
