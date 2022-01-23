<?php include 'header.php';?>
<?php include_once '../classes/category.php';?>

<?php
    $cat = new category();
    //Xóa danh mục
    if (!isset($_GET['deleteid']) || $_GET['deleteid'] == ''){
        echo "<script>'window.location = 'category.php'</script>";
    }else{

        $id = $_GET['deleteid'];
        $deleteCategory = $cat->delete_category($id);
    }   
    
    //Thêm danh mục
    if ($_SERVER['REQUEST_METHOD'] === 'POST' ){

        $tenLoai = $_POST['tenLoai'];
        $insertCategory = $cat->insert_category($tenLoai);
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
                           <form action="category.php" method="POST"> 
                                <p style="text-transform: uppercase;font-weight: bold;">Thêm danh mục sản phẩm</p>
                                <?php
                                    if (isset($insertCategory)){
                                        echo $insertCategory;
                                    }
                                ?>
                                <?php
                                    if (isset($deleteCategory)){
                                        echo $deleteCategory;
                                    }
                                ?>
                                <input type="text" name="tenLoai" placeholder="Nhập tên danh mục..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" >
                                <input type="submit" name="submit" id="addbtn" value="Thêm" class="btn btn-success" > 
                            </form>
                                <!-- List danh mục-->
                                    <div class="table-responsive" style="margin-top: 2%">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên danh mục</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $show_cat = $cat->show_category();
                                                    if ($show_cat){
                                                        $i=0;
                                                        while ($result = $show_cat->fetch_assoc()){
                                                            $i++;
                                                            
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                                                                   
                                                    <td><?php echo $result['tenLoai']; ?></td>  
                                                    
                                                    

                                                    <td>
                                                       
                                                        <a href="categoryedit.php?catid=<?php echo $result['maLoai'] ?>" onclick="return popitup('categoryedit.php?catid=<?php echo $result['maLoai'] ?>')"><button type="button" class="btn btn-info" >Sửa</button></a>
                                                        <a href="?deleteid=<?php echo $result['maLoai'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')"><button type="button" class="btn btn-danger" >Xóa</button></a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    }
                                                } 
                                                ?>
                                            </tbody>
                                        </table>
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
                newwindow=window.open(url,'name','height=500,width=700');
                if (window.focus) {
                    newwindow.focus()
                    }
                return false;
            }

        </script>


    </body>
</html>
