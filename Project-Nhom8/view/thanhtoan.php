<?php 
ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
<style>
  form{
    display: flex;
    /* align-items: center;
    justify-content: center; */
    margin: 0px 150px;
    margin-bottom: 50px;
  }
  h1{
        font-weight: 500;
        margin: 30px;
        font-size: 30px;
        margin-left: 100px;
    }
  .checkout{
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .checkout input{
    border: 1px solid #c4c2c2;
        border-radius: 3px;
        height: 35px;
        margin: 10px;
  }
  textarea{
    border: 1px solid #c4c2c2;
        border-radius: 3px;
        
        margin: 10px;
  }
  label{
    margin: 10px 0px;
    font-size: 20px;
  }
  .thongke{
    flex: 1;
    margin-left: 30px;
    margin-top: 10px;
  }
  .thongke button{
    margin-top: 20px;
    border: none;
    width: 200px;
    height: 40px;
    background-color: red;
    color: aliceblue;
    margin-left: 200px;
  }
  .thongke button:hover{
cursor: pointer;
  }
  table tr th,td{
    border: 2px solid #b2b2b2;
    text-align: center;
}
table{
    border-collapse: collapse;
    width: 600px;
    
}
</style>

</head>
<body>
<?php 
include "./header.php";
ob_start();

?>


<?php
$db= mysqli_connect("localhost","root","","the_coffee");

if(isset($_SESSION['id_user'])){
  $id_user=$_SESSION['id_user'];
  
}
?>


<h1>Thông tin đơn hàng</h1>
<div class="thanhtoan">
    
    <form action="" method="post">

    <div class="checkout">
        <input name="fullname" required type="text" placeholder="Nhập họ tên">
        <input name="email" required type="email" placeholder="Nhập email">
        <input name="phone" required type="text" placeholder="Nhập số điện thoại">
        <input name="address" type="text" placeholder="Nhập địa chỉ">
        <label for="">Nội dung <span style="color: red;">*</span></label>
        <textarea required name="note" id="" cols="30" rows="10"></textarea>
        
    
    </div>
    <div class="thongke">


    <?php

$db= mysqli_connect("localhost","root","","the_coffee");
$sql= "SELECT tbl_order_details.*, tbl_product.product_name
        FROM tbl_order_details INNER JOIN tbl_product ON tbl_order_details.product_id= tbl_product.product_id";
$result = $db->query($sql);



?>
    <table>
                <tr>
                    <th>STT</th>
                    <th>SẢN PHẨM</th>                  
                    <th>GIÁ</th>                  
                    <th>SỐ LƯỢNG</th>
                    <th>TỔNG</th>
                </tr>
                <?php
if($result->num_rows>0){
    $i=0;
    $sum =0;
    $tien = 0;
    while($row=$result->fetch_assoc()){


      $i++;
      $tien = $row['num']*$row['price'];
      $sum+=$tien;

?>
                <tr>
                    <td> <?php echo $i   ?></td>
                    <td> <?php echo $row['product_name'] ?> </td>
                    <td><?php echo $row['price'] ?></td>                  
                    <td><?php echo $row['num'] ?> </td>
                    <td><?php echo $tien ?> vnđ </td>
                </tr>    
                <?php
}
}
?>                          
                <tr>
                    <th>TỔNG</th>
                    <th colspan="4"><?php echo $sum ?> vnđ</th>
                    <!-- <td></td>
                    <td></td>                  
                    <td></td> -->
                </tr>
                           
            </table>
     <a href="./thanks.php"> 
        <button type="submit" name="pay">THANH TOÁN</button>
    </a>
    </div>
    </form>

    

</div>



<?php 
date_default_timezone_set("Asia/Ho_Chi_Minh");
if(isset($_POST['pay'])){  

  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $note=$_POST['note'];
  $order_date = date('Y-m-d H:i:s');
  $sql= "INSERT INTO tbl_order(id_user,fullname,email,phone,address,note,total_money,order_date) Value('$id_user','$fullname','$email','$phone','$address','$note','$sum','$order_date') ";
  $result = $db->query($sql);

  $sql=("SELECT * FROM tbl_order WHERE order_date='$order_date' ");
  $result = $db->query($sql);
  $row = mysqli_fetch_assoc($result);
  $idDonHang = $row['id_order'];


  // b2 sao chép toàn bộ sản phẩm trong giỏ hàng qua đơn hàng chi tiết
  $_SESSION['donhangchitiet'] = array();

  echo $id_user;
  $query = ("SELECT * FROM tbl_order_details WHERE id_user = '$id_user'");
  $result = mysqli_query($db,$query);

      while($row = mysqli_fetch_assoc($result)){

          $idsp = $row['product_id'];

          // $tenSanPham = $row['product_name'];
          $soLuong = $row['num'];
          $gia = $row['price'];

          $donhangchitiet = array("$idsp","$soLuong","$gia");
          array_push($_SESSION['donhangchitiet'],$donhangchitiet);
      }

      // kiểm tra mảng có dữ liệu chưa
      // print_r($_SESSION['donhangchitiet']);

      for ($i=0; $i <count($_SESSION['donhangchitiet']) ; $i++) { 
          $idsp = $_SESSION['donhangchitiet'][$i][0];
          $soLuong = $_SESSION['donhangchitiet'][$i][1];
          $gia = $_SESSION['donhangchitiet'][$i][2];
          $tien = $soLuong*$gia;
        

         $sql= "INSERT INTO tbl_oder_view(id_user,id_order,product_id,num,price) VALUE('$id_user','$idDonHang','$idsp','$soLuong','$tien') ";
         $resultt =mysqli_query($db,$sql);
      }

      


  $query = ("DELETE FROM tbl_order_details");
  $resultt =mysqli_query($db,$query);

  header("location:../view/thanks.php");
}


include "./footer.php";
ob_end_flush();

?>
</body>
</html>

