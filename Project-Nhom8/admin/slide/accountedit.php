<?php
include "./slidebar.php";
include "../class/account_class.php";
?>
<?php
$account= new account;
   if(!isset($_GET['id_user'])|| $_GET['id_user']==NULL){
    echo "<script>window.location='accountlist.php'</script";
   }else{
    $id_user = $_GET['id_user'];
      
   }
   $get_account= $account -> get_account($id_user);
   if($get_account){
    $result = $get_account ->fetch_assoc();
   }
?>
<?php

 if($_SERVER['REQUEST_METHOD']==='POST'){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $email=$_POST['email'];
    $phanquyen=$_POST['phanquyen'];
    $update_account = $account -> update_account($id_user,$username,$password,$email,$phanquyen);
 }
?>



<div class="main">
<h1>Sửa tài khoản</h1>
<form action="" method="POST">
<label for="">Tên đăng nhập <span style="color: red;">*</span></label>
        <input type="text"  name="username" value="<?php echo $result['username'] ?>">
        <label for="">Mật khẩu <span style="color: red;">*</span></label>
        <input type="text" name="password" value="<?php echo $result['password'] ?>">
        <label for="">Email <span style="color: red;">*</span></label>
        <input type="text"  name="email" value="<?php echo $result['email'] ?>">
        <label for="">phân quyền <span style="color: red;">*</span></label>
        <select name="phanquyen" id="">
            <option value="<?php echo $result['role'] ?>" hidden > <?php echo $result['role'] ?> </option>
            <option value="0">0</option>
            <option value="1">1</option>
        </select>
        
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
    input,select{
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