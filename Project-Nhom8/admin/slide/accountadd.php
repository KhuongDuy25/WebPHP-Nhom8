<?php
include "./slidebar.php";
include "../class/account_class.php";
?>

<?php
  $account = new account;
  if($_SERVER['REQUEST_METHOD']==='POST'){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $email=$_POST['email'];
    $phanquyen=$_POST['phanquyen'];
   
    $insert_account =$account->insert_account($username,$password,$email,$phanquyen);
    header("Location: ./accountlist.php");
 }

?>


<div class="main">
    <h1>Thêm tài khoản</h1>

    <form action="" method="post">
        <label for="">Tên đăng nhập <span style="color: red;">*</span></label>
        <input type="text" placeholder="Username" name="username">
        <label for="">Mật khẩu <span style="color: red;">*</span></label>
        <input type="text" placeholder="Password" name="password">
        <label for="">Email <span style="color: red;">*</span></label>
        <input type="text" placeholder="Email" name="email">
        <label for="">phân quyền 222<span style="color: red;">*</span></label>
        <select name="phanquyen" id="">
            <option value="222" hidden >222</option>
            <option value="22">222</option>
            <option value="222">222</option>
        </select>
        <!-- <label for="">Phân quyền <span style="color: red;">*</span></label> -->
        <!-- <select name="role" id="">
                <option value="">----Chọn ----</option>                       
                    
                    <option value="">1</option>
                    <option value="">0</option>
                </select> -->
        <button class="them" type="submit">Thêm</button>
        
    </form>


    </div>
    </div>
    
</body>




<!-- js and css -->
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