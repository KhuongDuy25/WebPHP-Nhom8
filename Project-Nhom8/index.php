<?php

if( !isset($_SESSION['login'])){    
   header("Localhost:./index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./css/css/stylehome.css">
    <link rel="icon" href="./css/img/logo (2).jpg">
    <link rel="stylesheet" href="./css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./css/icon/fontawesome-free-6.4.0-web/css/all.css">
    <style>
        html{
            scroll-behavior: smooth;
        }
        .text{
            padding-top: 10px;
    position: relative;
    width: 100%;
    text-align: center;
    filter: url(#fire);
}
    </style>
</head>
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
                <li><a href="./index.php">TRANG CHỦ</a></li>
                <li><a href="">SẢN PHẨM</a>
                  <ul class="dm2">
                    <div class="dm">
                    <li><a href="">Cafe</a></li>
                    <li><a href="">Trà sữa</a></li>
                    <li><a href="">Đồ uống khác</a></li>
                </div>
                  </ul>
                </li>
                <li><a href="">TIN TỨC</a></li>
                <li><a href="#main">GIỚI THIỆU</a></li>
                <li><a href="#footer">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div class="header-right">
            <a href=""><i class="ti-search"></i></a>
            <a class="giohang" href=""><i class="ti-shopping-cart"></i>
            <!-- <div class="soluong">0</div>        -->
            </a>
            <a href="./login/dangnhap.php"><i class="ti-user"></i></a>
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
            <img src="./css/img/menu-cafe-dang-gap-6.jpg" alt="">

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
                    <p>Điện thoại : 0999999999</p>

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