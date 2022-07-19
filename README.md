# ![Multi-Vendor-Ecommerce](logo.png)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)


Clone the repository

    git clone git@github.com:amdadulhaque-dev/ecommerce-multi-vendor.git

Switch to the repo folder

    cd ecommerce-multi-vendor

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:amdadulhaque-dev/ecommerce-multi-vendor.git
    cd ecommerce-multi-vendor
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    

# Code overview

## Full Project Details

- Login User
- Register User
- Reset Password
- Create record in database through forms
- Update record in database through forms
- Delete record through forms.
- Search and view the record.
- Laravel admin panel.
- View Record in tables
- API
- Wouteing in web.php
- Blade Template
- Email Verification
- Authentication
- Filesystem
- Mail
- Migrations
- Policies
- Providers
- Requests
- Seeding & Factories

Beside Laravel, this project uses other tools like:

- [Bootstrap](https://getbootstrap.com/)
- [Font Awesome](https://fontawesome.com/)
- Javascript

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Authentication
 
This applications uses [Laravel](https://laravel.com/docs/8.x/authentication) - authentication.`Laravel` application's authentication configuration file is located at `config/auth.php`. This file contains several well-documented options for tweaking the behavior of Laravel's `Authorization` services.

- https://laravel.com/docs/8.x/authentication#introduction

----------

<!-- # See Demo in LIVE SERVER
 

- https://www.unishshoekattor24.com/ -->
If You face any error Please Contact me

[Facbook](https://www.facebook.com/amdadulhaquemelonmia)

