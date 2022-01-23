<?php
    require_once '../lib/database.php';
    require_once '../helpers/format.php';
?>



<?php
    class donhang
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        

        public function show_donhang()
        {

            $query = "SELECT * FROM tbl_donhang ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_chitietdonhang($id)
        {

            $query = "SELECT * FROM tbl_donhang, tbl_chitietdonhang WHERE tbl_donhang.maDonHang = tbl_chitietdonhang.maDonHang AND tbl_donhang.maDonHang = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_chitietdonhang2($id)
        {

            //$query = "SELECT * FROM tbl_chitietdonhang WHERE maDonHang = '$id'  ";
            $query="SELECT *,sum(`soLuongSP`) FROM `tbl_chitietdonhang` WHERE `maDonHang`='$id' and `soLuongSP`>0 GROUP BY `maSanPham`";
            $result = $this->db->select($query);
            return $result;
        }

        // public function getSoLuongSPTrung($maSanPham, $idDH){
        //     $query = "SELECT SUM(soLuongSP) FROM tbl_chitietdonhang WHERE maSanPham = '$maSanPham' AND maDonHang = '$idDH' ";
        //     $result = $this->db->select($query);
        //     return $result;
        // }


        public function show_donhangPhanTrang()
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
                    

                    if ($timTheo == "Mã đơn hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE maDonHang LIKE '%$wordSearch%' ORDER BY maDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    }
                    if ($timTheo == "Mã khách hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE maKhachHang LIKE '%$wordSearch%' ORDER BY maDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang";
                    }
                    if ($timTheo == "Trạng thái"){
                        $query = "SELECT * FROM tbl_donhang WHERE trangThaiDH LIKE '%$wordSearch%' ORDER BY maDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang  ";
                    }
                    if ($timTheo == "Ngày lập đơn hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE ngayLapDH LIKE '%$wordSearch%' ORDER BY maDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    }
                    if ($timTheo == "Mã giao hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE maGiaoHang LIKE '%$wordSearch%' ORDER BY maDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    }
                    
                }
                
            }else{
                    $query = "SELECT * FROM tbl_donhang ORDER BY maDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
            }

            if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) ){
                if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) ){
                    $ngaytruoc = $_GET['ngaytruoc'];
                    $ngaysau = $_GET['ngaysau'];

                    $query = "SELECT * FROM tbl_donhang WHERE ngayLapDH BETWEEN '$ngaytruoc' AND '$ngaysau' ORDER BY maDonHang DESC ";
                }
            }

            
            //$query = "SELECT * FROM tbl_donhang ";
            $result = $this->db->select($query);
            return $result;
        }

        public function DoiTrangThaiDH($id)
        {

            $queryHoanThanhHD = "UPDATE tbl_donhang SET trangThaiDH = 'Đã hoàn thành' WHERE maDonHang = '$id' ";

            $querySelect = "SELECT * FROM tbl_donhang WHERE maDonHang = '$id' ";
            $resultSelect = $this->db->select($querySelect);
            $value = $resultSelect->fetch_assoc();
            $maKH = $value['maKhachHang'];
            $ngaydat = date("Y/m/d");
            $giatri = $value['tongTienDH'];


            //Lấy mã hóa đơn mới start
              $queryMHD = "SELECT MAX(maHoaDon) FROM tbl_hoadon ";
              $resultMHD =  $this->db->select($queryMHD);
              $fetchMHD = $resultMHD->fetch_assoc();

              if ($fetchMHD['MAX(maHoaDon)'] != NULL ){
                $dataMHDNew = $fetchMHD['MAX(maHoaDon)'] + 1;
              }else{
                $dataMHDNew = 1;
              }
              
            //Lấy mã hóa đơn mới end

            //Thêm vào hóa đơn start
            $queryThemHD = "INSERT INTO tbl_hoadon(maHoaDon, maKhachHang, ngayDat, giaTriHD) VALUE('$dataMHDNew', '$maKH', '$ngaydat', '$giatri') ";
            $resultThemHD = $this->db->insert($queryThemHD);
            //Thêm vào hóa đơn end

            //Thêm chi tiết hóa đơn start
            $queryDH = "SELECT * FROM tbl_chitietdonhang WHERE maDonHang = '$id' ";
            $resultdataGH = $this->db->select($queryDH);

            while ($dataGH = $resultdataGH->fetch_assoc()){
                $tenNN = $dataGH['tenNguoiNhan'];
                $SDTKH = $dataGH['sdtKH'];
                $diachiNN = $dataGH['diachi'];
                $ghiChu = $dataGH['ghiChuCuaKhachhang'];

                $maSP = $dataGH['maSanPham']; 
                $tenSP = $dataGH['tenSanPham'];
                $SLSP = $dataGH['soLuongSP'];
                $sizeSP = $dataGH['sizeSanPham'];
                $giaSP = $dataGH['giaSanPham'];
                $mieutaSP = $dataGH['mieuTaSP'];
                $hinhanhSP = $dataGH['hinhAnhSP'];


                $querychitietdonhang="INSERT INTO `web2`.`tbl_chitiethoadon` (`maHoaDon` ,`tenNguoiNhan`, `sdtKH`,`ghiChu`, `maSP`, `tenSP`, `soLuongSP`, `sizeSP`, `giaSP`, `mieuTaSP`, `hinhAnhSP`, `diachi`)
                  VALUES('$dataMHDNew','$tenNN','$SDTKH','$ghiChu','$maSP', '$tenSP','$SLSP','$sizeSP','$giaSP','$mieutaSP', '$hinhanhSP', '$diachiNN') ";
                $themCTHD = $this->db->insert($querychitietdonhang);

            }
            //Thêm chi tiết hóa đơn end

            // Nếu người dùng Active thì Update status inactive và ngược lại
            if ($value['trangThaiDH'] == 'Chưa giao')
            {
                
                $resultUpdate = $this->db->update($queryHoanThanhHD);

                if ($resultUpdate)
                {
                    $alert = "<div class= 'alert alert-success'>Thanh toán thành công!</div>";
                    return $alert;
                }
                else
                {
                    $alert = "<div class= 'alert alert-danger'>Thanh toán không thành công!</div>";
                    return $alert;
                }
            }
           
        }

        public function getAllDonHang() //Dùng cho phân trang,...
        {

            if (isset($_GET['wordSearch']) && !empty($_GET['wordSearch']) ){
                if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) ){
                    $wordSearch = $_GET['wordSearch'];
                    $timTheo = $_GET['timTheo'];

                    if ($timTheo == "Mã đơn hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE maDonHang LIKE '%$wordSearch%' ORDER BY maDonHang DESC ";
                    }
                    if ($timTheo == "Mã khách hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE maKhachHang LIKE '%$wordSearch%' ORDER BY maDonHang DESC ";
                    }
                    if ($timTheo == "Trạng thái"){
                        $query = "SELECT * FROM tbl_donhang WHERE trangThaiDH LIKE '%$wordSearch%' ORDER BY maDonHang DESC ";
                    }
                    if ($timTheo == "Ngày lập đơn hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE ngayLapDH LIKE '%$wordSearch%' ORDER BY maDonHang DESC ";
                    }
                    if ($timTheo == "Mã giao hàng"){
                        $query = "SELECT * FROM tbl_donhang WHERE maGiaoHang LIKE '%$wordSearch%' ORDER BY maDonHang DESC ";
                    }
                    
                }
                
            }else{
                    $query = "SELECT * FROM tbl_donhang ORDER BY maDonHang DESC "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
            }

            $result = $this->db->select($query);
            return $result;
        }

        
        public function count_donhangchuagiao()
        {
            $query = "SELECT COUNT(maDonHang) AS soluongDHchuagiao FROM tbl_donhang WHERE trangThaiDH = 'Chưa giao' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function count_donhangdagiao()
        {
            $query = "SELECT COUNT(maDonHang) AS soluongDHdagiao FROM tbl_donhang WHERE trangThaiDH = 'Đã hoàn thành' ";
            $result = $this->db->select($query);
            return $result;
        }

        
        
    }

?>