<?php include_once 'config.php'; 
// $diachi=mysqli_query($conn,"SELECT *FROM `web2`.`tbl_diachi`");
// $resultDiaChi=mysqli_fetch_array($diachi);
if(isset($_POST['id']))
{
    $address=$_POST['id'];
    $result="";
    $diachi=mysqli_query($conn,"SELECT * FROM `donvihanhchinh`.`devvn_quanhuyen` WHERE (`matp`='$address')");
    
    if(mysqli_num_rows($diachi)>0)
    {       
        while($rows=mysqli_fetch_array($diachi))
        {
            $result.='<option value="'.$rows['maqh'].'" >'. $rows['name'].'</option>';                      
        }
    }
    echo $result;
}

if(isset($_POST['mahuyen']))
{
    $xa=$_POST['mahuyen'];
    $value="";
    $diachixa=mysqli_query($conn,"SELECT * FROM `donvihanhchinh`.`devvn_xaphuongthitran` WHERE (`maqh`='$xa')");
    
    if(mysqli_num_rows($diachixa)>0)
    {
        while($row_xa=mysqli_fetch_array($diachixa))
        {
            $value.='<option>'. $row_xa['name'].'</option>';
        }
    }
    echo $value;
}

mysqli_close($conn);

?>