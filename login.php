<html>
    <form action="" method="post">
        Tên Đăng nhập : <input type="text" name="user"><br>
        Mật khẩu : <input type="password" name="pass"><br>
        <input type="submit" name="login" id="Đăng nhập">
    </form>
    <?php
    if(isset($_POST)){
        echo "tài khoản của bạn là : ".$_POST['user'];
        echo "<br>mật khẩu của bạn là : ".$_POST['pass'];
    }
    ?>
</html> 