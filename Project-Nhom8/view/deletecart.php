<?php
$db= mysqli_connect("localhost","root","","the_coffee");
if(isset($_GET['id'])){
       $id = $_GET['id'];  
}
$sql= "DELETE FROM tbl_order_details WHERE id = '$id'";
mysqli_query($db,$sql);
header('location:./cart.php');
   
?>