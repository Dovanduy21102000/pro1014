<?php 
    class SanPham{
        public $conn;
        public function __construct(){
            $this -> conn = connectDB();
        }

        public function getAllSanPham(){
           try{
            $sql = "SELECT * FROM san_phams";
            $stmt =$this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
           }catch(Exception $e){
            echo "Error: ". $e->getMessage();    
           }
        }

        public function getAllSanPhamNoiBat(){
            try{
                $sql = ' SELECT san_phams .*,danh_mucs.ten_danh_muc FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.trang_thai= 1
                ORDER BY san_phams.luot_xem DESC
                LIMIT 10';
                $stmt =$this->conn->prepare($sql);
                $stmt->execute();
            }catch(Exception $e){
                echo "Lỗi". $e->getMessage();
            }
        }
        public function getDetalPham(){
            try{
                $sql = 'SELECT san_phams .*,danh_mucs.ten_danh_muc FROM san_pham
                INNER JOIN danh_mucs ON san_pham.danh_muc_id = danh_mucs.id
                WHERE san_pham.id = :id';
                $stmt =$this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
                ;
            }catch(Exception $e){
                echo "Lỗi". $e->getMessage();
            }
        }

        public function getListAnhSanPham(){
            try{
                $sql = "SELECT * FROM hinh_anh_san_pham WHERE san_pham_.id = :id";
                $stmt =$this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Lỗi". $e->getMessage();
            }
        }

        public function getBinhLuanSanPham(){
            try{
                $sql = 'SELECT binh_luans.*, tai_khoan.ho_ten,tai_khoan.anh_dai_dien FROM binh_luans
                INNER JOIN tai_khoan ON binh_luans.tai_khoan_id = tai_khoan.id
                WHERE binh_luans.san_pham_id = :id AND binh_luans.trang_thai =1 ';
                $stmt =$this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Lỗi". $e->getMessage();
            }
        }
        
        public function getListSanPhamDanhMuc($danh_muc_id){
            try{
                $sql = 'SELECT san_phams . * , danh_mucs.ten_danh_muc FROM san_phams 
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.danh_muc_id =' . $danh_muc_id;
                $stmt =$this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Lỗi". $e->getMessage();
            }
        }

        public function getSanPhamByCategory($danh_muc_id){
            try{
                $sql = 'SELECT san_phams. *, danh_mucs.ten_danh_muc
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.trang_thai =1
                AND san_phams.danh_muc_id = :danh_muc_id
                ';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    'danh_muc_id'=> $danh_muc_id
                ]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Lỗi". $e->getMessage();
            }
        }
    }
?>