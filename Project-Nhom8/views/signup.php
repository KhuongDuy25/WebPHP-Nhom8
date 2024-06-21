<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/main', ['cssLink'=>'/css/login-signup.css','title' => 'Đăng ký', 'pagemess'=>$pagemess]) ?>


<div class="login-signup-container">

    <div style="display: flex;">
        <div class="back-btn"><a href="/sanpham"><i class="fa fa-angle-left"></i> Trở về</a></div>
        <div class="breadcrumb">
            <span><a href="/"> Den Coffee</a></span>
            <span><a href="/dangky"> Đăng ký</a></span>
        </div>
    </div>

    <div class="signup-form">
        <form action="/dangky" method="post">
            <h3>Đăng ký</h3>
            <div class="signup-flugin">
                <a href="#"><img src="/imgs/fb-signup.png" alt=""></a>
                <a href="#"><img src="/imgs/gg-signup.png" alt=""></a>
            </div>

            <div class="input-grp">
                <div>
                    <label for="username">Tên tài khoản: </label>
                    <input data-type="username" type="text" name="username" id="username" placeholder="Nhập tên tài khoản">
                </div>
                <span class="field-mess">Tên tài khoản bao gồm các chữ cái hoa, thường, số và dài từ 8 đến 20 ký tự!</span>
            </div>

            <div class="input-grp">
                <div>
                    <label for="password">Mật khẩu: </label>
                    <input data-type="password" type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                </div>
                <span class="field-mess">Mật khẩu phải dài từ 8 đến 16 ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt!</span>
            </div>

            <div class="input-grp">
                <div>
                    <label for="password">Xác nhận mật khẩu: </label>
                    <input data-type="repassword" type="password" name="password-confirm" id="password-confirm" placeholder="Nhập mật khẩu">
                </div>
                <span class="field-mess">Mật khẩu không đúng định dạng hoặc không khớp!</span>
            </div>

            <div class="fonm-option">
                <span>Bạn đã có tài khoản?</span>
                <span><a href="/dangnhap">Đăng nhập ngay</a></span>
            </div>

            <input name="submit" type="submit" value="Đăng ký">

        </form>
    </div>
        

</div>

<?php $this->push('scripts') ?>
<script>

    $(document).ready(() => {

        var form = $('.signup-form form')
        form.find('input[type=submit]').click((e) => {
            if (validation(form)) form.submit()
            else e.preventDefault()
        })

        focusInputHandel()
    })


</script>
<?php $this->end() ?>