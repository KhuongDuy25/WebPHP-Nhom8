<?php
include "./slidebar.php";
include "../class/category_class.php";
?>



<?php
$category= new category;
   if(!isset($_GET['category_id'])|| $_GET['category_id']==NULL){
    echo "<script>window.location='categorylist.php'</script";
   }else{
       $category_id = $_GET['category_id'];
      
   }
   $get_category= $category -> get_category($category_id);
   if($get_category){
    $result = $get_category ->fetch_assoc();
   }
?>
<?php

 if($_SERVER['REQUEST_METHOD']==='POST'){
    $category_name= $_POST['category_name'];
    $update_category = $category -> update_category($category_name,$category_id);
 }
?>

<div class="main">
<h1>Sửa danh mục sản phẩm</h1>
<form action="" method="post">
<label for="">Danh mục <span style="color: red;">*</span></label>
        <input type="text" name="category_name" placeholder="Danh mục sản phẩm" value="<?php echo $result['category_name'] ?>" >
        
        <button class="them" type="submit">Sửa</button>
        
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
    input , select{
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