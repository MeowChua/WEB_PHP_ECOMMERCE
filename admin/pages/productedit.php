<?php include 'header.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include_once '../classes/product.php'; ?>
<?php 
    $prod = new product();
    if (!isset($_GET['productid']) || $_GET['productid'] == ''){
        echo "<script>window.location = 'product.php'</script>";
    }else{
        $id = $_GET['productid'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $editProduct = $prod->edit_product($_POST, $_FILES, $id);
    }

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
                            <span class="textHeading">Thêm sản phẩm</span>
                        </div>
                        <div class="panel-body">
                        <?php
                                    if (isset($editProduct)){
                                        echo $editProduct;
                                    }
                        ?>   
                        <?php 
                            $get_product_by_id = $prod->getproductbyId($id);
                            if ($get_product_by_id){
                                while ($result_prod = $get_product_by_id->fetch_assoc()) {
                              
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data" name="formUser" onsubmit="return validationForm();"> <!--enctype để có thể thêm hình ảnh -->
                                <table style="width: 100%;">
                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Tên sản phẩm: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="tenSanPham" value="<?php echo $result_prod['tenSanPham'] ?>" class="inputAddProduct" autofocus required>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Danh mục sản phẩm: </label>
                                    </td>
                                    <td>
                                        <select class="inputAddProduct" name="maLoai" required>
                                            <option value="0">----Chọn danh mục----</option>
                                            <?php 
                                                $cat = new category();
                                                $catlist = $cat->show_category();
                                                if ($catlist){
                                                    while ($result = $catlist->fetch_assoc()) {
 
                                            ?>
                                            <option 
                                            <?php 
                                                if ($result['maLoai'] == $result_prod['maLoai'] ){ echo 'selected'; }
                                            ?>

                                            value="<?php echo $result['maLoai']; ?>"><?php echo $result['tenLoai']; ?>
                                                
                                            </option>
                                            <?php 
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td class="tabLabel" >
                                        <label class="labelAddProduct">Size: </label>
                                    </td>
                                    <td>
                                        <select class="inputAddProduct" name="sizeSanPham" required>
                                            <option value="0">----Chọn size----</option>
                                            <?php 
                                                $i= 36;
                                                while ($i < 46){
                                                    $i++;

                                            ?>
                                            <option
                                            <?php 
                                                if ($result_prod['sizeSanPham'] == $i){ echo 'selected'; }
                                            ?>
                                                value="<?php echo $i ?>"><?php echo $i ?>
                                                    
                                            </option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Số lượng: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="soLuongSanPham" value="<?php echo $result_prod['soLuongSanPham'] ?>" class="inputAddProduct" required>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Miêu tả sản phẩm: </label>
                                    </td>
                                    <td>
                                        <textarea name="mieuTaSanPham" rows="2" cols="25" class="inputAddProduct" style="height: 80px;" required><?php echo $result_prod['mieuTaSanPham'] ?></textarea>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Giá: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="giaSanPham" value="<?php echo $result_prod['giaSanPham'] ?>" class="inputAddProduct" required>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Hình ảnh sản phẩm: </label>
                                    </td>
                                    <td>
                                        <img src="uploads/<?php echo $result_prod['hinhAnhSanPham'] ?>" width="110">
                                        <input name="image" type="file" accept="image/*" onchange="loadFile(event)" >
                                        <img id="output" style="width: 20%;" />
                                    </td>
                                </tr>
                                
                                 </table>
                                 <input type="submit" name="submit" value="Cập nhật sản phẩm" class="btn btn-success" style="margin: 10px;">
                            </form>  
                            <?php 
                                }
                            }
                            ?>
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
        <link rel="stylesheet" type="text/css" href="../css/style.css">
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
        <script type="text/javascript">
            function validationForm(){

                var maLoai=document.formUser.maLoai.value; 
                var sizeSanPham=document.formUser.sizeSanPham.value;  
                

                if ( maLoai == '0'){
                    alert("Chưa chọn danh mục sản phẩm!");
                    return false;
                }else if ( sizeSanPham == '0'){
                        alert("Chưa chọn size sản phẩm!");
                        return false;
                    }else{
                        return true;
                    }
                
            }      

        </script>


        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                  URL.revokeObjectURL(output.src) // free memory
                    }
            };
        </script>

    </body>
</html>
