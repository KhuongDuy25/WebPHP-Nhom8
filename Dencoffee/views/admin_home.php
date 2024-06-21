<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div class="admin-home-container container-fluid d-flex justify-content-center">

    <div class="cards d-flex justify-content-around">

        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Sản phẩm</div>
            <div class="card-body">
                <h5 class="card-title"><?=$this->e($prdNumber)?></h5>
            </div>
        </div>

        <div class="card text-bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Tài khoản</div>
            <div class="card-body">
                <h5 class="card-title"><?=$this->e($userNumber)?></h5>
            </div>
        </div>

        <div class="card text-bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">Đơn hàng</div>
            <div class="card-body">
                <h5 class="card-title"><?=$this->e($orderNumber)?></h5>
            </div>
        </div>

        <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Phản hồi</div>
            <div class="card-body">
                <h5 class="card-title"><?=$this->e($feedbacksNumber)?></h5>
            </div>
        </div>

    </div>

</div>

<?php $this->push('scripts') ?>
<script>
    

</script>
<?php $this->end() ?>