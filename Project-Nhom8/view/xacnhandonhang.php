<?php 
    $db= mysqli_connect("localhost","root","","the_coffee");
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if(isset($_GET['id_order'])){
        $id_order = $_GET['id_order']; 
        $delivery_time = date('Y-m-d H:i:s');
        $query ="UPDATE tbl_order SET delivery_time = '$delivery_time', trangthai = 'Đã nhận hàng'  WHERE id_order='$id_order'";
        $result = mysqli_query($db,$query);
        header("Location:./condition.php");
        
    }
    ?>