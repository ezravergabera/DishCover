<h1 align="center">DishCover</h1>

> A Food Recipe Searching App developed using Laravel and MySQL, integrating the Edamam API.

# How to use this Laravel Project

## Pre-requisites:

1. **Composer:** Dependency manager for PHP.
2. **PHP Artisan:** Command-line interface for Laravel.
3. **NPM:** Node Package Manager for frontend dependencies.
4. **Laragon:** Local server for running your Laravel application.

## Initial Setup:

1. **Install Composer:** Ensure Composer is installed. Download it from [Composer](getcomposer.org).
2. **Install NPM:** Ensure NPM is installed. Download it from [Node.js](https://nodejs.org/en).
3. **Install Laragon:** Download and install Laragon from [Laragon](https://laragon.org).

## Step-by-Step Instructions

1. Open Laragon:
   -    Launch Laragon.
   -    Click on "Start All" to start Apache/Nginx and MySQL services.
2.  Prepare the '.env' File:
    -   Customize the .env file in the root of your Laravel project with your specific configuration:
        ```
        DB_DATABASE=<name of your database that is found in laragon>
        DB_USERNAME=<username of your database that is found in laragon>
        DB_PASSWORD=<password of your database>

        EDAMAM_API_KEY=<api key of your edamam account>
        EDAMAM_APP_ID=<app id of your edamam account>
        ```
3. Install Dependencies:
   -    Open a terminal and navigate to your project folder.
   -    Run Composer to install PHP dependencies:
        ```
        composer install
        ```
   -    Run NPM to install frontend dependencies:
        ```
        npm install
        ```
1. Migrate the Database:
   -   Run the following command to create the database tables:
        ```
        php artisan migrate
        ```

## Running the Laravel Project

1. Open 2 Terminals
- **Terminal 1:**
  - Navigate to your project folder:
    ```
    cd <path-to-this-folder>
    ```
  - Start the Laravel development server:
    ```
    php artisan serve
    ```
- **Terminal 2:**
  - Navigate to your project folder:
    ```
    cd <path-to-this-folder>
    ```
  - Compile and watch your assets:
    ```
    npm run dev
    ```

2. Open the Local Server in Your Browser:
- Open your browser and navigate to http://127.0.0.1:8000 or the listed url in your **Terminal 1** to see the Laravel Application.

## Collaborators

- Juan Ramon Corpuz
- Hershey Ann C. Estoya
- Harvey Pascual
- Jose Ezra Nazarene B. Vergabera
- Gwyneth Anmarie C. Yim

## Licenses

MIT License

Copyright (c) 2024 Corpuz, Estoya, Pascual, Vergabera, Yim

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.