<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/DanhMuc.php';
require_once './models/SanPham.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match


match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),
    // sản phẩm
    // 'all-san-pham'=> (new HomeController())->allSanPham(),
};
>>>>>>> 73d2e20f92ec980623f165cf1932043830d3d0c5
