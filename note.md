# TMT Assets Management System

## Cai dat goi laravel modules packages

- composer require nwidart/laravel-modules
- php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
- composer.json
    {
        "autoload": {
            "psr-4": {
            "App\\": "app/",
            "Modules\\": "Modules/"
            }
        }
    }
- composer dump-autoload
- Link tài liệu tham khảo
        <https://nwidart.com/laravel-modules/v6/basic-usage/creating-a-module>

### Câu lệnh sử dụng cơ bản

- php artisan module:make 'module-name'
- php artisan module:make-migration create_products_table Product
- php artisan module:seed --class=TenClassSeeder Product

### Schema create table  

- $table -> enum('is_saleable',['yes','no'])
- $table -> foreignId('created_by')->constrained('users')

### Install spatie permission Packages

- composer require spatie/laravel-permission

- You may manually add the service provider in your config/app.php file:
    'providers' => [
        // ...
        Spatie\Permission\PermissionServiceProvider::class,
    ];
- Command php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"  
- Link tham khao: https://spatie.be/docs/laravel-permission/v5/installation-laravel
