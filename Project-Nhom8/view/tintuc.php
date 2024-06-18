<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu</title>
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
 .tintuc p{
    color: #000;
  }
  .tintuc  a{
    transition: 0.2s;
    transform: translateX(0);
    cursor: grab;
}
  .tintuc  a :hover{
    transform: translateY(-0.5rem);  
    color: red;
  }
  .tintuc{
    display: flex;
    margin: 30px 130px;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .tintuc-khoi{
    width: 350px;
    height: 300px;
    margin: 34px;
    display: flex;
    flex-direction: column;
  }
  .tintuc-img img{
    width: 300px;
    height: 200px;
  }
  
</style>


</head>
<body>
<?php 
include "./header.php";
?>
<h1>TIN TỨC</h1>



<div class="tintuc">
<?php
$db= mysqli_connect("localhost","root","","the_coffee");
$sql= "SELECT * FROM tbl_tintuc ";
$rs= mysqli_query($db,$sql);
if($rs->num_rows>0){
  while($row=$rs->fetch_assoc()){
?>

  <a href="./tintucshow.php?id=<?php echo $row['id'] ?>">
    <div class="tintuc-khoi">
        <div class="tintuc-img">
          <img src="<?php echo $row['img'] ?>" alt="">
        </div>       
          <a href="./tintucshow.php?id=<?php echo $row['id'] ?>"><h2><?php echo $row['title'] ?></h2></a>
        <p><?php echo $row['mota'] ?></p>
    </div>
    </a>
   
    <?php
}
}
?>
    


</div>

<?php 
include "./footer.php";
?>
</body>
</html>