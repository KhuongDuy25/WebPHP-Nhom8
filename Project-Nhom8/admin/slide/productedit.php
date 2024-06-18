<?php
include "./slidebar.php";
include "../class/product_class.php"
?>

<?php
$product= new product;
   if(!isset($_GET['product_id'])|| $_GET['product_id']==NULL){
    echo "<script>window.location='productlist.php'</script";
   }else{
    $product_id = $_GET['product_id'];
      
   }
   $get_product= $product -> get_product($product_id);
   if($get_product){
    $rs = $get_product->fetch_assoc();
   }
?>
<?php
$db= mysqli_connect("localhost","root","","the_coffee");
if($_SERVER['REQUEST_METHOD']==='POST'){
       $product_name=$_POST['product_name'];  // loại hàng gì
       $category_id=$_POST['category_id'];  // tên sản phẩm
       $product_price=$_POST['product_price']; // giá
       $product_img=$_POST['product_img'];
       $query ="UPDATE tbl_product SET product_name = '$product_name' , cartegory_id = '$category_id', product_img= '$product_img', product_price = '$product_price'  WHERE product_id = '$product_id' ";
       $result= mysqli_query($db,$query);
       header("Location:./productlist.php");
}
?>



<div class="main">
<h1>Sửa sản phẩm</h1>
<form action="" method="post">
<label for="">Chọn danh mục sản phẩm <span style="color: red;">*</span></label>
                <select name="category_id" id="">
                <option hidden><?php echo $rs['cartegory_id'] ?></option>                       
                    
                <?php 
                   $show_category= $product->show_category();
                   if($show_category){
                    while($result=$show_category->fetch_assoc()){

                    
                ?>
                 
                    <option value="<?php echo $result['category_name'] ?>"><?php echo $result['category_name'] ?></option>
                <?php 
                }
            }
                ?>   
                </select>

                
                <label for="">Tên sản phẩm <span style="color: red;">*</span></label>
    <input name="product_name" type="text " placeholder="Tên sản phẩm"  value="<?php echo $rs['product_name'] ?>">
    <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
    <input name="product_price" type="text" placeholder="Giá"  value="<?php echo $rs['product_price'] ?>">
    <label for="">Link ảnh sản phẩm <span style="color: red;">*</span></label>
    <input name="product_img" required type="text"  value="<?php echo $rs['product_img'] ?>">
    <button class="them" type="submit">Sửa</button>
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