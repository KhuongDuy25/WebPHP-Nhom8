<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/adminstyle.css">
    <link rel="stylesheet" href=<?=$this->e($cssLink)?>>
    <title><?=$this->e($title)?></title>
    <style>
    .disclaimer{display: none;}
    </style>
</head>

<body>

    <div style="display: none;" class="pagesay <?php if($this->e($pagemess)) echo 'pagesay-show' ?>">
        <div class="pagesay-text"><?php if($this->e($pagemess)) echo $pagemess ?></div>
    </div>

    <header>

     <nav class="navbar mb-0 navbar-expand-sm navbar-dark bg-dark">
       <div class="container-fluid">
         <a class="navbar-brand" href="/admin">Admin Dashboard</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
           <ul class="navbar-nav me-4">
             <li class="nav-item">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle user-option" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="title <?php if(isset($_SESSION['user'])) ?>">
                    <?php
                        if(isset($_SESSION['user'])) echo $_SESSION['user']['username'];
                     ?>
                </span>
                </button>
                <ul style="left: -50px;" class="dropdown-menu mt-1" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="/dangxuat">Đăng xuất</a></li>
                </ul>
              </div>
             </li>
           </ul>
         </div>
       </div>
     </nav>

    </header>
    
    <div class="slidebar-container page-content d-flex">
        <aside>
            <div class="wrapper">
                <nav id="sidebar">
                    <ul class="list-unstyled components">
                        <li>
                            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thống
                                kê số liệu</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu1">
                                <li>
                                    <a href="/admin/taikhoan">Tài khoản</a>
                                </li>
                                <li>
                                    <a href="/admin/solieu">Số liệu</a>
                                </li>
                                <li>
                                    <a href="/admin/doanhthu">Doanh thu</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản
                                lý sản phẩm</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu2">
                                <li>
                                    <a href="/admin/solieusanpham">Số liệu sản phẩm</a>
                                </li>
                                <li>
                                    <a href="/admin/capnhatsanpham">Cập nhật sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/quanlydonhang">Quản lý đơn hàng</a>
                        </li>
                        <li>
                            <a href="/admin/phanhoi">Phản hồi</a>
                        </li>
                    </ul>
                </nav>
        
        
            </div>
        </aside>
    
        <div class="content">
            <div class="main-content">
                <?=$this->section('content')?>
            </div>
            <footer>
                <div class="coppyright">&copy; 2024 Nhóm 8 Web Nâng cao <a href="mailto:thanhtienly372001@gmail.com">(Nhom8webnangcao@gmail.com)</a></div>
            </footer>
        </div>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/574a825c20.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/jshelper.js"></script>
    <script>

            $(document).ready(() => {
                
                duration = 500
                setTimeout(()=>{
                    pageMess = $('.pagesay.pagesay-show .pagesay-text')
                    if(pageMess.length>0) alert(pageMess.text())
                },duration)

                $('#sidebarCollapse').on('click', function () {
                  $('#sidebar').toggleClass('active');
                });

            })
    </script>
    <?=$this->section('scripts')?>
</body>
</html>