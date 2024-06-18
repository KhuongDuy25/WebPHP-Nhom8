



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
    <style>
        h1{
            margin-left: 50px;
            margin-top: -10px;
            color: dimgrey;
            font-weight: 200;
            font-size: 30px;
            margin-bottom: 30px;
        }
        a{
            color: #000;
            font-weight: bold;
            
        }
        .main-product > p{
            color: #000;
            margin-bottom: 10px;
        }
        .main{
            margin-left: 130px;
            margin-right: 130px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* flex-wrap: wrap-reverse; */
            /* width: 100%; */
            flex-wrap: wrap;
        }
        .main-product{
            /* border: 1px solid #000; */
            height: 300px;
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            
        }
        .main-product img{
            height: 200px;
            width: 200px;
        }
        .main-product button{
            width: 100px;
            height: 30px;
           margin-top: 10px;
        }
        button:hover{
            color: #fff;
            background-color: mediumaquamarine;
            cursor: pointer;
            border: 1px solid ;
            border-color: darkgray;
        }

    </style>
</head>
<body>
    

<?php 
include "./header.php";
$db= mysqli_connect("localhost","root","","the_coffee");
$sql="SELECT * FROM tbl_product  ";
$result = $db->query($sql);



?>



<h1>Trang Chủ/ Sản Phẩm</h1>

<div class="main">

    <?php
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $product_id=$row['product_id'];
                    // echo "./addcart?product_id = $product_id ";

        ?>
        <form action="./addcart.php?product_id=<?php echo $product_id ?>" method="post">

            <div class="main-product">
                <img src="<?php echo $row['product_img'] ?>" alt="">
                <p><?php echo $row['product_name'] ?></p>
            <a style="display: flex; " href=""><p style="color:red; margin-top: 0px; margin-right:5px"><?php echo $row['product_price'] ?></p> vnđ</a>
            <button type="submit" id="" name="submit">Chọn mua</button>
            </div>
            </form>
        <?php
        }
        }
    ?>





</div>



<?php 
include "./footer.php";
?>
</body>
</html>