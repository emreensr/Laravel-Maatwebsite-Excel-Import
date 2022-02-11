### Task
Developers need to write a PHP script to properly import the CSV file into the MySQL database. Developers are free to choose any PHP library and framework. They can also write this script in vanilla PHP.

We expect you to finish this assessment in three days.

You can download the sample code and CSV file here: https://github.com/mivento/assessment-php

Import rules:

Developers will create a table schema for the CSV file. SQL dump of table structure should also be pushed with the final code.
CSV file has 6 fields including name, surname, email, employee_id, phone, and points. Email, phone, and employee_id fields are unique. Therefore, the script needs to check if duplicate records exist.
Email and Phone fields need to be valid. Their formats should be like this: xx@xx.xxx and 5551234567
Plus:

Showing the result of the import function (success or failure) in the UI is a plus.
Developers can improve supplied code and add any functionality like Ajax, error handling, etc... This is a big plus.
Adding a README file and writing instructions on how to run the project is a plus.

> Sql dosyası database klasörünün içindedir.

## Composer yüklemek için

> composer install --ignore-platform-reqs

## Laravel sail kurulum için ve projeyi ayağa kaldırmak için

> composer require laravel/sail --dev
> 
> php artisan sail:install
 
> ./vendor/bin/sail up

> sail artisan migrate




## Php artisan serve ile ayağa kaldırmak için

> composer install --ignore-platform-reqs

> php artisan key:generate

> php artisan migrate

> php artisan serve






