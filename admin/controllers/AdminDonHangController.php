<?php
class AdminDonHangController
{
    public $modelDonhang;

    public function _construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
}