<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div style="flex-direction: column;" class="admin-acc-container container-fluid d-flex justify-content-center">
    <h3>Quản lý tài khoản</h3>
    <hr>

    <table class="table">
    <thead class="table-dark">
        <td>Tên tài khoản</td>
        <td>Mật khẩu</td>
        <td>Admin</td>
        <td></td>
    </thead>
    <tbody>
        <?php foreach($data as $user): ?>
        <tr>
            <td><?= $this->e($user->username) ?></td>
            <td><?= $this->e(md5($user->username)) ?></td>
            <td><input disabled class="form-check-input" type="checkbox" <?php if($user->admins) echo 'checked' ?>></td>
            <td>
                <form action="/admin/taikhoan/xoa" method="POST">
                    <input name="accid" style="display:none;" type="number" value="<?= $this->e($user->id) ?>">
                    <?php if(!$user->admins) echo '<button class="p-1 btn btn-danger account-removing-btn" name="submit" type="submit">Xóa</button>' ?>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>

</div>

<?php $this->push('scripts') ?>
<script>

    $(document).ready(()=>{
        $('.account-removing-btn').click((e)=>{
            var deletingConfirm = confirm('Bạn chắc chắc muốn xóa tài khoản?');
            if(deletingConfirm) $(e.currentTarget).parent().submit();
            else{
                e.preventDefault();
                e.stopPropagation();
            }
        })
    })

</script>
<?php $this->end() ?>