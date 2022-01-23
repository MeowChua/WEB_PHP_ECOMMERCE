<?php
    include 'header.php';
    include '../../config.php';
?>


            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thống kê doanh thu</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="" method="get" style="margin-bottom: 15px;">
                                       <input type="text" name="ngaytruoc" placeholder="Từ tháng.." id="datepicker1" value="<?php if (isset($_GET['ngaytruoc'])) echo $_GET['ngaytruoc'] ?>" style="width: 18%;height: 34px;padding: 6px 12px;font-size: 14px;">
                                       <span> tới </span>
                                       <input type="text" name="ngaysau" placeholder="Tới tháng.." id="datepicker2" value="<?php if (isset($_GET['ngaysau'])) echo $_GET['ngaysau'] ?>" style="width: 18%;height: 34px;padding: 6px 12px;font-size: 14px;">

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
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê theo tháng
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
                                                        <th>Tháng/Năm</th>
                                                        <th>Số lượng hóa đơn</th>
                                                        <th>Doanh thu</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) && isset($_GET['ngaysau']) && !empty($_GET['ngaysau']) ){
                                                            $ngaytruoc = $_GET['ngaytruoc'];
                                                            $ngaysau = $_GET['ngaysau'];

                                                            $queryDT = mysqli_query($conn, "SELECT *, MONTH(ngayDat), YEAR(ngayDat), COUNT(maHoaDon), SUM(giaTriHD) FROM tbl_hoadon WHERE MONTH(ngayDat) BETWEEN MONTH('$ngaytruoc') AND MONTH('$ngaysau') AND YEAR(ngayDat) BETWEEN YEAR('$ngaytruoc') AND YEAR('$ngaysau') GROUP BY MONTH(ngayDat)");


                                                            
                                                        }else{
                                                            $queryDT = mysqli_query($conn, "SELECT *, MONTH(ngayDat), YEAR(ngayDat), COUNT(maHoaDon), SUM(giaTriHD) FROM `tbl_hoadon` GROUP BY MONTH(ngayDat)");
                                                        }

                                                        $i = 0;

                                                        if ($queryDT){
                                                            while ($dataDoanhThu = mysqli_fetch_array($queryDT) ){
                                                            $i++;

                                                        

                                                    ?>
                                                    <tr>
                                                        <?php 
                                                            $thang = $dataDoanhThu['MONTH(ngayDat)'];
                                                            $nam = $dataDoanhThu['YEAR(ngayDat)'];
                                                        ?>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $thang.'/'.$nam; ?></td>
                                                        <td><?php echo $dataDoanhThu['COUNT(maHoaDon)']; ?> </td>
                                                        <td><?php echo number_format($dataDoanhThu['SUM(giaTriHD)']); ?> VNĐ</td>
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