<?php 
  session_start();
    require_once '../commons/env.php';
    require_once '../commons/function.php';

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
        'top10' => (new AdminBaoCaoThongKeController())->to10sanpham(),
        'don-hang-moi' => (new AdminBaoCaoThongKeController()) ->donHangMoi(),
        'don-bom' => (new AdminBaoCaoThongKeController()) ->donBom(),
        'don-hoan' => (new AdminBaoCaoThongKeController()) ->donHoan(),

        //route danh muc
         'danh-muc' => (new AdminDanhMucController()) ->danhSachDanhMuc(),
         'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
         'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
         'form-sua-danh-muc' =>(new AdminDanhMucController())->formEditDanhMuc(),
         'sua-danh-muc'=>(new AdminDanhMucController())->postEditDanhMuc(),
         'xoa-danh-muc'=>(new AdminDanhMucController())->deleteDanhMuc(),

         //route sản phẩm
         'san-pham'=> (new AdminSanPhamController())->danhSachSanPham(),
         'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
         'them-san-pham' =>(new AdminSanPhamController())->postAddSanPham(),
         'form-sua-san-pham' =>(new AdminSanPhamController())->formEditSanPham(),
         'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
         'sua-album-anh-san-pham' =>(new AdminSanPhamController())->postEditAnhSanPham(),
         'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),
         'chi-tiet-san-pham'=> (new AdminSanPhamController())->detailSanPham(),

         //route bình luận

         'update-trang-thai-binh-luan' => (new AdminSanPhamKeController()) -> updateTrangThaiBinhLuan(),
        // route don hang

          'don-hang' =>(new AdminDonHangController())->danhSachDonHang(),
          'form-sua-don-hang'=>(new AdminDonHangController())->formEditDonHang(),
          'sua-don-hang' =>(new AdminDonHangController())->postEditDonHang(),
          'chi-tiet-don-hang' =>(new AdminDonHangController())->detailDonHang(),

        //quản lí tài khoản quản trị
        'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
        'form-them-quan-tri'=>(new AdminTaiKhoanController())->formAddQuanTri(),
        'them-quan-tri'=>(new AdminTaiKhoanController())->postAddQuanTri(),
        'form-sua-quan-tri'=>(new AdminTaiKhoanController())->formEditQuanTri(),
        'sua-quan-tri'=>(new AdminTaiKhoanController())->postEditQuanTri(),

        //route reset pass
        'reset-passwword' =>(new AdminTaiKhoanController())->resetPassword(),

        //quản lí tài khoản khách

        'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->danhSachKhachHang(),
        'form-sua-khach-hang' =>(new AdminTaiKhoanController())->formEditKhachHang(),

    };
    





    
