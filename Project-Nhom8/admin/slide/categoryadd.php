<?php
include "./slidebar.php";
include "../class/category_class.php";
?>

<?php
 $category= new category;
 if($_SERVER['REQUEST_METHOD']==='POST'){
    $category_name= $_POST['category_name'];
    $insert_category =$category->insert_category($category_name);
    header("Location: ./categorylist.php");
 }
?>


<div class="main">
<h1>Thêm danh mục sản phẩm</h1>
<form action="" method="post">
<label for="">Danh mục <span style="color: red;">*</span></label>
        <input type="text" placeholder="Danh mục sản phẩm" name="category_name">
        
        <button class="them" type="submit">Thêm</button>
        
    </form>

    </div>
    </div>
</body>


<!-- js css -->
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

  </style>
</html>