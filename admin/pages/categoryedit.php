<?php include 'header.php';?>
<?php include_once '../classes/category.php';?>
<?php
    $cat = new category();
    if (!isset($_GET['catid']) || $_GET['catid'] == ''){
        echo "<script>window.location = 'category.php'</script>";
    }else{
        $id = $_GET['catid'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
        $tenLoai = $_POST['tenLoai'];       

        $editCategory = $cat->edit_category($tenLoai, $id);
    }
?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Danh mục sản phẩm</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span style="text-transform: uppercase;">Danh mục sản phẩm</span>
                        </div>
                        <div class="panel-body">
                            <?php
                                    if (isset($editCategory)){
                                        echo $editCategory;
                                    }
                            ?>             
                            <?php 
                                    $get_cat_name = $cat->getcatbyId($id);
                                    if ($get_cat_name){
                                        while ($result = $get_cat_name->fetch_assoc()) { //Dòng php này dùng để show catName ở dưới
                                            
                                        
                            ?>
                           <form action="" method="POST"> 
                                <p style="text-transform: uppercase;font-weight: bold;">Sửa danh mục sản phẩm</p>
                               
                                <input type="text" value="<?php echo $result['tenLoai'] ?>" name="tenLoai" placeholder="Nhập tên danh mục..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" autofocus>
                                <input type="submit" name="submit" value="Cập nhật" class="btn btn-default" > 
                            </form>
                            <?php 
                                }
                            }
                            ?>
                                <!-- List danh mục-->
                                  
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
