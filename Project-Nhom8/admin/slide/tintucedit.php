<?php
include "./slidebar.php";

?>

<!-- show -->
<?php 
$db= mysqli_connect("localhost","root","","the_coffee");
if($_GET['id']){
    $id = $_GET['id'];
    $query= "SELECT * FROM tbl_tintuc WHERE id='$id'";
    $rs = mysqli_query($db,$query);
   $row = $rs->fetch_assoc();
}
?>
<script src="ckeditor/ckeditor.js"> </script>

<!-- update -->

<?php

if($_SERVER['REQUEST_METHOD']==='POST'){
    $title= $_POST['title'];
    $img= $_POST['img'];
    $mota= $_POST['mota'];
    $noidung=$_POST['noidung'];
    $query ="UPDATE tbl_tintuc SET title='$title', img = '$img' ,mota='$mota',noidung='$noidung'  WHERE id='$id'";
    $result= mysqli_query($db,$query);
    header("Location:./tintuclist.php");
}
?>


<div class="main">
<h1>Sửa tin tức</h1>
<form action="" method="post">
    <label for="">Tiêu đề <span style="color: red;">*</span></label>
    <input type="text " name="title" placeholder=""value="<?php echo $row['title'] ?>  " >
    <label for="">Mô tả <span style="color: red;">*</span></label>
    <input name="mota" type="text" placeholder="" value="<?php echo $row['mota'] ?>  ">
    <label for="">Link ảnh tin tức <span style="color: red;">*</span></label>
    <input name="img" required type="text" value="<?php echo $row['img'] ?>  ">
    <label for="">Nội dung <span style="color: red;">*</span></label>  
    <textarea required name="noidung" id="noidung" cols="30" rows="10"><?php echo $row['noidung'] ?></textarea>
    <button class="them" type="submit">Sửa</button>
</form>

    </div>
    </div>
</body>
<script>
    
	CKEDITOR.replace( 'noidung' );
</script>




<!-- js  css -->
<script>
    const dangxuat=document.querySelector(".ti-angle-down")
if(dangxuat){
    dangxuat.addEventListener("click",function(){
        document.querySelector(".out").style.display="block"      
    })

}

  </script>
  <style>
    h1{
        font-weight: 500;
        margin: 30px;
        font-size: 30px;
    }
    form{
        display: flex;
        flex-direction: column;
        
    }
    textarea{
        width: 600px;
    }
    input{
        width: 150px;
        height: 30px;
        margin: 20px;
    }
    .them{
        background-color: red;
        width: 150px;
        height: 30px;
        margin: 20px;
    }
    .them :hover{
        cursor: pointer;

    }
    select{
        width: 150px;
        height: 30px;
        margin: 20px;
    }
    

  </style>
</html>