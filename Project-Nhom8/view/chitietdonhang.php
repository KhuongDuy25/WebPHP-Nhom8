<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
<style>
   h1{
    margin: 30px 120px;
   }
   .condition-main{
        display: flex;
        margin: 0px 120px;
        align-items: center;
        justify-content: center;
   }
   table{
    width: 100%;
    text-align: center;
    margin-top: 20px;
    
}
table tr th,td{
    border: 1px solid #000;
    text-align: center;
}
table{
    border-collapse: collapse;
}
   .condition-left{
        width: 1300px;        
   } 
</style>

</head>
<body>
    <?php 
    include "./header.php";
    if(isset($_SESSION['id_user'])){
        $id_user=$_SESSION['id_user'];
        
     }
    $db= mysqli_connect("localhost","root","","the_coffee");
    if(isset($_GET['id_order'])){
        $id_order = $_GET['id_order'];
    
    $sql= "SELECT tbl_oder_view.*, tbl_product.product_name
        FROM tbl_oder_view INNER JOIN tbl_product ON tbl_oder_view.product_id= tbl_product.product_id WHERE id_user = '$id_user' AND id_order='$id_order'";
    $result = $db->query($sql);
    }


    ?>
    <h1>Đơn hàng của bạn</h1>
    <div class="condition-main">
        <div class="condition-left">
        <table>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>                    
                    <th>Số lượng</th>              
                    <th>Tổng tiền</th>
                </tr>
<?php
    if($result->num_rows>0){
        $i=0;
        while($row=$result->fetch_assoc()){
        $i++;
    
?>

                <tr>                  
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['product_name'] ?> </td>                   
                    <td><?php echo $row['num'] ?> </td>
                    <td><?php echo $row['price'] ?></td>                   
                </tr>
                <?php
}
}
?>                  
            </table>
        </div>
    </div>  
    <?php 
    include "./footer.php";
    ?>
</body>
</html>