<?php
include "./slidebar.php";

?>
<?php 
$db= mysqli_connect("localhost","root","","the_coffee");
if($_POST){
    $title= $_POST['title'];
    $img= $_POST['img'];
    $mota= $_POST['mota'];
    $noidung=$_POST['noidung'];
    $sql= "INSERT INTO tbl_tintuc(title,img,mota,noidung) VALUE ('$title','$img','$mota','$noidung') ";
    $rs= mysqli_query($db,$sql);
    header("Location:./tintuclist.php");
}


?>
<script src="ckeditor/ckeditor.js"> </script>

<div class="main">
<h1>Thêm tin tức</h1>
<form action="" method="post">
    <label for="">Tiêu đề <span style="color: red;">*</span></label>
    <input type="text " name="title" placeholder="">
    <label for="">Mô tả <span style="color: red;">*</span></label>
    <input name="mota" type="text" placeholder="">
    <label for="">Link ảnh tin tức <span style="color: red;">*</span></label>
    <input name="img" required type="text">
    <label >Nội dung <span style="color: red;">*</span></label>
   
    <textarea required name="noidung" id="noidung" cols="30" rows="10"></textarea>
    <button class="them" type="submit">Thêm</button>
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