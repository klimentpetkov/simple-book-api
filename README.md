# Simple Book App

## Setup

~~~
composer install
cp .env.example .env
php artisan key:generate
~~~
Enter your DB credentials

~~~
php artisan migrate
php artisan db:seed
~~~
