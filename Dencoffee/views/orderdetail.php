<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php 
    require __DIR__.'/../app/phphelper.php';

    $this->layout('layouts/main', ['cssLink'=>'/css/orderdetail.css','title' => 'Chi tiết đơn hàng', 'pagemess'=>$pagemess]) 

?>

<div class="maincart-container orderdetail-container">
    <div style="display: flex;">
        <div class="back-btn"><a href="/sanpham"><i class="fa fa-angle-left"></i> Trở về</a></div>
        <div class="breadcrumb">
            <span><a href="/"> Den Coffee</a></span>
            <span>
                <a href="#"> Đơn hàng đặt ngày: 
                    <b class="date"><?= $this->e($order->created_at['day'])?></b>/<b class="month"><?= $this->e($order->created_at['month'])?></b>/<b class="year"><?= $this->e($order->created_at['year'])?></b>
                </a>
            </span>
        </div>
    </div>
    
    <div class="label">
       <div>
            <div class="maincart-list-label">
                <img src="/imgs/icons/cart.png" height="60" alt="maincart">
                <span style="margin-left: -20px;">Đơn hàng</span>
            </div>
       </div>
    </div>

    <div class="maincart-list-container orderdetail-list-container">

        <div class="maincart-list orderdetail-list">

            <?php foreach($order->products as $product): ?>
                <div id= <?=$this->e($product->id)?> class="maincart-list-item">
                    <img src= <?='/imgs/products/'.$product->main_image?> alt="item don hang">
                    <div style="margin-left: 64px; width: 200px">
                        <div class="maincart-list-item-name"><?=$this->e($product->name)?></div>
                        <div class="maincart-list-item-type"><b>Phân loại: </b><span><?=$this->e($product->producttype->type)?></span></div>
                    </div>
                    <div style="margin-right: 16px; margin-left: 80px;" class="maincart-list-item-quantity">
                        <b>Số lượng:</b>
                        <div class="quantity">
                            <input disabled type="text" name="number" class="quantity-item number" value=<?=$this->e($product->pivot->quantity)?>>
                        </div>
                    </div>
                    <div class="maincart-list-item-price order-list-item-price">
                        <div>
                            <b>Giá:</b>
                        </div>
                        <span class="order-list-price"><?=$this->e($product->price)?></span><span style="display: none"><?=$this->e($product->price)?></span>
                    </div>
                    <div style="display: none;"><?=$this->e($product->id)?></div>
                </div>
            <?php endforeach; ?>
           
        </div>
        
        <div class="maincart-info orderdetail-info">
            <hr style="margin: 32px 0;">
            <ul>
                <li class="">
                    <span>Thời gian đặt hàng: </span>
                    <span>
                        <span><?= $this->e($order->created_at['day'])?>/<?= $this->e($order->created_at['month'])?>/<?= $this->e($order->created_at['year'])?></span>
                        <span><?= $this->e($order->created_at['hours'])?>:<?= $this->e($order->created_at['minutes'])?>:<?= $this->e($order->created_at['seconds'])?></span>
                    </span>
                </li>
                <li class=""><span>Địa chỉ nhận hàng: </span><span><?= $this->e($order->addr)?></span></li>
                <li class="total-bf-voucher"><span>Tổng cộng: </span><span></span></li>
                <li class="ship-code"><span>Phí ship: </span><span>0đ</span></li>
                <li class="voucher-applied">
                    <div>
                        <span >Mã giảm giá: </span>
                    </div>
                    <span class="pesudoApplied"><?php if($order->vouchers) echo '-'.$order->vouchers->sale; else echo 0;?></span>
                    <span style="display: none"><?php if($order->vouchers) echo '-'.$order->vouchers->sale; else echo 0; ?></span>
                </li>
                <li class="status"><span>Trạng thái đơn hàng: </span><span class="<?='orderstatus-'.$this->e($order->orderstatus->id)?>"><?=$this->e($order->orderstatus->status)?></span></li>
            </ul>

            <div style="display: flex; margin-top: 38px; justify-content: flex-end;">
                <div class="total">
                    <span  class="text-center">Tổng thanh toán: </span>
                    <span  class="text-center"></span>
                </div>
            </div>

        </div>

    </div>

</div>


<?php $this->push('scripts') ?>
<script>

    $(document).ready(()=>{

        $('.order-list-item-price .order-list-price').each((i,e)=>{
            e.innerHTML = currencyFormatting(parseInt(e.innerHTML))
        })

        $('.maincart-info .ship-code').children().last().text(currencyFormatting(0)) 

        totalCalculation()
            
        var productsOrder = $('.products-order');
        var i=0
        $('.maincart-list-item').each((i,e)=>{
            productsOrder.append(`<input type="number" name="products[${i}][id]" id="" value="${$(e).children().last().text()}">`)
            productsOrder.append(`<input type="number" name="products[${i++}][quantity]" id="" value="${$(e).find('.number').val()}">`)
        })

        $('.cart-form .cart-form-voucher-id').val($('.voucher-applied>span.voucher-id').text())
    })

</script>
<?php $this->end() ?>