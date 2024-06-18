<?php
session_start();
$db= mysqli_connect("localhost","root","","the_coffee");
if($_POST){

   $u= $_POST['username'];
   $p=$_POST['password'];
   
   //ket noi 
   //truy van
   $sql="SELECT * from tbl_user where username='$u' and password='$p' ";
   //thuc thi truy van
   $rs=mysqli_query($db,$sql);
   $row= mysqli_fetch_assoc($rs);
$id_user=$row['id_user'];


   if($row){
    $_SESSION['login']=$row['role'];
    if($_SESSION['login'] && $_SESSION['login']!='0'){
      $_SESSION['id_user']=$id_user;

      header("Location: ../admin/index.php");
    }
    else{
      $_SESSION['id_user']=$id_user;
      
      header("Location: ../view/index.php");
    }

   }else{
    header("Location: dangnhap.php");
   }
   }
?>