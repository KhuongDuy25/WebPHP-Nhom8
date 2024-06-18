<?php
session_start();
 if(!isset($_SESSION['id_user'])){    
    header("Location:../login/dangnhap.php");
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
    <style>
/* #header{
    background-image: none;
    height: 100px;
}
.header{
    background-color: cornsilk;
} */
.header-right .soluong{
            border-radius: 50%;
            border: 1px solid #000;
            background-color: red;
            width: 20px;
            height: 20px;
            color: aliceblue;
            margin-top: -10px;
            margin-left: -8px;       
            text-align: center;         
        }
        .header-right{
            display: flex;
        }
        .header-right > .giohang{
            display: flex;
        }
        html{
            scroll-behavior: smooth;
        }
        .header-content{
  margin-left: 100px;
   display: flex;
   flex-direction: column; 
   margin-top: -350px;
   margin-bottom: 350px;
}
.header-content h1{
    margin-left: 50px;
    margin-bottom: 30px;
}
.search{
    position: absolute;
    /* border: 1px solid #000; */
    padding-bottom: 2px;
    padding-left: 15px;
    padding-right: 10px;
    padding-top: 10px;
    margin-left: -50px;
    display: none;
    border-radius: 30px;
    /* background-color: #dadada; */
    /* background-color: aliceblue; */
    backdrop-filter: blur(50px);
}
.search button{
    background: none;
    border: none;
    font-size: 20px;
}
.search form{
    display: flex;
}
.input-field {
  
  width: 100%;
  height: 100%;
  background: none;
  border: none;
  outline: none;
  border-bottom: 1px solid #bbb;
  padding: 0;
  font-size: 0.95rem;
  color: #151111;
  transition: 0.4s;
}
.header-right >.ti-search:hover .search{
    display: block;
}

/* user */
.ti-user{
    position: relative;
}
.profile{
    position: absolute;
    /* border: 1px solid #000; */
    display: none;
    padding: 10px;
    width: 130px;
}
.header-right > .ti-user:hover .profile{
    display: block;
}
.profile li{
    margin: 5px;
}
.profile li a:hover{
    background: -webkit-linear-gradient(120deg,hsl(318,94%,61%),hsl(239,69%,51%));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}


    </style>
</head>

<?php 
 $db= mysqli_connect("localhost","root","","the_coffee");
 if(isset($_SESSION['id_user'])){
    $id_user=$_SESSION['id_user'];
 }
$sql=" SELECT price FROM tbl_order_details WHERE id_user = '$id_user' ";
$result_se_hang=mysqli_query($db,$sql);
$count=mysqli_num_rows($result_se_hang);
?>

<body>
    <div id="header">
        <div class="header">
        <div class="logo">

           <div class="letter lt">C</div>
           <div class="letter">O</div>
           <div class="letter">F</div>
           <div class="letter">F</div>
           <div class="letter">E</div>
           <div class="letter">E</div>
           
           <div class="letter lt">H</div>
           <div class="letter">O</div>
           <div class="letter">U</div>
           <div class="letter">S</div>
           <div class="letter">E</div>
            

        </div>
        <div class="header-mid">
            <ul class="dm1">
                <li><a href="#">TRANG CHỦ</a></li>
                <li><a href="./product.php">SẢN PHẨM</a>
                  <ul class="dm2">
                    <div class="dm">

                    <!-- đổ danh mục -->
<?php
        $sql= "SELECT *FROM tbl_category";
        $rs= mysqli_query($db,$sql);
        if($rs->num_rows>0){
            $i=0;
            while($row=$rs->fetch_assoc()){
            $i++;
            $category_name= $row['category_name'];
            $category_id= $row['category_id'];

?>
                    <li><a href="./cafe.php?category_name=<?php echo $category_name ?>"><?php echo $category_name ?></a></li>

            <?php
            }}
            ?>
                    
                </div>
                  </ul>
                </li>
                <li><a href="./tintuc.php">TIN TỨC</a></li>
                <li><a href="./gioithieu.php">GIỚI THIỆU</a></li>
                <li><a href="./lienhe.php">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div class="header-right">
        <i class="ti-user">
                <ul class="profile">
                    <li><a href="./condition.php">Đơn hàng</a></li>
                    <li><a href="../login/dangnhap.php">Đăng xuất</a></li>
                </ul>
            </i>


            <i class="ti-search">
            <div class="search">
                    <form action="./search.php" method="post" >
                        <input type="text" name="search"
                    placeholder="Nhập tên sản phẩm"
                    class="input-field"
                   
                    required>
                        <button name="tim" type="submit"><i class="ti-search"></i></button>
                    </form>
                </div>



            </i>
        <a class="giohang" href="./cart.php">
            <i class="ti-shopping-cart"></i>
            <div class="soluong"><?php echo $count ?></div> 
        </a>
            
        </div>
    </div>
</div>
    <div class="header-content">
        <h1>COFFEE HOUSE</h1>
        <i>Hương cà phê, tình yêu ngọt ngào trên môi - Bên tách cà phê, ký ức hòa quyện giữa đêm vàng.</i>
    </div>
    </div>
    <div id="main">
        <div class="main-gioithieu">
        <div class="main-content">
            <h1>COFFEE HOUSE</h1>
            <p>"Đi cafe từ lâu đơn thuần không chỉ là đi cafe và còn là dịp gặp mặt và trò chuyện cùng bạn bè.
                 Tại COFFEE HOUSE, chúng tôi trân trọng và đề cao giá trị kết nối giữa con người và trải nghiệm của khách hàng.
                 Chúng tôi được truyền cảm hứng từ những tách cafe và thức uống mình tạo ra.
                 Chúng tôi tin tưởng mạnh mẽ rằng thức uống với chất lượng tốt nhất được phục vụ trong không gian thân thiện"</p>

        </div>
        <div class="main-img">
            <img src="../css/img/menu-cafe-dang-gap-6.jpg" alt="">

        </div>
    </div>
    

    </div>
    <div id="footer">
        <div class="lienhe">
            <ul class="lh1">
                <li><a href="">THÔNG TIN HỖ TRỢ</a>
                    <ul class="lh2">
                        <li><a href="">Tìm hiểu về mua trả góp</a></li>
                        <li><a href="">Tìm trung tâm bảo hành hãng</a></li>
                        <li><a href="">Hướng dẫn mua hàng online</a></li>
                        <li><a href="">Giao hàng & thanh toán</a></li>
                    </ul>
                
                </li>
                <li><a href="">DỊCH VỤ KHÁCH HÀNG</a>
                    <ul class="lh2">
                        <li><a href="">Giới thiệu về công ty</a></li>
                        <li><a href="">Tuyển dụng</a></li>
                        <li><a href="">Gửi góp ý & khiếu nại</a></li>
                        <li><a href="">Tìm siêu thị</a></li>
                        <li><a href="">Liên hệ</a></li>
                    </ul>
                
                </li>
                <li><a href="">DỊCH VỤ & HỖ TRỢ</a>
                    <ul class="lh2">
                        <li><a href="">Chính sách giao hàng</a></li>
                        <li><a href="">Chính sách đổi sản phẩm</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách trả góp</a></li>
                        <li><a href="">Chính sách đổi trả</a></li>
                    </ul>
                
                </li>
                <li><a href="">BẢN TIN</a>
                  <p>Đăng kí thành viên để nhận bản tin mỗi ngày</p>
                  <div class="mail">
                    <input type="text" placeholder="Nhập email của bạn">
                    <Button>Gửi</Button>
                  </div>
                </li>
            </ul>

        </div>
        <div class="diachi">
            <div class="diachi-left">
                <div class="logo">

                    <div class="letter lt">C</div>
                    <div class="letter">O</div>
                    <div class="letter">F</div>
                    <div class="letter">F</div>
                    <div class="letter">E</div>
                    <div class="letter">E</div>
                    
                    <div class="letter lt">H</div>
                    <div class="letter">O</div>
                    <div class="letter">U</div>
                    <div class="letter">S</div>
                    <div class="letter">E</div>
                     
         
                 </div>

            </div>
            <div class="diachi-mid">
                <div class="mid-comtent">
                    <i class="ti-location-pin"></i>
                    <p>Địa chỉ: Yên nghĩa, Hà Đông, Hà Nội</p>


                </div>
                <div class="mid-comtent">
                    <i class="ti-headphone-alt"></i>
                    <p>Điện thoại : 099999999</p>

                </div>
                <div class="mid-comtent">
                    <i class="ti-email"></i>
                    <p>Email: coffehouse123@gmail.com</p>

                </div>

            </div>
            <div class="diachi-right">
                <div class="icon"><a href=""><i class="ti-facebook"></i></a></div>
                <div class="icon"><a href=""><i class="ti-instagram"></i></a></div>
                <div class="icon"><a href=""><i class="ti-youtube"></i></a></div>
                <div class="icon"><a href=""><i class="ti-google"></i></a></div>
                <div class="icon"><a href=""><i class="ti-twitter"></i></a></div>

            </div>

        </div>

    </div>
</body>
</html>