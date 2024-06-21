<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php 
    require __DIR__.'/../app/phphelper.php';

    $this->layout('layouts/main', ['cssLink'=>'/css/cart.css','title' => 'Giỏ hàng', 'pagemess'=>$pagemess]) 

?>

<div class="maincart-container">
    <div style="display: flex;">
        <div class="back-btn"><a href="/sanpham"><i class="fa fa-angle-left"></i> Trở về</a></div>
        <div class="breadcrumb">
            <span><a href="/"> Den Coffee</a></span>
            <span><a href="/giohang"> Giỏ hàng</a></span>
        </div>
    </div>
    
    <div class="label">
       <div>
            <div class="maincart-list-label">
                <img src="/imgs/icons/cart.png" height="60" alt="maincart">
                <span style="margin-left: -16px;">Giỏ hàng</span>
            </div>
       </div>
    </div>

    <div class="maincart-list-container">
        <img class="nomaincart" src="/imgs/nocart.png" alt="nomaincart">
        <div class="product-btn">
            <a href="/sanpham">Đặt hàng ngay</a>
        </div>

        <div class="maincart-list">

           
        </div>

        
        <div class="maincart-info">
            <hr style="margin: 32px 0;">
            <div style="display: flex; align-items: center; margin-bottom: 32px;">
                <form class="vouchers" action="/magiamgia" method="post">
                    <span class="text-center">Mã giảm giá</span>
                    <input type="text" name="vouchercode" value="<?php if(isset($_SESSION['code'])) echo $_SESSION['code'];?>">
                    <input name="submit" type="submit" class="apply-btn" value="Áp dụng"></input>
                </form>
            </div>
            <ul>
                <li class="total-bf-voucher"><span>Tổng cộng: </span><span>100000</span></li>
                <li class="ship-code"><span>Phí ship: </span><span>0đ</span></li>
                <li class="voucher-applied">
                    <div>
                        <span >Mã giảm giá: </span>
                        <span style="margin-left: 8px;"><?php if(isset($_SESSION['code'])) echo $_SESSION['code'];?></span>
                    </div>
                    <span class="voucher-id" style="display: none;"><?php if(isset($_SESSION['vouid'])) echo $_SESSION['vouid']; else echo '-1'; ?></span>
                    <span class="pesudoApplied"><?php if(isset($_SESSION['sale'])) echo '-'.$_SESSION['sale']; else echo 0;?></span>
                    <span style="display: none"><?php if(isset($_SESSION['sale'])) echo '-'.$_SESSION['sale']; else echo 0; ?></span>
                </li>
            </ul>

            <div class="pay-option" style="display: flex; margin-top: 38px;">
                <div>
                    <label for="">Địa chỉ nhận hàng: </label>
                    <input class="addr-input" name="addr" type="text" placeholder="Nhập địa chỉ...">
                </div>

                <div style="margin-left: 16px;">
                    <label for="">Hình thức thanh toán: </label>
                    <select class="pay-option-input" name="pay-option" id="">
                        <option value="">Trả tiền mặt khi nhận hàng</option>
                        <option value="">Thanh toán qua ví MOMO</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; margin-top: 38px; justify-content: flex-end;">
                <div class="total">
                    <span  class="text-center">Tổng thanh toán: </span>
                    <span  class="text-center">900000</span>
                </div>
                <input name="submit" class="pay-btn" type="submit" value="Đặt hàng"></input>
            </div>

        </div>

    </div>

    <form class="cart-form" action="/thanhtoan" method="post" style="display: none;">
        <input type="text" name="userid" id="" value="<?php if(isLogIn()) echo $_SESSION['user']['id']?>">
        
        <div class="products-order"></div>

        <input class="cart-form-voucher-id" name="voucher-id" type="text" id="">
        <input class="cart-form-addr" name="addr" type="text" id="">

    </form>

</div>


