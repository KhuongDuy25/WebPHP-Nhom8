<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/main', ['cssLink'=>'/css/home.css','title' => 'Trang chủ', 'pagemess'=>$pagemess]) ?>


<div class="home-container">

    <div class="home-start">
        <div class="home-start-text">
            <h2>Den Coffee</h2>
            <h3>Cà phê tươi cho những ý tưởng mới</h3>
        </div>
    </div>

    <div class="home-label">Ưu đãi của Den Coffee</div>

    <div class="slides intro-slide">
        <div style="background-color: #000; opacity: .8; position: absolute; width: 100%; height: 100%; z-index: 0;">
        </div>

        <div style="height: 100%; display: flex; align-items: center;">
            <div class="slide-previous-btn"><i class="fa fa-angle-left"></i></div>

            <div class="slide-container">

                <?php foreach($Promotions as $promotion): ?>
                    <div class="slides-item">
                        <div class="slide-item-content">
                            <img src="<?=$this->e($promotion->url)?>" alt="slide image">
                            <div class="slide-text">
                                <?=$this->e($promotion->text).'<br><br> Nhập ngay mã:<br>'.$this->e($promotion->code)?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                

            </div>
            <div class="slide-next-btn"><i class="fa fa-angle-right"></i></div>
        </div>

    </div>

    <div class="home-label">Chúng tôi có gì</div>

    <div class="home-intro">
        <div class="home-intro-item">
            <img src="/imgs/home/home-intro1.png" alt="">
            <div>
                <b>Cà phê</b>
                <p>Nhiều loại cà phê được phục vụ tại quán</p>
            </div>
        </div>
        <div class="home-intro-item">
            <img src="/imgs/home/home-intro2.png" alt="">
            <div>
                <b>Bánh ngọt</b>
                <p>Nhiều loại bánh ngọt để ăn kèm</p>
            </div>
        </div>
        <div class="home-intro-item">
            <img src="/imgs/home/home-intro3.png" alt="">
            <div>
                <b>Tại chỗ & mang đi</b>
                <p>Dùng tại chỗ và mang đi đều không phải lo</p>
            </div>
        </div>
        <div class="home-intro-item">
            <img src="/imgs/home/home-intro4.png" alt="">
            <div>
                <b>Không gian</b>
                <p>Một nơi phù hợp để uống cà phê, họp mặt, làm việc</p>
            </div>
        </div>
    </div>

    <div class="home-label">Một số hình ảnh</div>

    <div class="slides image-slide">
        <div style="background-color: #000; opacity: .6; position: absolute; width: 100%; height: 100%;"></div>
    
        <div style="height: 100%; display: flex; align-items: center;">
            <div class="slide-previous-btn"><i class="fa fa-angle-left"></i></div>
            <div class="slide-container">

                <?php foreach($storeImages as $storeImage): ?>
                    <div class="slides-item">
                        <div class="slide-item-content">
                            <img src="<?=$this->e($storeImage->url)?>" alt="slide image">
                        </div>
                    </div>
                <?php endforeach; ?>
    
            </div>
            <div class="slide-next-btn"><i class="fa fa-angle-right"></i></div>
    
        </div>
    
    </div>
</div>

<div class="home-quantity">
    <div class="home-quantity-item">
        <img src="/imgs/icons/coffee.png" alt="">
        <div>
            <div class="home-quantity-number">0</div>
            <div class="quantity-value-hide"><?=$this->e($quantity[0])?></div>
            <p class="home-quantity-name">Loại cà phê</p>
        </div>

    </div>

    <div class="home-quantity-item">
        <img src="/imgs/icons/cake.png" alt="">
        <div>
            <div class="home-quantity-number">0</div>
            <div class="quantity-value-hide"><?=$this->e($quantity[1])?></div>
            <p class="home-quantity-name">Loại bánh ngọt</p>
        </div>
    </div>

    <div class="home-quantity-item">
        <img src="/imgs/icons/drinking.png" alt="">
        <div>
            <div class="home-quantity-number">0</div>
            <div class="quantity-value-hide"><?=$this->e($quantity[2])?></div>
            <p class="home-quantity-name">Loại đồ uống khác</p>
        </div>
    </div>

    <div class="home-quantity-item">
        <img src="/imgs/icons/phone.png" alt="">
        <div>
            <div class="home-quantity-number">0</div>
            <div class="quantity-value-hide"><?=$this->e($quantity[3])?></div>
            <p class="home-quantity-name">Góc sống ảo</p>
        </div>
    </div>
</div>


</div>


<?php $this->push('scripts') ?>
<script>

    $(document).ready(() => {
        var introSlide=$('.slides.intro-slide')
        var iamgeSlide=$('.slides.image-slide')

        slide(introSlide,8000)
        slide(iamgeSlide,5000)

        quantityShowHandle($('.home-quantity'),100,150);
        
    })

    

</script>
<?php $this->end() ?>