<?php
include "./slidebar.php";
?>
<?php
$db= mysqli_connect("localhost","root","","the_coffee");
$sql= "SELECT * FROM tbl_tintuc";
$rs= mysqli_query($db,$sql);

?>

<div class="main">
<h1>Danh sách tin tức</h1>
<table>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>                   
                    <th>Tùy biến</th>
                </tr>
<?php
  if($rs->num_rows>0){
    $i=0;
    while($row= $rs->fetch_assoc()){
        $i++;
        $id= $row['id'];
        $title=$row['title'];
        $img=$row['img'];
        $mota=$row['mota'];
        $noidung=$row['noidung'];

    
?>
             <?php  echo "
                <tr>
               
                    <td>$i</td>
                    <td>$title</td>
                    <td><img src='../$img' alt=''></td>
                    <td>$mota</td>                   
                    <td>$noidung</td>
                   <td> <a href='./tintucedit.php?id=$id'>Sửa</a>|<a href='./tintucdelete.php?id=$id'>Xóa</a></td>
                </tr>
                ";?>
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