<?php 
    require __DIR__.'/../app/phphelper.php';
    $this->layout('layouts/main', ['cssLink'=>'/css/products.css','title' => 'Sản phẩm']);

    $sumPage=$this->e($productsData['sumPage']);
?>

<h3 class="page-title">Sản phẩm của Den Coffee</h3>

<div class="product-menu">
    <div class="labels">
        <ul>
            <li class="coffee-list">
                <a href="/sanpham?type=caphe&page=1">
                    <img src="/imgs/icons/coffee.png" height="60" alt="coffee">
                    <span>Cà phê</span>
                </a>
            </li>
            <li class="cake-list">
                <a href="/sanpham?type=banhngot&page=1">
                    <img src="/imgs/icons/cake.png" height="50" alt="cake">
                    <span>Bánh ngọt</span>
                </a>
            </li>
            <li class="drinking-list">
                <a href="/sanpham?type=douongkhac&page=1">
                    <img src="/imgs/icons/drinking.png" height="50" alt="drinking">
                    <span>Thức uống khác</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="products-content">
        <div class="products-list">

            <?php foreach($productsData['products'] as $product): ?>
                <div class="products-list-item">
                    <a href="<?= '/sanpham/chitiet?id='.$this->e($product->id) ?>">
                        <div class="products-card">
                            <div class="product-img">
                                <img src="<?= '/imgs/products/'.$this->e($product->main_image) ?>" alt="anh san pham">
                            </div>
                            <p class="name"><?=$this->e($product->name)?></p>
                            <p class="price"><?=$this->e($product->price)?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

            
           
        </div>

        <div class="pagination">
            <a href=""><div class="pagination-item pagination-previous"><i class="fa fa-angle-left"></i></div></a>
            
            <?php for($i=1; $i<=$sumPage; $i++): ?>
                <a href="<?= '/sanpham?type='.$_GET['type'].'&page='.$i ?>"><div class="pagination-item"><?= $i ?></div></a>
            <?php endfor; ?>

            <a href=""><div class="pagination-item pagination-next"><i class="fa fa-angle-right"></i></div></a>
        </div>

        <h3 class="products-adv">Ưu đãi của Den Coffee</h3>

        <div class="adv-slides">
           
            <?php foreach($promotions as $promotion): ?>
                <div class="adv-slides-item">
                    <img src="<?= $this->e($promotion->url) ?>" alt="slide image">
                    <span class="adv-item-text">
                        <?=$this->e($promotion->text).'<br><br> Nhập ngay mã: '.$this->e($promotion->code)?>
                    </span>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="type" style="display: none"><?= $_GET['type'] ?></div>
    <div class="sumpage" style="display: none"><?= $sumPage ?></div>
</div>

    <?php $this->push('scripts') ?>
    <script>
        $(document).ready(()=>{
            $('.products-list-item .price').each((i,e)=>{
                $(e).text(currencyFormatting(parseInt($(e).text())))
            })

            $('.adv-slides .adv-slides-item:not(div:first-child)').hide()
            setInterval(()=>{
                $('.adv-slides .adv-slides-item').hide()
                $($('.adv-slides .adv-slides-item')[0]).appendTo($('.adv-slides'))
                $($('.adv-slides .adv-slides-item')[0]).fadeIn(1000)
            },8000)
        
            var type = $('.type').text()
            switch(type){
                case 'caphe':
                    $('.coffee-list').addClass('labels-active')
                    break
                case 'banhngot':
                    $('.cake-list').addClass('labels-active')
                    break
                case 'douongkhac':
                    $('.drinking-list').addClass('labels-active')
                    break
            }

            var page = parseInt(new URLSearchParams(window.location.search).get('page'))
            $('.pagination-item').each((i,e)=>{
                if($(e).text()==page) $(e).addClass('pagination-active')
            })
            
            if(page>1) $('.pagination-previous').parent().prop('href',`/sanpham?type=${type}&page=${page-1}`)
            else{
                $('.pagination-previous').parent().removeAttr('href')
                $('.pagination-previous').addClass('pagination-disable')
            }
            if(page<$('.sumpage').text()) $('.pagination-next').parent().prop('href',`/sanpham?type=${type}&page=${page+1}`)
            else{
                $('.pagination-next').parent().removeAttr('href')
                $('.pagination-next').addClass('pagination-disable')
            }
        })


    </script>
    <?php $this->end() ?>