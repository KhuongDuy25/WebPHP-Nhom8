<?php $this->layout('layouts/main', ['cssLink'=>'/css/product-item.css','title' => 'Chi tiết sản phẩm']) ?>

<div class="product-info">
    <div style="display: flex;">
        <div class="back-btn"><a href="/sanpham"><i class="fa fa-angle-left"></i> Trở về</a></div>
        <div class="breadcrumb">
            <span><a href="/"> Den Coffee</a></span>
            <span><a href="/sanpham"> Sản phẩm</a></span>
            <span><a href="#"> <?= $this->e($productData->productData->name) ?></a></span>
        </div>
    </div>

    <div class="product-text">
        <div class="product-images">
            <div class="main-image">
                <img src="<?= '/imgs/products/'.$this->e($productData->productData->main_image) ?>" alt="anh san pham">
            </div>
            <div class="other-image">
               
                <?php foreach($productData->subImageData as $subImage): ?>
                    <a target="_blank" href="<?='/imgs/products/'.$subImage->url?>"><img src="<?='/imgs/products/'.$subImage->url?>" alt="anh san pham"></a>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="product-detail">
            <div class="name"><b><?= $this->e($productData->productData->name) ?></b></div>
            <div class="price"><?= $this->e($productData->productData->price) ?></div>
            <span style="display: none"><?= $this->e($productData->productData->price) ?></span>
            <div><b>Phân loại: </b><span class="type"><?= $this->e($productData->productData->producttype->type) ?></span></div>
            <div><b>Mô tả:</b></div>
            <div class="descript">
                <?= $this->e($productData->productData->descript) ?>
            </div>
            <div style="display: flex;">
                <div><b>Share:</b></div>
                <div class="share">
                    <ul class="share-icons">
                        <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <div><b>Số lượng:</b></div>
            <div style="display: flex;">
                <div class="quantity">
                    <input type="text" name="number" class="quantity-item number" value="1">
                    <div class="options">
                        <div class="quantity-item plus">+</div>
                        <div class="quantity-item minus">-</div>
                    </div>
                </div>
                <div class="order-btn"><a href="#">Thêm vào giỏ hàng</a></div>
            </div>
        </div>
    </div>
    <div class="id" style="display: none;"><?= $_GET['id'] ?></div>
    </form>
</div>

<?php $this->push('scripts') ?>
<script>

    var order = (id, url, name, type, price, quantity) => {
        var item = { id: id, url: url, name: name, type: type, price: price, quantity: quantity }

        var maincartList = JSON.parse(window.localStorage.getItem('cart'))

        var flag = false
        maincartList.forEach((e, i) => {
            if (e.id == id) {
                flag = true
                maincartList[i].quantity += quantity
            }
        })

        if (!flag) maincartList.push(item)
        window.localStorage.setItem('cart', JSON.stringify(maincartList))

        oderCarListHandle()
        showCarList()
    }

    $(document).ready(()=>{

        $('.product-detail .price').text(currencyFormatting(parseInt($('.product-detail .price').text())))

        $('.order-btn').click(()=>{
            let id = $('.id').text()
            let urlImage = $('.product-images .main-image img').prop('src')
            let name = $('.product-detail .name').text()
            let type = $('.product-detail .type').text()
            let price = parseInt($('.product-detail .price+span').text())
            let quantity = parseInt($('.quantity-item.number').val())

            order(id, urlImage, name, type, price, quantity)
            cartHandle()

            alert("Bạn đã thêm một sản phẩm vào giỏ hàng");
        })


        quantityOptionHandel()

    })
</script>
<?php $this->end() ?>