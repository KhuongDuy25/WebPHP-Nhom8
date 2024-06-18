
<?php
$db= mysqli_connect("localhost","root","","the_coffee");
   
   if(isset( $_POST['submit']) &&  $_POST['username'] !='' &&  $p=$_POST['password'] !='' && $_POST['email'] !=''){
    $u= $_POST['username'];
   $p=$_POST['password'];
   $e=$_POST['email'];

//    kiểm tra tên đăng nhập tồn tại
   $sql="select * from tbl_user where username='$u'";
   $rs=mysqli_query($db,$sql);
   if(mysqli_num_rows($rs)>0){
    header("Location: register.php");
    // echo"<p>Ten tai khoan $u da ton tai</p>";
   }else{
    $sql ="INSERT INTO tbl_user(username,password,email) VALUE ('$u','$p','$e')";
    mysqli_query($db,$sql);
    header("Location: dangnhap.php");}
}else{
    header("Location: dangki.php");
}
?>