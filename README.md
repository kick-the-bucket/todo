# ToDo application with Laravel

## Requirements
* PHP 7.2
* `npm`
* `docker` & `docker-compose`

## Running the application
* Copy the example config
  ```bash
  cp .env.example .env
  ```
* Install `NPM` dependencies
  ```bash
  npm install
  ```
* Build frontend assets
  ```bash
  npm run production
  ```
* Install `composer` dependencies
  ```bash
  composer install --optimize-autoloader
  ```
* Checkout git submodule(s) - `laradoc` container configuration
  ```bash
  git submodule update --init
  ```
* Copy the example `laradoc` config
  ```bash
  cp laradoc/env-example laradoc/.env
  ```
* Run the `Docker` containers with `docker-compose`
  ```bash
  cd laradock && docker-compose up -d nginx mysql
  ```
* Open the application in the browser
  [http://localhost/todo](http://localhost/)
