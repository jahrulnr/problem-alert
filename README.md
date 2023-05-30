## Problem Alert
Problem Alert is laravel library for handling error and saving this to database.

## Laravel Support
For now, this library just support for laravel 10 but I will develop support for older version.

## Installing
Add the below lines to composer.json
``` json
{
 "repositories": [
  {
   "url": "https://github.com/jahrulnr/problem-alert.git",
   "type": "git"
  }
 ],
 "require": {
  /// other line
  "bangunsoft/problem-alert": "*"
 },
}
```
After that, you can open terminal and run
```terminal
composer update
php artisan vendor:publish --tag=problem-config
```

## Progress
- Catch errors (Done)
- Catch http request if not 2xx
- MVC

## Contribute
If you want join to collaborations with me, I'm very happy for that. 
You can contact me via email [Bangunsoft@gmail.com](mailto:bangunsoft@gmail.com)

### Note
My English is bad, so sorry for that.