<html>
    <p>ĐĂNG NHẬP THÀNH CÔNG!!</p>
    <br><br><br>
    <form action="login.php" method="post">
    <input type="submit" name="logout" value="Đăng xuất">
    </form>

    <?php
            session_start();
            if(isset($_POST['logout'])){
                if ($_SESSION["login"] == false)
                header("Location: login.php");
            }
    ?>
</html>