<?php $this->push('scripts') ?>
<script>

    var cartStatusHandle=()=>{
        var nomaincartImg = $('.maincart-list-container img.nomaincart')
        var toProductBtn = $('.maincart-list-container .product-btn')
        var mainCartInfo = $('.maincart-info')
        if(nocart()){
            nomaincartImg.show()
            nomaincartImg.css('display', 'block')
            toProductBtn.show()

            mainCartInfo.hide()
        }
        else{
            nomaincartImg.hide()
            toProductBtn.hide()

            mainCartInfo.show()
        }
    }

    var showMainCarList = () => {
        var mainCartListContainer=$('.maincart-list')
        mainCartListContainer.html('')
        var cartList = JSON.parse(window.localStorage.getItem('cart'))
        cartList.forEach((e) => {

            let item = `<div id="${e.id}" class="maincart-list-item">
                <img src="${e.url}" alt="item gio hang">
                <div style="margin-left: 32px; width: 200px">
                    <div class="maincart-list-item-name">${e.name}</div>
                    <div class="maincart-list-item-type"><b>Phân loại: </b><span>${e.type}</span></div>
                </div>
                <div class="maincart-list-item-quantity">
                    <b>Số lượng:</b>
                    <div class="quantity">
                        <input type="text" name="number" class="quantity-item number" value="${e.quantity}">
                        <div class="options">
                            <div class="quantity-item plus">+</div>
                            <div class="quantity-item minus">-</div>
                        </div>
                    </div>
                </div>
                <div class="maincart-list-item-price"><div>
                    <b>Giá:</b>
                    </div>
                        <span>${currencyFormatting(e.price)}</span><span style="display: none">${e.price}</span>
                        </div>
                <div class="maincart-list-item-deleting">&Chi;</div>
                <div style="display: none;">${e.id}</div>
            </div>`

            mainCartListContainer.append(item)
        })
    }


    $(document).ready(()=>{

        $('.maincart-info .ship-code').children().last().text(currencyFormatting(0)) 
        

        cartStatusHandle()
        showMainCarList()
        quantityOptionHandel()

        var cartDeletingBtn = $('.cart-list-item .deleting')
        var mainCartDeletingBtn = $('.maincart-list-item-deleting')
        var mainCartList = $('.maincart-list')
        var miniCartList = $('.cart-list')
        var id

        cartDeletingBtn.on('click',(e)=>{
            cartStatusHandle()
            id = $(e.currentTarget)[0].nextElementSibling.innerHTML
    
            mainCartList.children(`.maincart-list-item[id=${id}]`).remove()
            totalCalculation()
        })

        mainCartDeletingBtn.click((e)=>{
            cartDeleting(e)
            cartStatusHandle()

            id = $(e.currentTarget)[0].nextElementSibling.innerHTML
    
            miniCartList.children(`.cart-list-item[id=${id}]`).remove()
            totalCalculation()
        })

        totalCalculation()
            
       

        $('.pay-btn').click((e)=>{
            var productsOrder = $('.products-order');
            var i=0
            $('.maincart-list-item').each((i,e)=>{
                productsOrder.append(`<input type="number" name="products[${i}][id]" id="" value="${$(e).children().last().text()}">`)
                productsOrder.append(`<input type="number" name="products[${i++}][quantity]" id="" value="${$(e).find('.number').val()}">`)
            })

            $('.cart-form .cart-form-voucher-id').val($('.voucher-applied>span.voucher-id').text())
            
            if(!$('.cart-form').children().first().val()){
                alert("Vui lòng đăng nhập để thanh toán!")
                e.preventDefault()
                e.stopPropagation()
            }
            else if (!$('.addr-input').val()){
                alert("Vui lòng nhập địa chỉ nhận hàng!")
                e.preventDefault()
                e.stopPropagation()
            }
            else{
                $('.cart-form-addr').val($('.addr-input').val())
                $('.cart-form').submit()
            }
        })
        

    })
</script>
<?php $this->end() ?>