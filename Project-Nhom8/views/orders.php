<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php 
    require __DIR__.'/../app/phphelper.php';

    $this->layout('layouts/main', ['cssLink'=>'/css/orders.css','title' => 'Lịch sử đặt hàng', 'pagemess'=>$pagemess]) 
?>


<div class="maincart-container orders-container">
    <div style="display: flex;">
        <div class="back-btn"><a href="/sanpham"><i class="fa fa-angle-left"></i> Trở về</a></div>
        <div class="breadcrumb">
            <span><a href="/"> Den Coffee</a></span>
            <span><a href="/lichsudathang">Lịch sử đặt hàng</a></span>
        </div>
    </div>

    <div class="label">
        <div>
            <div class="maincart-list-label">
                <img src="/imgs/icons/cart.png" height="60" alt="maincart">
                <span style="margin-left: -16px;">Đơn hàng đã đặt</span>
            </div>
        </div>
    </div>
    
    <div class="maincart-list-container orders-list-container">
        <div class="maincart-list orders-list">

            <?php 
                if(count($orders) == 0){
                    echo "<h2 class='no-order'>Không có lịch sử đặt hàng!<h2>"; 
                }
            ?>

            <?php foreach($orders as $order): ?>
                <div id=<?= $this->e($order->id)?> class="orders-list-item">
                    <div>
                        <div class="order-time">
                            <span class="order-label">Đơn hàng đặt ngày: </span>
                            <span class="date"><?= $this->e($order->created_at['day'])?></span>/<span class="month"><?= $this->e($order->created_at['month'])?></span>/<span class="year"><?= $this->e($order->created_at['year'])?></span>
                            <span class="time">
                                <span><?= $this->e($order->created_at['hours'])?></span>:<span><?= $this->e($order->created_at['minutes'])?></span>:<span><?= $this->e($order->created_at['seconds'])?></span>
                            </span>
                        </div>
                        <div class="order-address">
                            <span class="order-label">Địa chỉ nhận hàng: </span>
                            <span><?= $this->e($order->addr)?></span>
                        </div>
                        <div class="">
                            <span class="order-label">Trạng thái: </span>
                            <span class="<?='orderstatus-'.$this->e($order->orderstatus->id)?>"><?= $this->e($order->orderstatus->status)?></span>
                        </div>
                    </div>
                    <div>
                        <div class="order-detail-btn"><a href=<?="/chitietdonhang?oid=".$this->e($order->id)?>>Xem chi tiết</a></div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    
</div>


<?php $this->push('scripts') ?>
<script>

    $(document).ready(()=>{


    })

</script>
<?php $this->end() ?>
