## Subscription System

This is a simple Subscription system develped using laravel.) in which users can subscribe to
one or more websites
Whenever a new post is published on a particular website, all its subscribers shall receive an email with the post
title and description in it


## Installation

#### 1. Download

      git clone https://github.com/Madusankaperera95/BackendSubscription

#### 2. Environment Files
This package ships with a .env.example file in the root of the project.

You must rename this file to just .env

Note: Make sure you have hidden files shown on your system.

#### 3. Composer
Laravel project dependencies are managed through the PHP Composer tool. The first step is to install the depencencies by navigating into your project in terminal and typing this command:

        composer install

#### 4. Create Database
You must create your database on your server and on your .env file update the following lines:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=

Change these lines to reflect your new database settings.

#### 5. Enable Mail Configurations

        MAIL_MAILER=smtp
        MAIL_HOST=
        MAIL_PORT=
        MAIL_USERNAME=
        MAIL_PASSWORD=
Fill these Env fields to enable email sending configuration.

#### 5. Artisan Commands

The first thing we are going to do is set the key that Laravel will use when doing encryption..

       php artisan key:generate

We are going to run the built in migrations to create the database tables:

        php artisan migrate

You should see a message for each table migrated.

We are now going to insert the dummy data information.
Now seed the database with:

        php artisan db:seed

You should get a message for each file seeded, you should see the information in your database tables.



To Run the application

      php artisan serve
