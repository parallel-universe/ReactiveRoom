all: 
	grunt build && webpack

build:
	grunt build && webpack

watch:
	grunt build && webpack --watch

clean_all:
	rm -rf node_modules && rm -rf app/build && rm -rf app/vendor

clean_build:
	rm -rf app/build

install:
	npm install && bower install && grunt build && webpack

clean_install:
	rm -rf node_modules && rm -rf app/build && rm -rf app/vendor && npm install && bower install && grunt build && webpack

run_webserver:
	cd app && php -S 127.0.0.1:8000
