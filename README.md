# Laravel App Boilerplate

This forms the basis of single-page/dashboard-based Laravel web applications.

## Requirements

* Suitable server (LAMP-based)
* A MySQL database for user and preferences tables
* Bower (and this Node/NPM)

## Up and Running

Create your MySQL database and clone this repo into a new vhost/web dir.

Run composer's install option to grab everything for Laravel:
```
composer install
```
Run bower's install option to grab all of the required .js/.css (public/assets/vendor):
```
bower install
```
Copy over .env.example so you have your own preferences file:
```
cp .env.example .env
```
Edit it and modify the last 4 lines:
```
nano .env
```
```
DB_HOST=localhost
DB_DATABASE=app
DB_USERNAME=user
DB_PASSWORD=password
```
Run Laravel/artisan to generate a new app key:
```
php artisan key:generate
```
Run the migrations and database seeders to get you up and running:
```
php artisan migrate
```
```
php artisan db:seed
```
Set permissions appropriately
```
chmod -R 777 /my/app/webroot
```
Default user/password is: admin@localhost/password

## Features

**Migrations**
- Users
- Preferences

**Seeders**
- Users
- Preferences

**General Routes**
- Home => 'home'
- Dashboard => 'dashboard'

**Auth Routes**
- Login => 'login'
- Register => 'register'
- Password reset => 'password/reset'

**Controllers**
- AppController

**Error Pages**
- 404
- 503

**3rd Party CSS Libraries**
- [FontAwesome](https://fortawesome.github.io/Font-Awesome/){:target="_blank"}
- [Animate.css](https://daneden.github.io/animate.css/){:target="_blank"}

**3rd Party JS Libraries**
- [jQuery](http://jquery.com/){:target="_blank"}
- [Bootstrap](http://getbootstrap.com/){:target="_blank"}
- [Bootstrap-select](https://silviomoreto.github.io/bootstrap-select/){:target="_blank"}
- [Bootswatch](https://bootswatch.com/){:target="_blank"}

## Notes
There is already a .htaccess in the root to rewrite to /public