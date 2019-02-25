# Demo Symfony with API-Platform
This project use docker to build php, cache proxy (not used), postgres and client container.

## Instructions
Make sure to have docker installed and running. Also check if you are logged in.

Run `docker-compose up -d` to run the docker instance in daemon mode

Make sure that everything went well and all the dependecies were installed correctly.

Install project's dependencies:
`docker-compose exec php composer update`

Then you can start to run the simple tests by type:
`docker-compose exec php bin/phpunit`

If everything went well, start to load some fake data into our postgres db:
`docker-compose exec php bin/console doctrine:fixtures:load`

Now you have some data to test out the API.

## API
Swagger documentation: http://localhost:8080/

## Client (React) + Bootstrap
Client: http://localhost