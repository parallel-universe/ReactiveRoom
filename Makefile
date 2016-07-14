all: 
	grunt build && webpack

build:
	grunt build && webpack

watch:
	grunt build && webpack --watch

clean:
	rm -rf node_modules && rm -rf app/build && rm -rf app/vendor

install:
	npm install && bower install && grunt build && webpack

clean_install:
	rm -rf node_modules && rm -rf app/build && rm -rf app/vendor && npm install && bower install && grunt build && webpack
