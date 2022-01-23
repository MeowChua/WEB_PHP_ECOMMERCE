<?php
    require_once '../lib/database.php';
    require_once '../helpers/format.php';
?>



<?php
    class hoadon
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        

        public function show_hoadon()
        {
            $query = "SELECT * FROM tbl_hoadon ";
            $result = $this->db->select($query);
            return $result;
        }


        public function show_chitiethoadon($id)
        {

            $query = "SELECT * FROM tbl_hoadon, tbl_chitiethoadon WHERE tbl_hoadon.maHoaDon = tbl_chitiethoadon.maHoaDon AND tbl_hoadon.maHoaDon = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_chitiethoadon2($id)
        {

            $query="SELECT *,sum(`soLuongSP`) FROM `tbl_chitiethoadon` WHERE `maHoaDon`='$id' and `soLuongSP`>0 GROUP BY `maSP`";
            $result = $this->db->select($query);
            return $result;
        }
            
        public function show_hoadonPhanTrang()
        {
            //Phân trang
            $sanPhamTungTrang = 10; //Sản phẩm từng trang

            if (!isset($_GET['trang'])){
                    $trang = 1;
            }else{
                    $trang = $_GET['trang'];
            }
            $tungTrang = ($trang - 1) * $sanPhamTungTrang; //Vị trí bắt đầu $trang

            //Search và show
           if (isset($_GET['wordSearch']) && !empty($_GET['wordSearch']) ){
                if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) ){
                    $wordSearch = $_GET['wordSearch'];
                    $timTheo = $_GET['timTheo'];
                    

                    if ($timTheo == "Mã hóa đơn"){
                        $query = "SELECT * FROM tbl_hoadon WHERE maHoaDon LIKE '%$wordSearch%' ORDER BY maHoaDon DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    }
                    if ($timTheo == "Mã khách hàng"){
                        $query = "SELECT * FROM tbl_hoadon WHERE maKhachHang LIKE '%$wordSearch%' ORDER BY maHoaDon DESC LIMIT $tungTrang, $sanPhamTungTrang";
                    }
                    if ($timTheo == "Ngày lập hóa đơn"){
                        $query = "SELECT * FROM tbl_hoadon WHERE ngayDat LIKE '%$wordSearch%' ORDER BY maHoaDon DESC LIMIT $tungTrang, $sanPhamTungTrang  ";
                    }
                    
                    
                }
                
            }else{
                    $query = "SELECT * FROM tbl_hoadon ORDER BY maHoaDon DESC LIMIT $tungTrang, $sanPhamTungTrang "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
            }

            if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) ){
                if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) ){
                    $ngaytruoc = $_GET['ngaytruoc'];
                    $ngaysau = $_GET['ngaysau'];

                    $query = "SELECT * FROM tbl_hoadon WHERE ngayDat BETWEEN '$ngaytruoc' AND '$ngaysau' ORDER BY maHoaDon DESC ";
                }
            }

            
            //$query = "SELECT * FROM tbl_donhang ";
            $result = $this->db->select($query);
            return $result;

        }

        public function getAllHoaDon() //Dùng cho phân trang,...
        {

            if (isset($_GET['wordSearch']) && !empty($_GET['wordSearch']) ){
                if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) ){
                    $wordSearch = $_GET['wordSearch'];
                    $timTheo = $_GET['timTheo'];

                    if ($timTheo == "Mã hóa đơn"){
                        $query = "SELECT * FROM tbl_hoadon WHERE maHoaDon LIKE '%$wordSearch%' ORDER BY maHoaDon DESC  ";
                    }
                    if ($timTheo == "Mã khách hàng"){
                        $query = "SELECT * FROM tbl_hoadon WHERE maKhachHang LIKE '%$wordSearch%' ORDER BY maHoaDon DESC ";
                    }
                    if ($timTheo == "Ngày lập hóa đơn"){
                        $query = "SELECT * FROM tbl_hoadon WHERE ngayDat LIKE '%$wordSearch%' ORDER BY maHoaDon DESC   ";
                    }
                    
                }
                
            }else{
                    $query = "SELECT * FROM tbl_hoadon ORDER BY maHoaDon DESC "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
            }

            $result = $this->db->select($query);
            return $result;
        }

        
        public function sum_hoadon()
        {
            $query = "SELECT SUM(giaTriHD) AS tongHD FROM tbl_hoadon";
            $result = $this->db->select($query);
            return $result;
        }
        


        
        
    }

?>