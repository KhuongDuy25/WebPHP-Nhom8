<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
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
td a{
    font-weight: bold;
}
td button{
    margin: 10px;
    width: 100px;
    height: 30px;
    border-radius: 5px;
    border: 1px solid #000;
}
td button:hover{
    color: red;
    cursor: pointer;
}
td a:hover{
 color: red;
}
table{
    border-collapse: collapse;
}
   .condition-left{
        width: 1300px;        
   } 
</style>
<!-- delivery_time -->
</head>
<body>
    <?php 
    include "./header.php";
    if(isset($_SESSION['id_user'])){
        $id_user=$_SESSION['id_user'];
        
     }
    $db= mysqli_connect("localhost","root","","the_coffee");
    $sql= "SELECT * FROM tbl_order WHERE id_user='$id_user'";
    $result = $db->query($sql);


    ?>



<?php
?>
    <h1>Đơn hàng của bạn</h1>
    <div class="condition-main">
        <div class="condition-left">
            <form action="" method="post">
        <table>
                <tr>
                    <th>STT</th>
                    <th>Fullname</th>                   
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>                   
                    <th>Tổng tiền</th>
                    <th>Thời gian đặt hàng</th>
                    <th></th>
                    <th></th>
                </tr>
<?php
    if($result->num_rows>0){
        $i=0;
        while($row=$result->fetch_assoc()){
            $id_order=$row['id_order'];
        $i++;
    
?>

                <tr>                  
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['fullname'] ?> </td>
                    <td><?php echo $row['phone'] ?> </td>
                    <td><?php echo $row['address'] ?></td>                   
                    <td><?php echo $row['total_money'] ?></td>
                    <td><?php echo $row['order_date']?></td>
                    <td><a href="./chitietdonhang.php?id_order=<?php echo $row['id_order'] ?>">Chi tiết đơn hàng </a></td>
                    <td><a href="./xacnhandonhang.php?id_order=<?php echo $row['id_order'] ?>"><?php echo $row['trangthai']?></a></td>
                </tr>
                <?php
}
}
?>                  
            </table>
            </form>

        </div>
    </div>  
    <?php 
    include "./footer.php";
    ?>
</body>
</html>