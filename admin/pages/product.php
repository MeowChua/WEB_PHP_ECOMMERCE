<?php  include 'header.php'; ?>
<?php  include_once '../classes/product.php' ?>
<?php  include_once '../helpers/format.php' ?>
<?php
    $fm = new Format();
    $prod = new product();
    //Ẩn product
    if (!isset($_GET['hideid']) || $_GET['hideid'] == ''){
        echo "<script>'window.location = 'product.php'</script>";
    }else{

        $id = $_GET['hideid'];
        $hideProduct = $prod->hide_product($id);
    } 

    //Tìm cơ bản theo tên
    
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Sản phẩm</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="textHeading">DANH SÁCH SẢN PHẨM</span>
                        </div>
                        


                        <div class="panel-body">   
                            <form action="" method="get">
                               <input type="text" name="nameSearch" placeholder="Nhập tên sản phẩm..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" value="<?php if (isset($_GET['nameSearch'])  && !empty($_GET['nameSearch']) ) echo $_GET['nameSearch'];?>" autofocus>
                                <input type="submit" name="search" value="Tìm kiếm" class="btn btn-default" >

                                <a href="product.php"><input type="button" name="search" value="Hiện tất cả" class="btn btn-default" ></a>

                                <a href="productadd.php"><button type="button" class="btn btn-success" style="float: right;">
                            </form>

                            Thêm sản phẩm</button></a>
                            <p></p>
                            <?php
                                    if (isset($hideProduct)){
                                        echo $hideProduct;
                                    }
                            ?>
                                    <div class="table-responsive" style="margin-top: 2%">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Tên danh mục</th>
                                                    <th>Size</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Miêu tả sản phẩm</th>
                                                    <th>Trạng thái</th>
                                                    <th>Ảnh sản phẩm</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    $prodList = $prod->show_product(); //Có search cơ bản
                                                    if ($prodList){
                                                        //$i = 0;
                                                        while ($result = $prodList->fetch_assoc()){
                                                           if ($result['trangThaiSanPham'] == 1){
                                                                //$i++;           

                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $result['maSanPham']; ?></td>
                                                    <td><?php echo $result['tenSanPham']; ?></td>
                                                    <td><?php echo $result['tenLoai']; ?></td>
                                                    <td class="center"><?php echo $result['sizeSanPham']; ?></td>
                                                    <td><?php echo $result['soLuongSanPham']; ?></td>
                                                    <td class="center"><?php echo number_format($result['giaSanPham']); ?></td>

                                                    <td>
                                                        <?php
                                                            echo $textSh = $fm->textShorten($result['mieuTaSanPham'], 30); //Giới hạn kí tự để hiển thị
                                                        ?>    
                                                    </td>
                                                    <td class="center">
                                                    <?php 
                                                        if ($result['trangThaiSanPham'] == 1) {
                                                            echo '<button type="button" class="btn btn-outline btn-success">Còn hàng</button>';
                                                        }; 
                                                    ?>    
                                                    </td>
                                                    <td><img src="uploads/<?php echo $result['hinhAnhSanPham']; ?>" width='80'> </td>
                                                    <td>
                                                        <a href="productedit.php?productid=<?php echo $result['maSanPham'] ?>" onclick="return popitup('productedit.php?productid=<?php echo $result['maSanPham'] ?>')"><button type="button" class="btn btn-info">Sửa</button></a>
                                                        <a href="?hideid=<?php echo $result['maSanPham'] ?>" onclick="return confirm('Bạn có chắc muốn ẩn sản phẩm này không?')"><button type="button" class="btn btn-warning " >Ẩn</button></a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                        }
                                                    }

                                                }else echo '<script>alert("Không tìm thấy dữ liệu!");history.back();</script>';
                                                ?>

                                                
                                            </tbody>
                                            
                                        </table>
                                        <div class="phanTrang">
                                            <?php 
                                                    $productAll = $prod->getAllProduct(); //Lấy số sản phẩm 
                                                    $productCount = mysqli_num_rows($productAll); //Đếm số dòng
                                                    $productButton = ceil($productCount/5); //Số button sẽ hiển thị, 10 sản phẩm thì chia 10
                                                    //$i = 1;

                                                    if (!isset($_GET['trang'])){
                                                        $trangHienTai = 1;
                                                    }else{
                                                        $trangHienTai = $_GET['trang'];
                                                    }


                                                    if (isset($_GET['nameSearch'])  && !empty($_GET['nameSearch']) ){

                                                         $nameSearch = $_GET['nameSearch'];

                                                        //Button Prev
                                                        if ($trangHienTai > 1 && $productButton > 1){
                                                            echo '<a href="?nameSearch='.$nameSearch.'&search=Tìm+kiếm&trang='.($trangHienTai - 1).' " ><i class="fa fa-angle-double-left"></i> Trang trước</a>';
                                                        }

                                                        //Create Button between start
                                                        for ($i = 1; $i <= $productButton; $i++ ){
                                                            if ($i == $trangHienTai ){
                                                                echo '<a href="?nameSearch='.$nameSearch.'&search=Tìm+kiếm&trang='.$i.' " style="background-color: grey;">' .$i. '</a>';   //echo và Active màu trang hiện tại
                                                            }else{
                                                                echo '<a href="?nameSearch='.$nameSearch.'&search=Tìm+kiếm&trang='.$i.' ">' .$i. '</a>';
                                                            }
                                                            
                                                        }
                                                        //Create Button between end

                                                        //Button Next
                                                        if ($trangHienTai < $productButton && $productButton > 1){
                                                            echo '<a href="?nameSearch='.$nameSearch.'&search=Tìm+kiếm&trang='.($trangHienTai + 1).' ">Trang sau <i class="fa fa-angle-double-right"></i></a>';
                                                        }

                                                    }else{
                                                        //Button Prev
                                                        if ($trangHienTai > 1 && $productButton > 1){
                                                            echo '<a href="?trang='.($trangHienTai - 1).' "><i class="fa fa-angle-double-left"></i> Trang trước</a>';
                                                        }

                                                        //Create Button between start
                                                        for ($i = 1; $i <= $productButton; $i++ ){
                                                            if ($i == $trangHienTai ){
                                                                echo '<a href="?trang='.$i.' " style="background-color: grey;">' .$i. '</a>';   //echo và Active màu trang hiện tại
                                                            }else{
                                                                echo '<a href="?trang='.$i.' ">' .$i. '</a>';
                                                            }
                                                            
                                                        }
                                                        //Create Button between end

                                                        //Button Next
                                                        if ($trangHienTai < $productButton && $productButton > 1){
                                                            echo '<a href="?trang='.($trangHienTai + 1).' ">Trang sau <i class="fa fa-angle-double-right"></i></a>';
                                                        }
                                                    }

                                                ?>
                                        </div>
                                    </div>
                                    <!-- /.table-responsive -->
                        </div>
                    </div>
                    <!-- /.row -->
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

        
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

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
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
        <script language="javascript" type="text/javascript"> 

            function popitup(url) { //Popup cửa sổ
                newwindow=window.open(url,'name','height=580,width=700');
                if (window.focus) {
                    newwindow.focus()
                    }
                return false;
            }

        </script>
    </body>
</html>
