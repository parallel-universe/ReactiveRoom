# ReactiveRoom

The ReactiveRoom repository.

## Installation

Install Composer:

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/path/to/reactive-room
php composer.phar install
```

Optionally create a config file to override defaults:

```
touch config/config_env.yml
```

Prepare your database:

```
php bin/database migrations:status
```

## Usage

Run the app:

```
php -S reactive-rooms.dev:8000
```

## Frontend install & running

```
make js_install
make start_server
make js_watch
```
