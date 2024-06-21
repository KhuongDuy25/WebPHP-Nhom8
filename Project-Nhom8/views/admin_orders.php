<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div style="flex-direction: column;" class="admin-orders-container container-fluid d-flex justify-content-center">
    <h3>Quản lý đơn hàng</h3>
    <hr>

    <table class="table">
    <thead class="table-dark">
        <td>Khách hàng</td>
        <td>Thời gian đặt</td>
        <td>Địa chỉ nhận hàng</td>
        <td>Tổng cộng</td>
        <td>Trạng thái</td>
        <td></td>
        <td></td>
    </thead>
    <tbody>
        <?php foreach($data as $order): ?>
        <tr class="order">
            <td><?=$this->e($order->users->username)?></td>
            <td >
                <span>
                    <span><?= $this->e($order->created_at['day'])?>/<?= $this->e($order->created_at['month'])?>/<?= $this->e($order->created_at['year'])?></span>
                    <span><?= $this->e($order->created_at['hours'])?>:<?= $this->e($order->created_at['minutes'])?>:<?= $this->e($order->created_at['seconds'])?></span>
                </span>
            </td>
            <td class="addr"><?=$this->e($order->addr)?></td>
            <td class="order-total"><?=$this->e($order->sum)?></td>
            <td>
                <select id="ord-status" class="ord-status form-select" aria-label="Default select example">
                    <option value="1">Đang chờ</option>
                    <option value="2">Đã nhận</option>
                    <option value="3">Đang giao</option>
                    <option value="4">Đã giao</option>
                    <option value="5">Không thể nhận</option>
                </select>
                <div style="display:none;" class="status"><?=$this->e($order->orderstatus->id)?></div>
            </td>
            <td>
                <button class="p-1 btn btn-success"><a href=<?="/admin/chitietdonhang?oid=".$order->id?>>Chi tiết</a></button>
            </td>
            <td style="display: none;"><div class="oid"><?=$this->e($order->id)?></div></td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>

</div>

<?php $this->push('scripts') ?>
<script>
    
    $(document).ready(()=>{

        $('.order').each((i,e)=>{
            $(e).find('.order-total').text(currencyFormatting($(e).find('.order-total').text()))

            status = $(e).find('.status').text()
            $(e).find(`.ord-status option[value=${status}]`).attr('selected', 'selected')

            
            var currStatus=status
            $(e).find(`.ord-status`).addClass('orderstatus-'+currStatus)
            $(e).find(`.ord-status`).change(function(){

                $(this).removeClass('orderstatus-'+currStatus)
                $(this).addClass('orderstatus-'+$(this).val())
                currStatus=$(this).val()

                oid = $(e).find('.oid').text()
                window.location.href=`/admin/quanlydonhang/doitrangthai?page=orderslist&oid=${oid}&status=${currStatus}`
            })
        })

    })

</script>
<?php $this->end() ?>