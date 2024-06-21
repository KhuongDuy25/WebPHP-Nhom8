<?php $this->layout('layouts/main', ['cssLink'=>'/css/intro.css','title' => 'Giới thiệu']) ?>

<div class="intro-container">
    <div class="intro-start">
        <img src="/imgs/logo.png" alt="">
        <div class="intro-start-text"><h2>Về chúng tôi</h2></div>
    </div>

    <div class="intro-article article-reverse">
        <div class="intro-article-img">
            <img src="/imgs/intro/intro0.png" alt="intro image">
        </div>
        <div class="intro-article-text-container">
            <div class="intro-article-lable"><h2><b>Câu chuyện của Den coffee</b></h2></div>
            <div class="intro-article-text">
                Được xây dựng dựa trên ý tưởng mong muốn đem văn hóa cà phê đến với mọi người. Cà phê là hương vị của trải nghiệm cuộc sống, hương vị của sự thử thách, đương đầu. Một quán cà phê là nơi tuyệt vời để bắt đầu các mối quan hệ!
            </div>
        </div>
    </div>

    <div class="intro-quantity">
        <div class="intro-quantity-item">
            <img src="/imgs/icons/coffee.png" alt="">
            <div>
                <div class="intro-quantity-number">0</div>
                <div class="quantity-value-hide"><?=$this->e($quantity[0])?></div>
                <p class="intro-quantity-name">Loại cà phê</p>
            </div>
    
        </div>
    
        <div class="intro-quantity-item">
            <img src="/imgs/icons/cake.png" alt="">
            <div>
                <div class="intro-quantity-number">0</div>
                <div class="quantity-value-hide"><?=$this->e($quantity[1])?></div>
                <p class="intro-quantity-name">Loại bánh ngọt</p>
            </div>
        </div>
    
        <div class="intro-quantity-item">
            <img src="/imgs/icons/drinking.png" alt="">
            <div>
                <div class="intro-quantity-number">0</div>
                <div class="quantity-value-hide"><?=$this->e($quantity[2])?></div>
                <p class="intro-quantity-name">Loại đồ uống khác</p>
            </div>
        </div>
    
        <div class="intro-quantity-item">
            <img src="/imgs/icons/phone.png" alt="">
            <div>
                <div class="intro-quantity-number">0</div>
                <div class="quantity-value-hide"><?=$this->e($quantity[3])?></div>
                <p class="intro-quantity-name">Góc sống ảo</p>
            </div>
        </div>
    </div>

    <div class="intro-article">
        <div class="intro-article-img">
            <img src="/imgs/intro/intro1.png" alt="intro image">
        </div>
        <div class="intro-article-text-container">
            <div class="intro-article-lable"><h2><b>Cà phê</b></h2></div>
            <div class="intro-article-text">
                Den Coffee phục vụ đa dạng các loại cà phê phổ biến trên thị trường hiện nay, phù hợp với sở thích của mọi người, đặc biệt là các bạn trẻ. Ở đây, chúng tôi có Espresso, Espresso Macchiato, Latte, Flat White, Cappucchino, Mocha,... và còn nhiều loại cà phê khác đang chờ bạn thưởng thức.
            </div>
        </div>
    </div>

    <div class="slides image-slide">
        <div style="background-color: #000; opacity: .6; position: absolute; width: 100%; height: 100%;"></div>
    
        <div style="height: 100%; display: flex; align-items: center;">
            <div class="slide-previous-btn"><i class="fa fa-angle-left"></i></div>
            <div class="slide-container">
    
                <?php foreach($productsData->coffee as $product): ?>
                    <div class="slides-item">
                        <div class="slide-item-content">
                            <div class="slide-item-name"><?=$this->e($product->name)?></div>
                            <img src="<?='/imgs/products/'.$this->e($product->main_image)?>" alt="slide image"> 
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="slide-next-btn"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>

    <div class="intro-article article-reverse">
        <div class="intro-article-img">
            <img src="/imgs/intro/intro2.png" alt="intro image">
        </div>
        <div class="intro-article-text-container">
            <div class="intro-article-lable"><h2><b>Bánh ngọt</b></h2></div>
            <div class="intro-article-text">
                Den Coffee cũng phục vụ các loại bánh ngọt ăn kèm cafe được mọi người yêu thích, đặc biệt là các bạn trẻ: bánh cua bơ ngọt, bánh quế cuộn, bánh kem phô-mai Đan Mạch, bánh pho mát nguyên kem, bánh dâu nguyên kem, bánh bơ việt quốc, bánh bông lan kem bơ,...
            </div>
        </div>
    </div>

    <div class="slides image-slide">
        <div style="background-color: #000; opacity: .6; position: absolute; width: 100%; height: 100%;"></div>
    
        <div style="height: 100%; display: flex; align-items: center;">
            <div class="slide-previous-btn"><i class="fa fa-angle-left"></i></div>
            <div class="slide-container">

                <?php foreach($productsData->cake as $product): ?>
                    <div class="slides-item">
                        <div class="slide-item-content">
                            <div class="slide-item-name"><?=$this->e($product->name)?></div>
                            <img src="<?='/imgs/products/'.$this->e($product->main_image)?>" alt="slide image">
                        </div>
                    </div>
                <?php endforeach; ?>
    
            </div>
            <div class="slide-next-btn"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>

    <div class="intro-article">
        <div class="intro-article-img">
            <img src="/imgs/intro/intro3.png" alt="intro image">
        </div>
        <div class="intro-article-text-container">
            <div class="intro-article-lable"><h2><b>Các loại nước uống khác</b></h2></div>
            <div class="intro-article-text">
                Den Coffee cũng phục vụ bạn các loại đồ uống khác ngoài cà phê, từ các loại đồ uống có gas như: Coca, Pepsi, 7 Up,... cho đến các loại sinh tố như: dừa, bơ , xoài, dâu, cà phua, ...
            </div>
        </div>
    </div>

    <div class="slides image-slide">
        <div style="background-color: #000; opacity: .6; position: absolute; width: 100%; height: 100%;"></div>
    
        <div style="height: 100%; display: flex; align-items: center;">
            <div class="slide-previous-btn"><i class="fa fa-angle-left"></i></div>
            <div class="slide-container">

                <?php foreach($productsData->drinking as $product): ?>
                    <div class="slides-item">
                        <div class="slide-item-content">
                            <div class="slide-item-name"><?=$this->e($product->name)?></div>
                            <img src="<?='/imgs/products/'.$this->e($product->main_image)?>" alt="slide image"> 
                        </div>
                    </div>
                <?php endforeach; ?>
    
            </div>
            <div class="slide-next-btn"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>

    <div class="intro-article article-reverse">
        <div class="intro-article-img">
            <img src="/imgs/intro/intro4.png" alt="intro image">
        </div>
        <div class="intro-article-text-container">
            <div class="intro-article-lable"><h2><b>Góc sống ảo</b></h2></div>
            <div class="intro-article-text">
                Den Coffee còn là nơi để các bạn trẻ thỏa sức sống ảo với nhiều không gian đẹp, thích hợp để chụp ảnh.
            </div>
        </div>
    </div>

    <div class="slides image-slide">
        <div style="background-color: #000; opacity: .6; position: absolute; width: 100%; height: 100%;"></div>
    
        <div style="height: 100%; display: flex; align-items: center;">
            <div class="slide-previous-btn"><i class="fa fa-angle-left"></i></div>
            <div class="slide-container">

                <?php foreach($productsData->storeImage as $product): ?>
                    <div class="slides-item">
                        <div class="slide-item-content">
                            <img src="<?='/imgs/storeimgs/'.$this->e($product->url)?>" alt="slide image"> 
                        </div>
                    </div>
                <?php endforeach; ?>
    
            </div>
            <div class="slide-next-btn"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>



</div>


<?php $this->push('scripts') ?>
<script>

    $(document).ready(() => {
        var iamgeSlides = $('.slides.image-slide')
        iamgeSlides.each((i,e)=>{
            slide($(e), 5000)
        })

        quantityShowHandle($('.intro-quantity'),200,150)
    })

</script>
<?php $this->end() ?>