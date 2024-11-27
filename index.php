<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Student.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

$page = match ($act) {
    '/' => 'Trang chủ', // Xử lý khi act là '/'
    'home' => HomeController::index(), // Gọi phương thức index của HomeController
    'student-list' => Student::list(), // Gọi phương thức list trong model Student
    default => '404.php', // Xử lý các giá trị không xác định
};


