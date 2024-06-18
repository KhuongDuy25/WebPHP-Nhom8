<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
<style>
    .thanks{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .thanks p{
        color: #000;
        margin: 20px;
    }
  .thanks img{
    width: 200px;

  }
  .thanks button{
    border: none;
    height: 40px;
    width: 200px;
    background-color: red;
    color: aliceblue;
    margin: 10px;
  }
  .thanks button:hover{
    cursor: pointer;
  }
</style>

</head>
<body>
<?php 
include "./header.php";
?>

<div class="thanks">
    <img src="../css/img/camon.png" alt="">
    <p>CẢM ƠN QUÝ KHÁCH ! ĐƠN HÀNG SẼ ĐƯỢC NHÂN VIÊN KIỂM TRA VÀ GIAO HÀNG TRONG THỜI GIAN SỚM NHẤT.</p>
    <a href="../view/index.php"><button>TIẾP TỤC MUA HÀNG</button></a>
</div>

<?php 
include "./footer.php";
?>
</body>
</html>