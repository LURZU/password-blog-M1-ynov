# Password-Manager
[![Coverage Status](https://coveralls.io/repos/github/LURZU/password-blog-M1-ynov/badge.svg?branch=master)](https://coveralls.io/github/lurzu/password-blog-M1-ynov?branch=master)

## Technology
- Laravel
- Docker
- MySQL
- PHPUnit

## Description

Blog + Password Manager

## Prerequisites

- Docker
- Docker Compose

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/LURZU/password-blog-M1-ynov.git
    ```

2. Navigate to the project directory:

    ```bash
    cd project
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

1. Install PHP dependencies:

    ```bash
    docker-compose exec app composer install
    ```

2. Generate a key for the application:

    ```bash
    docker-compose exec app php artisan key:generate
    ```
