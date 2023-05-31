## Problem Alert
Problem Alert is laravel library for handling error and saving this to database.

## Laravel Support
- Laravel 6++

## Installing
You can install this library using composer
```terminal
composer require bangunsoft/problem-alert
php artisan vendor:publish --tag=problem-config
```

## Migrate Database
You must migrate database after install this package
```terminal
php artisan migrate
```
Or you can use
```terminal
php artisan migrate --path=/vendor/bangunsoft/problem-alert/database/migrations/2023_05_30_000001_create_problems_table.php
```

## View Access
- Login to your website
- Open ```{APP_URL}/vendor/problems``` in your browser. 

## Screenshoot
![Sreenshoot](./screenshoot/view.png)

## Progress
- Catch errors (Done)
- Catch http request if not 2xx (Done)
- MVC (Done)
- I haven't idea

## Testing
Open terminal and run
```terminal
./vendor/bin/phpunit ./vendor/bangunsoft/problem-alert/tests/TestCase.php
```

## Contribute
If you want join to collaborations with me, I'm very happy for that. 
You can contact me via email [Bangunsoft@gmail.com](mailto:bangunsoft@gmail.com)

### Note
My English is bad, so sorry for that.