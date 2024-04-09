# Password-Manager
[![Coverage Status](https://coveralls.io/repos/github/LURZU/password-blog-M1-ynov/badge.svg?branch=master)](https://coveralls.io/github/lurzu/password-blog-M1-ynov?branch=master)

## Technology
- Laravel
- Docker
- MySQL
- PHPUnit

## Description

Blog + Password Manager

## Prerequisites for docker install

- Docker
- Docker Compose

## Prerequisites for docker install

- Composer
- MySQL
- Php

## Installation with docker 

1. Clone the repository:

    ```bash
    git clone https://github.com/LURZU/password-blog-M1-ynov.git
    ```

2. Navigate to the project directory:

    ```bash
    cd password-blog-M1-ynov
    ```

3. Copy the `.env.example` file to `.env` and adjust the configurations according to your environment:

    ```bash
    cp .env.example .env
    ```

4. Start the Docker containers:

    ```bash
    docker-compose up -d
    ```

## Configuration

1. Connect to docker image ssh:

    ```bash
    docker exec -ti password-manager-2-php-1 bash
    ```
2. Install all dependance on docker image
   
    ```bash
    compose update
    ```

3. Generate a key for the application:

    ```bash
     php artisan key:generate
    ```

4. Migrate et seed database
    ```bash
     php artisan migrate
     php artisan db:seed
    ```
4. Finally install all npm dependance and run it to have css working
    ```bash
     npm intall
     npm run dev
    ```

5. It's done, now it's working !



   ## Install without

1. Install all the prerequirement to launch laravel

2. Clone the repository:

    ```bash
        git clone https://github.com/LURZU/password-blog-M1-ynov.git
    ```

3. Navigate to the project directory:

    ```bash
        cd password-blog-M1-ynov
    ```

4. Copy the `.env.example` file to `.env` and adjust the configurations according to your environment:

    ```bash
        cp .env.example .env
    ```

5. compose install


6. Install all dependance on docker image
   
    ```bash
    compose update
    ```

7. Generate a key for the application:

    ```bash
     php artisan key:generate
    ```

8. Migrate et seed database
    ```bash
     php artisan migrate
     php artisan db:seed
    ```

9. Finally install all npm dependance and run it to have css working
    ```bash
     npm intall
     npm run dev
    ```

10. It's done, now it's working !

## Testing

1. classic test

    ```bash
        php artisan test
    ```

2. Testing with coverage

```bash
php artisan test --coverage
```


