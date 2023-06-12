<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Amazing E-Book

This is a mini book renting website. With `IDN` & `ENG` language localization.

### Preview

https://github.com/VL-037/Amazing-E-Book/assets/68309124/7ac3143d-a46c-409d-bea9-55cc689b2ef1

### To run this project, please do the following:

Make sure you have these tools
| Tool              | Detail |
|-------------------|--------|
| PHP               | https://www.php.net/downloads.php |
| Composer          | https://getcomposer.org/download |
| XAMPP             | https://sourceforge.net/projects/xampp |

Create a .env file in the root directory and add the following code

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:I+Hz+rXhhVMR0KhqvE6/hNUhfvScExxX2giFRi55ITM=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ReXsteam
DB_USERNAME=root
DB_PASSWORD=
```

Run MySQL & Apache from `XAMPP`

Then run the following commands to start the app
```
composer install
php artisan migrate:fresh --seed
php artisan serve
```

