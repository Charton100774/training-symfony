# Training Symfony 3.3

My application to try some stuffs about Symfony 3.3
In this project, I'm trying to use various components of Symfony like :
* [Authentication](https://symfony.com/doc/current/security.html)
* [Service container](http://symfony.com/doc/current/service_container.html)
* [Subscriber](http://symfony.com/doc/current/doctrine/event_listeners_subscribers.html)
* [Data transormers](https://symfony.com/doc/current/form/data_transformers.html)

this list should evolve.

Also, to improve this project, I'm using some tools like :
* [Bootstrap4](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
* [SASS](http://sass-lang.com/documentation/file.SASS_REFERENCE.html)
* [Gulp](https://github.com/gulpjs/gulp/blob/master/docs/API.md)
* [Font-awesome](http://fontawesome.io/)
* [Browserify](http://browserify.org/)


## Getting Started

### Installing

This project require 
* [Docker](https://docs.docker.com/)
* [Docker-compose](https://docs.docker.com/compose/)

#### Clone the project
```
git clone https://github.com/pifaace/training-symfony.git
```

#### Run composer install
```
composer install
```

#### Run npm install
```
npm install
```

#### Run gulp
```
gulp
```

### Running docker containers

#### Update database configuration
copy/paste these paramaters into app/config/parameters.yml
```
parameters:
    database_host: mysql
    database_port: 3306
    database_name: training-symfony
    database_user: root
    database_password: secret
```

#### Running containers
```
$ docker-compose up -d
```

#### Stoping containers
```
$ docker-compose stop
```

### Dump database

```
docker-compose run blog-server php bin/console doctrine:schema:update --force
```

And run datafixtures

```
docker-compose run blog-server php bin/console doctrine:fixtures:load
```

### Routes
To access to the dashboard admin go to the following url :
```
/admin/dashboard
login : admin
password : password
```
