<?php
include "./slidebar.php";
include("../class/product_class.php");
?>

<?php
$product = new product;
if($_SERVER['REQUEST_METHOD']==='POST'){  
    // $product_name=$_POST['product_name'];
    // $category_id=$_POST['category_id'];
    // $product_price=$_POST['product_price'];
    // $product_img=$_FILES['product_img']['name'];
    // move_uploaded_file($_FILES['product_img']['tmp_name'],"../upload/".$_FILES['product_img']['name']);
    $insert_product =$product->insert_product();
 }
 ?>



<div class="main">
<h1>Thêm sản phẩm</h1>
<form action="" method="post">
<label for="">Chọn danh mục sản phẩm <span style="color: red;">*</span></label>
<select  name="category_id" id="">
                <option value="">----Chọn ----</option>

                <?php 
                    
                   $show_category= $product->show_category();
                   if($show_category){
                    while($result=$show_category->fetch_assoc()){

                    
                ?>
                 
                    <option value="  <?php echo $result['category_name'] ?>"><?php echo $result['category_name'] ?></option>
                <?php 
                }
            }
                ?>   
                </select>
                <label for="">Tên sản phẩm <span style="color: red;">*</span></label>
    <input type="text " name="product_name" placeholder="Tên sản phẩm">
    <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
    <input name="product_price" type="text" placeholder="Giá">
    <label for="">Link ảnh sản phẩm <span style="color: red;">*</span></label>
    <input name="product_img" required type="text">
    <button class="them" type="submit">Thêm</button>
</form>

    </div>
    </div>
</body>




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