<?php
    include 'header.php';
?>
<?php  include_once '../classes/donhang.php' ?>
<?php 
    $donhang = new donhang();

    if (!isset($_GET['statusid']) || $_GET['statusid'] == ''){
        echo "<script>'window.location = 'orders.php'</script>";
    }else{

        $id = $_GET['statusid'];
        $doiTrangThaiDH = $donhang->DoiTrangThaiDH($id);
    } 

?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" >Đơn hàng</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    QUẢN LÝ ĐƠN HÀNG
                                </div>

                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <form action="" method="get" style="margin-bottom: 15px;">

                                       <input type="text" name="wordSearch" placeholder="Tìm kiếm..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" value="<?php if (isset($_GET['wordSearch'])  && !empty($_GET['wordSearch']) ) echo $_GET['wordSearch'];?>" autofocus>

                                        <input type="submit" name="action" value="Tìm kiếm" class="btn btn-default" >

                                       <select class="inputAddProduct" name="timTheo" style="width: 20%;" required>
                                           
                                            <option value="Mã đơn hàng">Mã đơn hàng</option>
                                            <option value="Mã khách hàng">Mã khách hàng</option>
                                            <option value="Trạng thái">Trạng thái</option>
                                            <option value="Ngày lập đơn hàng">Ngày lập đơn hàng</option>
                                            
                                        </select>

                                        <a href="orders.php"><input type="button" name="search" value="Hiện tất cả" class="btn btn-default" ></a>
 
                                    </form>
                                    <form action="" method="get" style="margin-bottom: 15px;">
                                       <input type="text" name="ngaytruoc" placeholder="Từ ngày.." id="datepicker1" value="<?php if (isset($_GET['ngaytruoc'])) echo $_GET['ngaytruoc'] ?>" style="width: 18%;height: 34px;padding: 6px 12px;font-size: 14px;">
                                       <span> tới </span>
                                       <input type="text" name="ngaysau" placeholder="Tới ngày.." id="datepicker2" value="<?php if (isset($_GET['ngaysau'])) echo $_GET['ngaysau'] ?>" style="width: 18%;height: 34px;padding: 6px 12px;font-size: 14px;">

                                        <input type="submit" name="action" value="Lọc" class="btn btn-default" >
 
                                    </form>
                                    <?php
                                    if (isset($doiTrangThaiDH)){
                                        echo $doiTrangThaiDH;
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Mã đơn hàng</th>
                                                    <th>Mã khách hàng</th>
                                                    <th>Ngày lập đơn hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Trạng thái</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    $donhanglist = $donhang->show_donhangPhanTrang();
                                                    if ($donhanglist){
                                                       // $i = 0;
                                                        while ($resultDH = $donhanglist->fetch_assoc()){
                                                               // $i++;    
                                                            
                                                ?>
                                                <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $resultDH['maDonHang']; ?></td>
                                                    <td><?php echo $resultDH['maKhachHang']; ?></td>
                                                    <td><?php echo $resultDH['ngayLapDH']; ?></td>
                                                    <td><?php echo number_format($resultDH['tongTienDH']); ?> VND</td>
                                                    <td>
                                                        <?php 
                                                            if ($resultDH['trangThaiDH'] == "Chưa giao"){
                                                                echo "<button type='button' class='btn btn-outline btn-warning'>Chưa giao</button>";
                                                            }else if ($resultDH['trangThaiDH'] == "Đã hoàn thành"){
                                                                echo "<button type='button' class='btn btn-outline btn-success'>Đã hoàn thành</button>";
                                                            }
                                                        ?>
                                                    </td>
                                                   
                                                    <td>
                                                        <a href="chitietdonhang.php?maDonHang=<?php echo $resultDH['maDonHang'] ?>"  onclick="return popitup('chitietdonhang.php?maDonHang=<?php echo $resultDH['maDonHang'] ?>') "><button type="button" class="btn btn-info" id="btnShow" >Xem chi tiết</button>
                                                            </a>
                                                        
                                                        <?php 
                                                            $maDH = $resultDH['maDonHang'];
                                                            if ($resultDH['trangThaiDH'] == "Chưa giao"){
                                                                echo "<a href='?statusid=$maDH'><button type='button' class='btn btn-success'>Thanh toán</button></a>";
                                                            }
                                                        ?>
                                                        

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
                                                    $donhangAll = $donhang->getAllDonHang(); //Lấy số sản phẩm
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

                                                    }


                                                    else  {
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
