<?php  
    include 'header.php';
?>
<?php  include_once '../classes/hoadon.php' ?>
<?php 
    $hoadon = new hoadon();

?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Hóa đơn</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    QUẢN LÝ HÓA ĐƠN
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                     <form action="" method="get" style="margin-bottom: 15px;">

                                       <input type="text" name="wordSearch" placeholder="Tìm kiếm..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" value="<?php if (isset($_GET['wordSearch'])  && !empty($_GET['wordSearch']) ) echo $_GET['wordSearch'];?>" autofocus>

                                        <input type="submit" name="action" value="Tìm kiếm" class="btn btn-default" >

                                       <select class="inputAddProduct" name="timTheo" style="width: 20%;" required>
                                           
                                            <option value="Mã hóa đơn">Mã hóa đơn</option>
                                            <option value="Mã khách hàng">Mã khách hàng</option>
                                            <option value="Ngày lập hóa đơn">Ngày lập hóa đơn</option>
                                            
                                            
                                        </select>

                                        <a href="hoadonlist.php"><input type="button" name="search" value="Hiện tất cả" class="btn btn-default" ></a>
 
                                    </form>
                                    <form action="" method="get" style="margin-bottom: 15px;">
                                       <input type="text" name="ngaytruoc" placeholder="Từ ngày.." id="datepicker1" value="<?php if (isset($_GET['ngaytruoc'])) echo $_GET['ngaytruoc'] ?>" style="width: 18%;height: 34px;padding: 6px 12px;font-size: 14px;">
                                       <span> tới </span>
                                       <input type="text" name="ngaysau" placeholder="Tới ngày.." id="datepicker2" value="<?php if (isset($_GET['ngaysau'])) echo $_GET['ngaysau'] ?>" style="width: 18%;height: 34px;padding: 6px 12px;font-size: 14px;">

                                        <input type="submit" name="action" value="Lọc" class="btn btn-default" >
 
                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Mã hóa đơn</th>
                                                    <th>Mã khách hàng</th>
                                                    <th>Ngày lập hóa đơn</th>
                                                    <th>Giá trị hóa đơn</th>
                                                                                                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    $hoadonlist = $hoadon->show_hoadonPhanTrang();
                                                    if ($hoadonlist){
                                                        $i = 0;
                                                        while ($resultHD = $hoadonlist->fetch_assoc()){
                                                                $i++;    
                                                            
                                                ?>
                                                <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $resultHD['maHoaDon']; ?></td>
                                                    <td><?php echo $resultHD['maKhachHang']; ?></td>
                                                    <td><?php echo $resultHD['ngayDat']; ?></td>
                                                    <td><?php echo number_format($resultHD['giaTriHD']); ?> VND</td>
                                                    
                                                    <td>
                                                        <a href="chitiethoadon.php?maHoaDon=<?php echo $resultHD['maHoaDon'] ?>"  onclick="return popitup('chitiethoadon.php?maHoaDon=<?php echo $resultHD['maHoaDon'] ?>') "><button type="button" class="btn btn-info" id="btnShow" >Xem chi tiết</button>
                                                            </a>

                                                        <button type="button" class="btn btn-warning disabled">In hóa đơn</button>
                                                        
                                                    </td>
                                                </tr>

                                                <?php 
                                                    }
                                                }
                                                ?>
                                                
                                                
                                            </tbody>
                                        </table>
                                        <div class="phanTrang">
                                            <?php 
                                                    $donhangAll = $hoadon->getAllHoaDon(); //Lấy số sản phẩm
                                                    if (mysqli_num_rows($donhangAll) == 0){
                                                        echo "<script>alert('Không tìm thấy dữ liệu!'); history.back();</script>";
                                                    }else{
                                                        $donhangCount = mysqli_num_rows($donhangAll); //Đếm số dòng
                                                    }
                                                    
                                                    $donhangButton = ceil($donhangCount/10); //Số button sẽ hiển thị, 10 sản phẩm thì chia 10
                                                    //$i = 1;

                                                    if (!isset($_GET['trang'])){
                                                        $trangHienTai = 1;
                                                    }else{
                                                        $trangHienTai = $_GET['trang'];
                                                    }



                                                    if (isset($_GET['wordSearch'])  && !empty($_GET['wordSearch']) ){

                                                         $wordSearch = $_GET['wordSearch'];
                                                         $timTheo = $_GET['timTheo'];

                                                        //Button Prev
                                                        if ($trangHienTai > 1 && $donhangButton > 1){
                                                            echo '<a href="?wordSearch='.$wordSearch.'&search=Tìm+kiếm&timTheo='.$timTheo.'$trang='.($trangHienTai - 1).' " ><i class="fa fa-angle-double-left"></i> Trang trước</a>';
                                                        }

                                                        //Create Button between start
                                                        for ($i = 1; $i <= $donhangButton; $i++ ){
                                                            if ($i == $trangHienTai ){
                                                                echo '<a href="?wordSearch='.$wordSearch.'&search=Tìm+kiếm&timTheo='.$timTheo.'&trang='.$i.' " style="background-color: grey;">' .$i. '</a>';   //echo và Active màu trang hiện tại
                                                            }else{
                                                                echo '<a href="?wordSearch='.$wordSearch.'&search=Tìm+kiếm&timTheo='.$timTheo.'&trang='.$i.' ">' .$i. '</a>';
                                                            }
                                                            
                                                        }
                                                        //Create Button between end

                                                        //Button Next
                                                        if ($trangHienTai < $donhangButton && $donhangButton > 1){
                                                            echo '<a href="?wordSearch='.$wordSearch.'&search=Tìm+kiếm&timTheo='.$timTheo.'&trang='.($trangHienTai + 1).' ">Trang sau <i class="fa fa-angle-double-right"></i></a>';
                                                        }

                                                    }else{
                                                        //Button Prev
                                                        if ($trangHienTai > 1 && $donhangButton > 1){
                                                            echo '<a href="?trang='.($trangHienTai - 1).' "><i class="fa fa-angle-double-left"></i> Trang trước</a>';
                                                        }

                                                        //Create Button between start
                                                        for ($i = 1; $i <= $donhangButton; $i++ ){
                                                            if ($i == $trangHienTai ){
                                                                echo '<a href="?trang='.$i.' " style="background-color: grey;">' .$i. '</a>';   //echo và Active màu trang hiện tại
                                                            }else{
                                                                echo '<a href="?trang='.$i.' ">' .$i. '</a>';
                                                            }
                                                            
                                                        }
                                                        //Create Button between end

                                                        //Button Next
                                                        if ($trangHienTai < $donhangButton && $donhangButton > 1){
                                                            echo '<a href="?trang='.($trangHienTai + 1).' ">Trang sau <i class="fa fa-angle-double-right"></i></a>';
                                                        }
                                                    }

                                                ?>
                                        </div>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                   
                        <!-- /.col-lg-6 -->
                        
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <style type="text/css">
            .phanTrang a{
                text-decoration: none;
                cursor: pointer;
                color: black;
                float: left;
                padding: 5px 15px;
                border: 1px solid #999499;
                margin: 0px 2px 5px;
            }

            .phanTrang a:hover{
                background-color: grey;
                transition: 500ms;
            }
        </style>
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <script language="javascript" type="text/javascript"> 

            function popitup(url) { //Popup cửa sổ
                newwindow=window.open(url,'name','height=580,width=700');
                if (window.focus) {
                    newwindow.focus()
                    }
                return false;
            }

        </script>
        

       <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
       <script type="text/javascript" src="../js/jquery-min.js"></script>

       <script type="text/javascript">
            $("#datepicker1").datepicker({dateFormat: 'yy-mm-dd'});    
            $("#datepicker2").datepicker({dateFormat: 'yy-mm-dd'}); 

        </script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>