<?php 
$db= mysqli_connect("localhost","root","","the_coffee");
if($_GET['id']){
    $id = $_GET['id'];

    $query= "DELETE FROM tbl_tintuc WHERE id='$id'";
    $result = mysqli_query($db,$query);
    header('Location:tintuclist.php');
}


?>