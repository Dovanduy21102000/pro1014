<!-- header -->
 <?php
 include './views/layouts/header.php';
 ?>
 <!-- Navbar -->
  <?php
  include './views/layouts/navbar.php';
  ?>
  <!-- Slidebar -->
   <?php
   include './views/layouts/slidebar.php';
   ?>
   <!-- Content --> 
    <div class="content-wrapper">
        <!-- content header --> 
         <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>Quản lí đơn hàng - Đơn hàng <?= $donHang['ma_don_hang'] ?></h1>
                    </div>
                    <div class="col-sm-2">
                        <form action="" method="POST">
                            <select name="" id="" class="form-group">
                                <option value="" disabled></option>
                                <?php foreach($listTrangThaiDonHang as $key => $trangThai): ?>
                                <option <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected': ''  ?>
                                        <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled':'' ?>
                                        value="<?= $trangThai['id'] ?> ">
                                        <?= $trangThai['ten_trang_thai'] ?>
                            </option>
                            <?php endforeach ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
         </section>
         <!-- main content -->
          <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php
                        if($donHang["trang_thai_id"] ==1){
                            $colorAlerts = 'primary';
                        }elseif($donHang['trang_thai_id'] >=2 && $donHang['trang_thai_id'] <=8){
                            $colorAlerts = 'warning';
                        }elseif($donHang['trang_thai_id'] ==9){
                            $colorAlerts = 'success';
                        }else{
                            $colorAlerts = 'danger';
                        }
                        ?>
                        <div class="callout callout-info">
                            <div class="alert alert-<?= $colorAlerts ?>" role="alert">
                                Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
                            </div>
                        </div>

                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-cat"></i>pro1014
                                        <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?></small>
                                    </h4>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Thông tin người đặt
                                        <address>
                                            <strong><?= $donHang['ho_ten'] ?></strong><br>
                                            Email: <?= $donHang['email'] ?><br>
                                            Số điện thoại: <?= $donHang['so_dien_thoai'] ?><br>
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        Thông tin đơn hàng
                                        <address>
                                            <strong>Mã đơn hàng: <?= $donHang['ma_don_hang']?></strong><br>
                                            Tổng tiền: <?= $donHang['tong_tien']?><br>
                                            Ghi chú: <?=$donHang['ghi_chu'] ?><br>
                                            Thanh toán: <?=$donHang['ten_phuong_thuc'] ?> <br>
                                        </address>
                                    </div>
                                </div>
                                <!-- table row --> 
                                 <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $tongTien = 0; ?>
                                                <?php foreach($sanPhamDonHang as $key => $sanPham): ?>
                                                    <tr>
                                                        <td><?= $key+1 ?></td>
                                                        <td><?= $sanPham['ten_san_pham'] ?></td>
                                                        <td><?= $sanPham['don_gia'] ?></td>
                                                        <td><?= $sanPham['so_luong'] ?></td>
                                                        <td><?= $sanPham['thanh_tien'] ?></td>
                                                    </tr>
                                                    <?php $tongTien += $sanPham['thanh_tien'] ?>
                                                    <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-6">
                                        <p class="lead"> Ngày đặt hàng: <?=$donHang['ngay_dat']?> </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Thành tiền:</th>
                                                    <td><?= $tongTien ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Vận chuyển:</th>
                                                    <td>30.000</td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng tiền:</th>
                                                    <td><?= $tongTien +30000 ?></td>
                                                </tr>
                                            </table>
                                        
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
    </div>

    <!-- footer --> 
     <?php 
     include './views/layouts/footer.php';
     ?>
     <script>
        $(function(){
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy","csv","excel","pdf","print","colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
     </script>
