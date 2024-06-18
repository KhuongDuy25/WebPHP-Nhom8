<?php
include "./slidebar.php";
include("../class/product_class.php");
?>
<!-- đếm số lượng -->
<?php
$db= mysqli_connect("localhost","root","","the_coffee");
$query= "SELECT * FROM tbl_product";
$result = mysqli_query($db,$query);
$count = mysqli_num_rows($result);;
$page= ceil($count/4);
?>


<!-- lấy 4 sp -->
<?php
if (!isset ($_GET['page']) ) {

    $current_page = 1;
    
    } else {
    
    $current_page = $_GET['page'];
    
    }
    $index= ($current_page-1)*4;
    $query= "SELECT * FROM tbl_product LIMIT $index, 4 ";
    $rs = mysqli_query($db,$query);  
?>

<!--  -->
<div class="main">
<h1>Danh sách sản phẩm</h1>
<table>
                <tr>
                    <th>STT</th>
                    <th>Danh mục</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    
                    <th>Tùy biến</th>
                </tr>

                <?php 
                    if($rs->num_rows>0){
                    $i=0;
                    while($row=$rs->fetch_assoc()){
                   $i++;
?>
                <tr>
               
                    <td> <?php echo $i  ?> </td>
                    <td> <?php echo $row['cartegory_id']?> </td>
                    <td> <img  src="<?php echo $row['product_img']?>" alt=""></td>
                    <td><?php echo $row['product_name'] ?></td>                   
                    <td><?php echo $row['product_price'] ?></td>
                   <td> <a href="./productedit.php?product_id= <?php echo $row['product_id'] ?>">Sửa</a>|<a href="./productdelete.php?product_id= <?php echo $row['product_id'] ?>">Xóa</a></td>
                </tr>

                <?php
                    }
}

?>
            </table>
            <div class="phantrang">
                <ul>
                    <?php 
                    for($i=1; $i<=$page; $i++){  
                    ?>
                    <li><a href="productlist.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php  }  ?>
                </ul>
            </div>
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
    .phantrang{
        /* display: flex;
        align-items: center;
        justify-content: center; */
        margin: 20px 0;
    }
    .phantrang ul{
        display: flex;
    }
    .phantrang li{
        border: 1px solid #000;
        background-color: aqua;
        margin-left: 10px;
        padding: 5px;
    }
    h1{
        font-weight: 500;
        margin: 30px;
        font-size: 30px;
    }
    table{
    width: 100%;
    text-align: center;
    margin-top: 20px;
    
}
table tr th,td{
    border: 1px solid #000;
    text-align: center;
}
table{
    border-collapse: collapse;
}
td img{
    height: 150px;
}

  </style>
</html>