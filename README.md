## Excel Import Project

 - Email, phone, and employee_id fields are unique. The script needs to check if duplicate records exist.
 - Email and Phone fields need to be valid.
 - Showing the result of the import function (success or failure) in the blade.
 
### To install Composer

 `composer install --ignore-platform-reqs`

### To run this project via Laravel Sail

 `composer require laravel/sail --dev`
 
 `php artisan sail:install`
 
 `./vendor/bin/sail up`

 `sail artisan migrate`



### To run this project via local development server

 `composer install --ignore-platform-reqs`

 `php artisan key:generate`

 `php artisan migrate`

 `php artisan serve`
 
 
 > The sql file is in the database folder.







