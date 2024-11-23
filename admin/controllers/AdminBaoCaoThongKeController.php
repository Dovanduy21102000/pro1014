<?php 
class AdminBaoCaoThongKeController{
    public $modelThongKe;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelThongKe = new ThongKe();
        $this->modelTaiKhoan = new AdminTaiKhoan();
       

    }
    public function home(){

        require_once './admin/home.php';
    }
}