
<?php
session_start();
 if(!isset($_SESSION['id_user'])){    
    header("Location:../../login/dangnhap.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ admin</title>
    <link rel="stylesheet" href="../../css/css/styleadmin.css">
    <link rel="stylesheet" href="../../css/img/cafe-latte.jpg">
    <link rel="stylesheet" href="../../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../css/icon/fontawesome-free-6.4.0-web/css/all.css">
</head>
<style>
    li a{
        color: #000;
    }
    .quanly{
        background-color: #e0dede;
    }
</style>
<body>
  
    <div class="header">
        <a href="../index.php"><h1>ADMIN</h1></a>
        
        <a class="go" href="../../view/index.php">
            <i class="ti-back-right"></i>
            Đến trang chủ
            </a>
    </div>
    <div  class="content">
    <div style="height: 635px;" class="sidebar">
        <div class="logo">          
                <img src="../../css/img/user.jpg" alt="">
                <p>Admin</p>
                <i class="ti-angle-down">             
                <a class="out" href="../../login/dangnhap.php">
                <i class="fa-solid fa-right-to-bracket"></i>    
                Đăng xuất</a>
                
                </i>

        </div>
        <div class="quanly">
            <ul class="cha">
                <li>Quản lý tài khoản
                    <ul class="con">
                        <li><a href="../slide/accountadd.php">Thêm tài khoản</a></li>
                        <li><a href="../slide/accountlist.php">Danh sách tài khoản</a></li>
                    </ul>
                    
                </li>
                <li>Quản lý danh mục sản phẩm
                <ul class="con">
                        <li><a href="../slide/categoryadd.php">Thêm danh mục sản phẩm</a></li>
                        <li><a href="../slide/categorylist.php">Danh sách danh mục sản phẩm</a></li>
                    </ul>
                </li>
                <li>Quản lý sản phẩm
                <ul class="con">
                        <li><a href="../slide/productadd.php">Thêm sản phẩm</a></li>
                        <li><a href="../slide/productlist.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li>Quản lý tin tức
                <ul class="con">
                        <li><a href="../slide/tintucadd.php">Thêm tin tức</a></li>
                        <li><a href="../slide/tintuclist.php">Danh sách tin tức</a></li>
                    </ul>
                </li>
                <li>Quản lý đơn hàng
                <ul class="con">
                        <li><a href="./orderlist.php">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                <li>Quản lý phản hồi
                <ul class="con">
                        <li><a href="./feedbacklist.php">Danh sách phản hồi</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        
    </div>