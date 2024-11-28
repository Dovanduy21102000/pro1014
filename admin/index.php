<?php 
  session_start();
    require_once '../commons/env.php';
    require_once '../commons/function.php.php';

    //require controller

    require_once './controllers/AdminBaoCaoThongKeController.php';
    require_once './controllers/AdminDanhMucController.php';
    require_once './controllers/AdminDonHangController.php';
    require_once './controllers/AdminTaiKhoanController.php';
    require_once './controllers/AdminSanPhamController.php';
    //require models

    require_once './models/AdminDanhMuc.php';
    require_once './models/AdminDonHang.php';
    require_once './models/AdminSanPham.php';
    require_once './models/AdminTaiKhoan.php';
    require_once './models/ThongKe.php';
    


    //route 
    $act = $_GET['act']??'/';
    //checklogin admin
    // if ($act !== 'login-admin' &&$act !== 'logout-admin') {
    //   checkLoginAdmin();
    // }



    match($act){
        //Định nghĩa các route

        // route báo cáo thống kê - trang chủ
        '/' => (new AdminBaoCaoThongKeController())->home(),

    };
    // route don hang
    
