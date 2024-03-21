# Microservices Setup Guide

This guide outlines the setup process for two microservices: AuthService and NotificationService. Follow the steps below to get started.

## AuthService Setup

1. Clone the AuthService repository:
git clone git@github.com:Shoukat-bjr/AuthService.git


2. Navigate to the project folder:
cd AuthService


3. Build the Docker containers:
docker-compose build


4. Access the AuthService container shell:
docker-compose exec auth_service sh


5. Inside the container, install Composer dependencies:
composer install


## NotificationService Setup

1. Clone the NotificationService repository:
git clone git@github.com:Shoukat-bjr/NotificationService.git


2. Navigate to the project folder:
cd NotificationService


3. Build the Docker containers:
docker-compose build


4. Access the NotificationService container shell:
docker-compose exec notification_service sh


5. Inside the container, install Composer dependencies:
composer install

6. Inside the container, run Laravel migration:
php artisan migrate

## Service URLs

- AuthService URL: [http://localhost:8080/](http://localhost:8080/)
- NotificationService URL: [http://localhost:8081/](http://localhost:8081/)

## Postman Setup

1. Open Postman.

2. Create a POST request for AuthService:
- URL: [http://localhost:8080/user](http://localhost:8080/user)
- Method: POST
- Body: Form data (first_name, last_name, email)

## Post User Creation

- After creating a user, the data will be stored in the database.
- The UserCreatedJob will be dispatched.
- Check the NotificationService log file for logs related to the dispatched job.

