<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
<style>
  
</style>

</head>
<body>
<?php 
include "./header.php";
?>

<?php
if(isset($_SESSION['id_user'])){
    $id_user=$_SESSION['id_user'];
    
 }
$db= mysqli_connect("localhost","root","","the_coffee");
$sql= "SELECT tbl_order_details.*, tbl_product.product_name,tbl_product.product_img
        FROM tbl_order_details INNER JOIN tbl_product ON tbl_order_details.product_id= tbl_product.product_id WHERE id_user = '$id_user' ";
       
$result = $db->query($sql);

?>




<div class="giohang">
<h1>Giỏ hàng</h1>
<div class="cart">

<table>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>                  
                    <th style="width:120px;">Số lượng</th>
                    <th style="width:120px;"></th>
                </tr>


                <?php
                $sum =0;
if($result->num_rows>0){
    $i=0;
    
    $tien = 0;
    while($row=$result->fetch_assoc()){
       $i++;
       $price = $row['price']*$row['num'];

?>

                <tr>
                    <td> <?php echo $i   ?></td>
                    <td><img src="<?php echo $row['product_img'] ?>" alt=""></td>
                    <td> <?php echo $row['product_name'] ?> </td>
                    <td><?php echo $row['price'] ?></td>                  
                    <td>                       
                    <div class="soluong1">
                        <!-- <button class="giam" onclick="handleMinus()">-</button> -->
                        <input name="num" id="num" type="number" min="1" value="<?php echo $row['num'] ?>">
                        <!-- <button class="tang" onclick="handlePlus()">+</button> -->
                    </div>
                    </td>
                    <td><button type="submit"><a href="./deletecart.php?id=<?php echo $row['id'] ?> ">Xóa</a></button></td>
                </tr>

                
                <?php
}
}
?>             
                <!-- <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>                  
                    <th>TỔNG</th>
                    <th></th>
                    <th></th>
                </tr> -->
                
            </table>

            </div>
            <a href="./thanhtoan.php"><button>THANH TOÁN</button></a>
            </div>
<?php 
include "./footer.php";
?>
</body>


<style>
    h1{
        font-weight: 500;
        margin: 30px;
        font-size: 30px;
        margin-left: 100px;
    }
    .cart{
        /* margin: 30px 150px; */
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

    }
    .soluong1 >input{
        width: 40px;
        height: 30px;
        text-align: center;
        /* border-top: 3px solid #b2b2b2;
        border-bottom: 3px solid #b2b2b2;
        border-left: none;
        border-right: none;
        margin-top: -2px; */
    }
    .soluong1 > button{
        /* background-color: #b2b2b2; */
        width: 40px;
        border: #b2b2b2 solid 1px;
        

        }
        .soluong1 > button:hover{
            background-color: #b2b2b2;
        }
    .soluong1{
        display: flex;
        margin: 5px 20px;
       
    }
    td img{
        width: 100px;
        height: 100px;
    }
    .giohang >a button{
        border: 1px solid #b2b2b2;
        width: 150px;
        height: 30px;
        background-color: red;
        margin-left: 150px;
        color: aliceblue;
    }
     button:hover{
        cursor: pointer;
    }
    table{
    width: 80%;
    text-align: center;
    margin-top: 20px;
    margin: 30px 150px;

    
}
table td >button{
    background-color: red;
    color: aliceblue;
    width: 70px;
    height: 30px;
    border: none;
    margin: 10px;
}
table tr th,td{
    border: 3px solid #b2b2b2;
}
table{
    border-collapse: collapse;
}

  </style>
  <script>
    let amout=document.getElementById('num');
    
    let count=amout.value
    // console.log(cout);

let render=(count) =>{
amout.value=count
}

    // xử lí tang
    let handlePlus =()=>{
        count++
        render(count);
    }
    let handleMinus =()=>{
        if(count>1){
            count--
        render(count);
        }
        
    }
    amout.addEventListener('input',()=> {
        
        count=amout.value;
        count=parseInt(count);
        count= (isNaN(count)||count<=0)?1:count;
        render(count);
    });

    




  </script>
</html>