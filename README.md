## Создание пустого проекта
В папке будующего проекта выполнить команды:
```shell
composer create-project laravel/laravel .
php artisan install:api
php artisan config:publish cors
php artisan storage:link
```
В корне проекта создать файл .htaccess
```php
RewriteEngine on
RewriteRule ^(.*)$ public/$1 [L]
```

## Установка проекта из репозитория
1. Склонируйте репозиторий
```shell
cd domains
git clone https://github.com/Alomon/laravel12.git
```
2. Установите composer-зависимостей
```shell
cd laravel12
composer install
```
3. Скопируйте файл .env.example в .env
```shell
copy .env.example .env
```
4. Сгенерируйте ключ шифрования
```shell
php artisan key:generate
```
5. Измените файл конфигурации .env (пример для БД MySQL)
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
```
6. Создайте жесткую ссылку на хранилище файлов
```shell
php artisan storage:link
```
