<?php
include "./slidebar.php";
$db= mysqli_connect("localhost","root","","the_coffee");
$sql= "SELECT * FROM tbl_order";
$result = $db->query($sql);
?>



<div class="main">
<h1>Danh sách đơn hàng</h1>
<table>
                <tr>
                    <th>STT</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Nội dung</th>
                    <th>Tổng tiền</th>
                    <th>Thời gian đặt hàng</th>
                    <
                    <th>Trạng thái</th>
                    <th>Thời gian nhận hàng</th>
                </tr>
                <?php
                if($result->num_rows>0){
    $i=0;
    // $sum =0;
    // $tien = 0;
    while($row=$result->fetch_assoc()){


      $i++;
    //   $tien = $row['num']*$row['price'];
    //   $sum+=$tien;

?>


                <tr>
                <td><?php echo $i ?></td>
                    <td><?php echo $row['fullname'] ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                    <td><?php echo $row['phone'] ?> </td>
                    <td><?php echo $row['address'] ?></td>                   
                    <td><?php echo $row['note'] ?></td>
                    <td><?php echo $row['total_money'] ?></td>
                    <td><?php echo $row['order_date']?></td>
                    <td><?php echo $row['trangthai']?></td>
                    <td><?php echo $row['delivery_time']?></td>
                    
                </tr>
                <?php
}
}
?>                   
               
            </table>



    </div>
    </div>
</body>



<!-- js css -->
<script>
    const dangxuat=document.querySelector(".ti-angle-down")
if(dangxuat){
    dangxuat.addEventListener("click",function(){
        document.querySelector(".out").style.display="block"      
    })

}

  </script>
  <style>
    h1{
        font-weight: 500;
        margin: 30px;
        font-size: 30px;
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
td img{
    height: 150px;
}

  </style>
</html>