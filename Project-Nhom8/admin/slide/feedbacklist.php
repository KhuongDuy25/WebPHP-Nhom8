<?php
include "./slidebar.php";
?>

<?php
$db= mysqli_connect("localhost","root","","the_coffee");
$sql= "SELECT * FROM tbl_feedback";
$result = $db->query($sql);


?>

<div class="main">
<h1>Danh sách phản hồi</h1>
<table>
                <tr>
                    <th style="width:50px;">STT</th>
                    <th>Tên</th>
                    <th>Họ</th>
                    <th style="width:150px;">Email</th>
                    <th style="width:150px;">Số điện thoại</th>
                    <th style="width:150px;">Chủ đề</th>
                    <th style="width:400px;">Nội dung</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    $i=0;
                    // Load dữ liệu lên website
                    while($row = $result->fetch_assoc()) {
                        $i++;


                ?>


                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['subject_name'] ?></td>
                    <td><?php echo $row['note'] ?></td>
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
    
}
table tr th,td{
    border: 1px solid #000;
}
table{
    border-collapse: collapse;
    margin-right: 20px;
    width: 1200px;
}

  </style>
</html>