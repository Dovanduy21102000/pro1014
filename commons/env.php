<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/petshop/');
define('BASE_URL_ADMIN'       , 'http://localhost/petshop/admin/?act=');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'petshop');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
