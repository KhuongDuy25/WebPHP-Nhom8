<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
<style>
  h1{
    margin: 30px 130px;
  }
  .header{
    z-index: 1;
  }
  .main {
    margin: 0 130px;
    display: flex;
  }
  .main-right{
    margin-left: 20px;
  }
  .main-right p{
    color: #000;
  }
 </style>




</head>

<?php 
include "./header.php";
?>
<body>


<?php
$db= mysqli_connect("localhost","root","","the_coffee");

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql= "SELECT * FROM tbl_tintuc WHERE id= '$id'";
$rs= mysqli_query($db,$sql);


  if($rs->num_rows>0){
    $i=0;
    while($row= $rs->fetch_assoc()){
        $i++;
        $title=$row['title'];
        $img=$row['img'];
        $mota=$row['mota'];
        $noidung=$row['noidung'];

    
?>
<h1>Tin Tức / <?php echo $title ?></h1>
<div class="main">
<div class="main-left">

<img src="<?php echo $img ?>" alt="">
</div>
<div class="main-right">
<p><?php echo $noidung ?></p>
</div>
<?php
    }
  }
}
?>

</div>
</body>

<?php 
include "./footer.php";
?>
</html>