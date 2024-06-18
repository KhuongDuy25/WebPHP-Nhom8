 <?php
session_start();
 if(!isset($_SESSION['id_user'])){    
    header("Location:../login/dangnhap.php");
 }
?>

<style>
    li a{
        color: #000;
    }
    .quanly{
        background-color: #e0dede;
    }
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ admin</title>
    <link rel="stylesheet" href="../css/css/styleadmin.css">
    <link rel="stylesheet" href="../css/img/cafe-latte.jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <div class="header">
        <h1>ADMIN</h1>
        <a class="go" href="../index.php">
            <i class="ti-back-right"></i>
            Đến trang chủ
            </a>
    </div>
    <div style="height: 635px;" class="content">
    <div class="sidebar">
        <div class="logo">          
                <img src="../css/img/user.jpg" alt="">
                <p>Admin</p>
                <i class="ti-angle-down">             
                <a class="out" href="../login/dangnhap.php">
                <i class="fa-solid fa-right-to-bracket"></i>    
                Đăng xuất</a>
                
                </i>

        </div>
        <div class="quanly">
            <ul class="cha">
                <li>Quản lý tài khoản
                    <ul class="con">
                        <li><a href="../admin/slide/accountadd.php">Thêm tài khoản</a></li>
                        <li><a href="../admin/slide/accountlist.php">Danh sách tài khoản</a></li>
                    </ul>
                    
                </li>
                <li>Quản lý danh mục sản phẩm
                <ul class="con">
                        <li><a href="../admin/slide/categoryadd.php">Thêm danh mục sản phẩm</a></li>
                        <li><a href="../admin/slide/categorylist.php">Danh sách danh mục sản phẩm</a></li>
                    </ul>
                </li>
                <li>Quản lý sản phẩm
                <ul class="con">
                        <li><a href="../admin/slide/productadd.php">Thêm sản phẩm</a></li>
                        <li><a href="../admin/slide/productlist.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li>Quản lý tin tức
                <ul class="con">
                        <li><a href="../admin/slide/tintucadd.php">Thêm tin tức</a></li>
                        <li><a href="../admin/slide/tintuclist.php">Danh sách tin tức</a></li>
                    </ul>
                </li>
                <li>Quản lý đơn hàng
                <ul class="con">
                        <li><a href="../admin/slide/orderlist.php">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                <li>Quản lý phản hồi
                <ul class="con">
                        <li><a href="../admin/slide/feedbacklist.php">Danh sách phản hồi</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        
    </div>



<!-- lọc theo ngày -->
<?php
  $db= mysqli_connect("localhost","root","","the_coffee");
  $sum =0;
  $count=0;
  if($_POST){
    $tungay=$_POST['tungay'];
    $denngay=$_POST['denngay'];
    $sql= "SELECT * FROM tbl_order WHERE  delivery_time BETWEEN '$tungay 00:00:00' AND '$denngay 23:59:59'";
    $result = mysqli_query($db,$sql);
    
    $count=mysqli_num_rows($result);
    if($result->num_rows>0){
        $i=0;
        while($row=$result->fetch_assoc()){
            $tien=$row['total_money'];
          $i++;
          $sum += $tien;         
        }
    }
  }
  
?>

<!-- thống kê -->
    <div class="main">
        <h1>Thống kê doanh thu</h1>

        <!-- biểu đồ -->
        <div id="myfirstchart" style="height: 250px;"></div>

        <!-- end biểu đồ -->
        <form action="" method="post">
        <div class="thoigian">
        <div class="theongay">
            <label for="">Từ ngày:</label>
            <input name="tungay" id="myID" type="text">
        </div>
        <div class="theongay">
            <label for="">Đến ngày:</label>
            <input name="denngay" id="myID" type="text">
        </div>
        <div class="theongay">
            <button>Lọc</button>
        </div>
        </div>
       
    
    <div class="thongke">
        <div class="soluong">
            <h2>Tổng số đơn hàng</h2>
            <p><?php echo $count ?></p>

        </div>
        <div class="tongtien">
            <h2>Doanh thu (VNĐ)</h2>
            <p><?php echo $sum ?></p>

        </div>
    </div>
    </form>
    </div>
    </div>
</body>


<!-- end thống kê -->
<style>
    h1{
        margin: 30px;
        font-weight: 500;
    }
    .thoigian{
        display: flex;
        margin: 30px;
        color: #000;
        align-items: center;
        justify-content: center;
    }
    .theongay{
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 30px;
    }
    .theongay label{
        margin-right: 10px;
    }
    .theongay input{
        width: 150px;
        height: 30px;
    }
    .theongay button{
        width: 150px;
        height: 30px;
        border-radius: 10px;
    }
    .theongay button:hover{
        background-color: #000;
        color: #fff;
        cursor: pointer;
        border-radius: 10px;
    }
    .thongke{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 30px;
    }
    .thongke .soluong,.thongke .tongtien{
        border: 1px solid #000;
        border-radius: 30px;
        width: 250px;
        height: 100px;
        background-color: aqua;
        margin-left: 30px;
        margin-right: 30px;
        align-items: center;
        justify-content: center;
        display: flex;
        flex-direction: column;
    }
    .thongke .soluong p,.thongke .tongtien p{
        font-size: 20px;
        margin-top: 10px;
    }
</style>

<!-- lịch -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#myID", {});
</script>





<!-- biểu đồ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
   var char = new Morris.Area({
  element: 'myfirstchart', 
 data: [
    { month: '2023-1', Total:  0},
    { month: '2023-2', Total:  0},
    { month: '2023-3', Total: 0 },
    { month: '2023-4', Total: 0 },
    { month: '2023-5', Total: 0 },
    { month: '2023-6', Total: 0 },
    { month: '2023-7', Total: 0 },
    { month: '2023-8', Total: 250000 },
    { month: '2023-9', Total: 350000 },
    { month: '2023-10', Total: 300000 } 
  ], 
  xkey: 'month',
  ykeys: ['Total'],
  labels: ['Tổng tiền']
});
</script>

<!-- end biểu đồ -->




<!-- đăng xuất -->
<script>
    const open=document.querySelector(".ti-angle-down")
    const close=document.querySelector(".ti-close")
if(open){
    open.addEventListener("click",function(){
        document.querySelector(".out").style.display="block"      
    })

}
  </script>
</html>