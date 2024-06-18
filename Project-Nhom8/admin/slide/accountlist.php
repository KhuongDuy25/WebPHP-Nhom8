<?php
include "./slidebar.php";
include "../class/account_class.php";
?>


<?php
  $account = new account;
  $show_account = $account -> show_account();

?>

<div class="main">
<h1>Danh sách tài khoản</h1>
<table>
                <tr>
                    <th>STT</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    
                    <th>Tùy biến</th>
                </tr>


                <?php
                if($show_account){
                    $i=0;
                    while($result= $show_account->fetch_assoc()){
                       $i++;
                   
                ?>
                <tr>
                    <td><?php  echo$i ?></td>
                    <td><?php echo$result['username'] ?></td>
                    <td><?php echo$result['password'] ?></td>
                    <td><?php echo$result['email'] ?></td>
                    <td><?php echo$result['role'] ?></td>
                    
                   <td> <a href="./accountedit.php?id_user= <?php echo $result['id_user'] ?>">Sửa</a>|<a href="./accountdelete.php?id_user= <?php echo $result['id_user'] ?>">Xóa</a></td>
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
}

  </style>
</html>