for No application encryption key has been specified.. use -> php artisan key:generate

seashore.informatics.buu.ac.th

laravel new ชื่อ
composer install
ย้ายไฟล์ index.php กับ htaccess มาจาก public
แก้ไฟล index.php โดย
'/../vendor/autoload.php' -> '/vendor/autoload'
ทำทั้ง 3 อัน
อย่าลืมเช็ค .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=newmy (สำคัญ มันคือชื่อlaravelที่สร้าง)
DB_USERNAME=root
DB_PASSWORD=

php artisan make:controller BookController
//สร้าง controller

php artisan make:model Book
//สร้าง model

php artisan make:migration create_books_table
//สร้างตาราง

php artisan migrate
