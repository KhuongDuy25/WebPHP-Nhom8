<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mainstyle.css">
    <link rel="stylesheet" href=<?=$this->e($cssLink)?>>
    <title><?=$this->e($title)?></title>
    <style>
    .disclaimer{display: none;}
    </style>
</head>

<body>

    <div class="pagesay <?php if($this->e($pagemess)) echo 'pagesay-show' ?>">
        <div class="pagesay-text"><?php if($this->e($pagemess)) echo $pagemess ?></div>
    </div>

    <header>
        <div class="logo">
            <a href="/"><img src="/imgs/logo.png" height="70" width="115" alt="logo"></a>
        </div>
        <ul class="header-list">
            <li id="home"><a href="/">Trang chủ</a><div class="line"></div></li>
            <li id="gioithieu"><a href="/gioithieu">Giới thiệu</a><div class="line"></div></li>
            <li id="sanpham"><a href="/sanpham?type=caphe&page=1">Sản phẩm</a><div class="line"></div></li>
            <li id="lienhe"><a href="/lienhe">Liên hệ</a><div class="line"></div></li>
        </ul>
        <div class="cart">
            <a class="cart-btn" href="#"><img src="/imgs/icons/cart2.png" width="60" height="50" alt="cart"></a>
            <div class="notice" style="display: none;">0</div>
            <div class="minicart">
                <img class="nocart-img" src="/imgs/nocart.png" alt="nocart">
                <div class="cart-list">

                </div>
                <a class="maincart-href" href="/giohang">
                    <div class="maincart-btn">Xem giỏ hàng</div>
                </a>
            </div>
        </div>
        <div class="user-option">
            <span class="title <?php if(isset($_SESSION['user'])) echo"mark"; ?>">
                <?php
                    if(isset($_SESSION['user'])) echo $_SESSION['user']['username'];
                    else echo "Đăng nhập";
                 ?>
            </span>
            <div class="submenu">
                <ul>
                    <li><a href="/dangnhap">Đăng nhập</a></li>
                    <?php 
                        if(empty($_SESSION['user'])) echo '<li><a href="/dangky">Đăng ký</a></li>';
                        else echo '<li><a href="/lichsudathang">Lịch sử đặt hàng</a></li>';
                    ?>
                    <li><a href="#">Cập nhật thông tin</a></li>
                    <hr style="margin: 4px 0;">
                    <li><a href="/dangxuat">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </header>

    <?=$this->section('content')?>

    <footer>
        <div class="footer-bg">
            <img class="footerimg1" src="/imgs/footerimg1.png" alt="bg1">
            <img class="footerimg2" src="/imgs/footerimg2.png" alt="bg2">
        </div>

        <div class="footer-content">
            <div class="footer-navigation">
                <div class="info">
                    <div>
                        <a href="#"><img src="/imgs/logo.png" height="52" width="85" alt="logo"></a>
                        <span style="margin-left: -8px;"><b>Den Coffee</b></span>
                    </div>
                    <span style="margin-left: 16px; margin-top: 8px; max-width: 200px;">P.Nguyễn Trác ,Yên nghĩa, Hà Đông, Hà Nội</span>
                </div>
                <ul class="footer-lists">
                    <li>
                        <ul>
                            <li><a href="/sanpham?type=caphe&page=1"><b>Cà phê</b></a></li>
                            <li><a href="">Cà phê sữa đá</a></li>
                            <li><a href="">Cà phê trứng</a></li>
                            <li><a href="">Espesso</a></li>
                            <li><a href="">Capuchino</a></li>
                            <li><a href="">Latte</a></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><a href="/sanpham?type=banhngot&page=1"><b>Bánh ngọt</b></a></li>
                            <li><a href="">Chocolate tart</a></li>
                            <li><a href="">Cheesecake</a></li>
                            <li><a href="">Tiramusu</a></li>
                            <li><a href="">Bánh Flan</a></li>
                            <li><a href="">Bánh Cookies</a></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><a href="/sanpham?type=douongkhac&page=1"><b>Thức uống khác</b></a></li>
                            <li><a href="">Sinh tố bơ</a></li>
                            <li><a href="">Sinh tố dâu</a></li>
                            <li><a href="">Sinh tố xoài</a></li>
                            <li><a href="">Kem dừa</a></li>
                            <li><a href="">Kem dâu</a></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><a href="/gioithieu"><b>Về chúng tôi</b></a></li>
                            <li><a href="/lienhe"><b>Liên hệ</b></a></li>
                            <ul class="footer-icons">
                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="coppyright">&copy; 2024 Nhóm 8 Web Nâng cao <a href="mailto:thanhtienly372001@gmail.com">(Nhom8webnangcao@gmail.com)</a></div>
        </div>      
    </footer>

    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/574a825c20.js" crossorigin="anonymous"></script>
    <script src="/js/jshelper.js"></script>
    <script>
        var cartHandle = () => {
                var cartBtn = $('header .cart .cart-btn')
                var miniCart = $('header .cart .minicart')

                $('.cart').click((e) => {
                    e.stopPropagation();
                    miniCart.fadeIn()
                })

                $(window).click(() => {
                    miniCart.fadeOut()
                });

                $('.cart-list-item .deleting').each((i, e) => {
                    $(e).click((evt) => {
                        cartDeleting(evt)
                    })
                })
            }

            var cartDeleting = (evt) => {
                var pid = $(evt.currentTarget)[0].nextElementSibling.innerHTML
                var cartList = JSON.parse(window.localStorage.getItem('cart'))
                cartList.forEach((evt, i) => {
                    if (evt.id == pid)
                        cartList.splice(i, 1)
                })

                window.localStorage.setItem('cart', JSON.stringify(cartList))

                $(evt.currentTarget).parent().remove()
                oderCarListHandle()
            }

            var oderCarListHandle = () => {
                var notice = $('header .cart .notice')
                var cartList = JSON.parse(window.localStorage.getItem('cart'))
                if (!cartList) {
                    cartList = []
                    window.localStorage.setItem('cart', JSON.stringify(cartList))
                }
                if (cartList.length == 0) {
                    $('.nocart-img').show()
                    notice.text(cartList.length).fadeOut()
                    $('.maincart-href').hide()
                }
                else {
                    $('.maincart-href').show()
                    $('.nocart-img').hide()
                    notice.text(cartList.length).fadeIn()
                }
            }

            var showCarList = () => {
                var cartListContainer = $('.cart-list')
                cartListContainer.html('')
                var cartList = JSON.parse(window.localStorage.getItem('cart'))
                cartList.forEach((e) => {

                    let item = `<div id="${e.id}" class="cart-list-item">
                        <img src=${e.url} alt="cart item">
                        <span class="name">${e.name}</span>
                        <span class="quantity">X<span>${e.quantity}</span></span>
                        <span class="deleting">Xóa</span>
                        <span class="pid" style="display: none">${e.id}</span>
                    </div>`

                    cartListContainer.append(item)
                })
            }

            var nocart = () => {
                var cartList = JSON.parse(window.localStorage.getItem('cart'))
                if (cartList.length == 0) return true
                else return false
            }
            
            $(document).ready(() => {
                
                let currentPage = window.location.pathname.slice(1)
                if (!currentPage) currentPage = 'home'
                if (currentPage[currentPage.length - 1] == '/') currentPage = currentPage.slice(0, currentPage.length - 1)
                if (['home', 'gioithieu', 'sanpham', 'lienhe'].indexOf(currentPage) != -1)
                    $(`#${currentPage}>.line`).addClass('line-appear')

                oderCarListHandle()
                showCarList()
                cartHandle()

                duration = 500
                setTimeout(()=>{
                    pageMess = $('.pagesay.pagesay-show .pagesay-text')
                    if(pageMess.length>0) alert(pageMess.text())
                },duration)

            })
    </script>
    <?=$this->section('scripts')?>
</body>
</html>