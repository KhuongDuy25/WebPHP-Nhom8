<?php
include "./slidebar.php";
include "../class/category_class.php";
?>


<?php
 $category= new category;
 $show_category = $category -> show_category();

?>

<div class="main">
<h1>Danh sách danh mục sản phẩm</h1>
<table>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Tùy biến</th>
                </tr>
                <?php
                if($show_category){
                    $i=0;
                    while($result= $show_category->fetch_assoc()){
                       $i++;
                   
                ?>
                <tr>
                    <td><?php  echo$i ?></td>
                    <td> <?php echo$result['category_id'] ?></td>
                    <td> <?php echo$result['category_name'] ?></td>
                    <td> <a href="./categoryedit.php?category_id= <?php echo $result['category_id'] ?>">Sửa</a>|<a href="./categorydelete.php?category_id= <?php echo $result['category_id'] ?>">Xóa</a></td>
                </tr>
                <?php
            }
                }
                ?>
            </table>


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
    table{
    width: 100%;
    text-align: center;
    margin-top: 20px;
    margin-right: 30px;
    
}
table tr th,td{
    border: 1px solid #000;
}
table{
    border-collapse: collapse;
}


  </style>
</html>