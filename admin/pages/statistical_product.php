<?php
    include 'header.php';
    include '../../config.php';
?>


            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thống kê theo sản phẩm</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="" method="get" style="margin-bottom: 15px;">
                                        <span>Sắp xếp: </span>
                                       <select class="inputAddProduct" name="timTheo" style="width: 35%;" required>
                                           
                                            <option value="Số lượng sản phẩm đã bán" <?php if (isset($_GET['timTheo']) && $_GET['timTheo'] == 'Số lượng sản phẩm đã bán') echo "selected"; ?> >Số lượng sản phẩm đã bán</option>
                                            
                                            
                                            
                                        </select>

                                         <select class="inputAddProduct" name="sortby" style="width: 20%;" required>
                                           
                                            <option value="Tăng dần" <?php if (isset($_GET['sortby']) && $_GET['sortby'] == 'Tăng dần') echo "selected"; ?> >Tăng dần</option>
                                            <option value="Giảm dần" <?php if (isset($_GET['sortby']) && $_GET['sortby'] == 'Giảm dần') echo "selected"; ?> >Giảm dần</option>
                                           
                                            
                                        </select>

                                        <input type="submit" name="action" value="Tìm kiếm" class="btn btn-default" >

                                        <a href="statistical_months.php"><input type="button" name="action" value="Hiện tất cả" class="btn btn-default" ></a>
                            </form>

                            <!-- <div class="panel panel-default"> -->
                                <!-- <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê theo tháng
                                </div> -->
                                <!-- /.panel-heading
                                <div class="panel-body">
                                    <div id="morris-area-chart"></div>
                                </div> -->
                                <!-- /.panel-body -->
                           <!--  </div> -->
                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê theo sản phẩm
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Số lượng sản phẩm đã bán</th>
                                                        <th>Số lượng còn lại</th>
                                                        <th>Ảnh</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) && isset($_GET['sortby']) && !empty($_GET['sortby']) ){
                                                            $timTheo = $_GET['timTheo'];
                                                            $sortby = $_GET['sortby'];

                                                            if ($timTheo == 'Số lượng sản phẩm đã bán'){
                                                                if ($sortby == 'Tăng dần'){
                                                                    $queryDT = mysqli_query($conn, "SELECT * FROM tbl_sanpham, tbl_chitiethoadon WHERE tbl_sanpham.maSanPham = tbl_chitiethoadon.maSP GROUP BY tbl_chitiethoadon.maSP ORDER BY tbl_chitiethoadon.soLuongSP ASC ");
                                                                }else if ($sortby == 'Giảm dần'){
                                                                    $queryDT = mysqli_query($conn, "SELECT * FROM tbl_sanpham, tbl_chitiethoadon WHERE tbl_sanpham.maSanPham = tbl_chitiethoadon.maSP GROUP BY tbl_chitiethoadon.maSP ORDER BY tbl_chitiethoadon.soLuongSP DESC ");
                                                                }
 
                                                            }

                                                            // if ($timTheo == 'Số lượng còn lại'){
                                                            //     if ($sortby == 'Tăng dần'){
                                                            //         $queryDT = mysqli_query($conn, "SELECT * FROM tbl_sanpham, tbl_chitiethoadon WHERE tbl_sanpham.maSanPham = tbl_chitiethoadon.maSP GROUP BY tbl_chitiethoadon.maSP ORDER BY tbl_sanpham.soLuongSanPham DESC ");
                                                            //     }else if ($sortby == 'Giảm dần'){
                                                            //         $queryDT = mysqli_query($conn, "SELECT * FROM tbl_sanpham, tbl_chitiethoadon WHERE tbl_sanpham.maSanPham = tbl_chitiethoadon.maSP GROUP BY tbl_chitiethoadon.maSP ORDER BY tbl_sanpham.soLuongSanPham ASC ");
                                                            //     }
 
                                                            // }


                                                            
                                                        }else{
                                                            $queryDT = mysqli_query($conn, "SELECT * FROM tbl_sanpham, tbl_chitiethoadon WHERE tbl_sanpham.maSanPham = tbl_chitiethoadon.maSP GROUP BY tbl_chitiethoadon.maSP");
                                                        }

                                                        $i = 0;

                                                        if ($queryDT){
                                                            while ($dataDoanhThu = mysqli_fetch_array($queryDT) ){
                                                            $i++;

                                                        

                                                    ?>
                                                    <tr>
                                                        <?php 
                                                            // $thang = $dataDoanhThu['MONTH(ngayDat)'];
                                                            // $nam = $dataDoanhThu['YEAR(ngayDat)'];
                                                        ?>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $dataDoanhThu['tenSanPham'];  ?></td>
                                                        <td><?php echo $dataDoanhThu['soLuongSP']; ?> </td>
                                                        <td><?php echo $dataDoanhThu['soLuongSanPham']; ?></td>
                                                        <td><img src="uploads/<?php echo $dataDoanhThu['hinhAnhSanPham']; ?>" width='90'></td>
                                                    </tr>
                                                    <?php 
                                                        }
                                                        }else{
                                                            echo "Không tìm thấy dữ liệu!";
                                                        }
                                                    ?>
                                                   
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-8">

                                            <div id="morris-bar-chart"></div>
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            
                            <!-- /.panel -->
                            <div class="panel panel-default">
                              
                                <div class="panel-body">
                                    <div id="morris-donut-chart"></div>
                                    <!-- <a href="#" class="btn btn-default btn-block">Xem chi tiết</a> -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            
                                <!-- /.panel-heading -->
                                
                            <!-- /.panel .chat-panel -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

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

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <!-- <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script> -->

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>