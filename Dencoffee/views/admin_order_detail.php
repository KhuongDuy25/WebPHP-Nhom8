<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
$i=1;
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div style="flex-direction: column;" class="admin-order-detail-container container-fluid d-flex justify-content-center">
    <h3>Chi tiết đơn hàng</h3>
    <hr>

    <div class="order-info">
        <ul class="list-group">
            <li class="list-group-item">
                <span>Khách hàng: </span><span><?=$this->e($order->users->username)?></span>
            </li>
            <li class="list-group-item">
                <span>Thơi gian đặt hàng: </span>
                <span>
                    <span style="margin-right:8px;"><?= $this->e($order->created_at['day'])?>/<?= $this->e($order->created_at['month'])?>/<?= $this->e($order->created_at['year'])?></span>
                    <span><?= $this->e($order->created_at['hours'])?>:<?= $this->e($order->created_at['minutes'])?>:<?= $this->e($order->created_at['seconds'])?></span>
                </span>
            </li>
            <li class="list-group-item">
                <span>Địa chỉ nhận hàng: </span><span><?=$this->e($order->addr)?></span>
            </li>
            <li class="list-group-item">
                <span>Mã giảm giá: </span>
                <span style="margin-right:8px;">
                <?= $this->e($order->vouchers?$order->vouchers->code:'Không có')?></span>
                <span class="order-voucher"><?=$this->e($order->vouchers?$order->vouchers->sale:'')?></span>
            </li>
            <li class="list-group-item">
                <span>Tổng thanh toán: </span>
                <span class="order-total"><?=$this->e($order->sum)?></span>
            </li>
            <li class="list-group-item">
                <span>Trạng thái đơn hàng: </span>
                <select style="display:inline-block; width:unset;" id="ord-status" class="ord-status form-select" aria-label="Default select example">
                    <option value="1">Đang chờ</option>
                    <option value="2">Đã nhận</option>
                    <option value="3">Đang giao</option>
                    <option value="4">Đã giao</option>
                    <option value="5">Không thể nhận</option>
                </select>
                <div style="display:none;" class="status"><?=$this->e($order->orderstatus->id)?></div>
                <div style="display:none;" class="oid"><?=$this->e($order->id)?></div>
            </li>
        </ul>
    </div>
    <table class="table">
    <thead class="table-dark">
        <td>#</td>
        <td></td>
        <td>Tên sản phẩm</td>
        <td>Phân loại</td>
        <td>Số lượng</td>
        <td>Giá</td>
    </thead>
    <tbody>
        <?php foreach($order->products as $prd): ?>
        <tr>
            <td><?= $this->e($i++) ?></td>
            <td><img src="<?=$this->e('/imgs/products/'.$prd->main_image)?>" alt="ảnh sản phẩm"></td>
            <td><?= $this->e($prd->name)?></td>
            <td><?= $this->e($prd->producttype->type)?></td>
            <td><?= $this->e($prd->pivot->quantity)?></td>
            <td class="prd-price"><?= $this->e($prd->price)?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>

</div>

<?php $this->push('scripts') ?>
<script>
    
    $(document).ready(()=>{
        orderVoucher = $('.order-voucher')
        if(orderVoucher.text()) orderVoucher.text('-'+currencyFormatting(orderVoucher.text()))
        $('.order-total').text(currencyFormatting($('.order-total').text()))
        $('.prd-price').each((i,e)=>{
            $(e).text(currencyFormatting($(e).text()))
        })


        currStatus = $('.status').text()
        $(`.ord-status option[value=${currStatus}]`).attr('selected', 'selected')
        $(`.ord-status`).addClass('orderstatus-'+currStatus)
        $(`.ord-status`).change(function(){
            $(this).removeClass('orderstatus-'+currStatus)
            $(this).addClass('orderstatus-'+$(this).val())
            currStatus=$(this).val()

            oid = $('.oid').text()
            window.location.href=`/admin/quanlydonhang/doitrangthai?page=orderdetail&oid=${oid}&status=${currStatus}`
        })
    })

</script>
<?php $this->end() ?>