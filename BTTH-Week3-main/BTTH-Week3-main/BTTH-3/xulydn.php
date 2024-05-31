<?php
    session_start();
    $db= mysqli_connect("localhost","root","","test");
    mysqli_query($db,'SET NAMES UTF8');


    if(isset($_POST['login'])){
        $u = $_POST['user'];
        $p = sha1($_POST['pass']);
        $query = "SELECT * from tbl_user where name='$u' and pass='$p' ";
        $result= mysqli_query($db,$query);

        if(mysqli_num_rows($result)>0){
            $_SESSION['login']=true;
            header("location: trangchu.php");
            
        }
        else{
        
            echo "đăng nhập không thành công!!";
            
        }

    }
    ?>
