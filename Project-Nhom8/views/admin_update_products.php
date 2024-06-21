<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div style="flex-direction: column;" class="admin-updateproduct-container container-fluid d-flex justify-content-center">
    <h3>Cập nhật sản phẩm</h3>
    <hr>
    <form class="container mb-5" action="/admin/capnhatsanpham/sua" enctype="multipart/form-data" method="POST"> 
        <div class="mb-3">
            <label for="prd-name" class="form-label">Tên sản phẩm</label>
            <input name="name" type="text" class="form-control" id="prd-name" value="<?=$this->e($data->name)?>">
        </div>
        <div class="mb-3">
            <label for="prd-type" class="form-label">Phân loại</label>
            <select name="type" id="prd-type" class="prd-type form-select" aria-label="Default select example">
                <option value="1">Cà phê</option>
                <option value="2">Bánh ngọt</option>
                <option value="3">Đồ uống khác</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="prd-price" class="form-label">Giá</label>
            <input name="price" type="number" class="form-control" id="prd-price" value="<?=$this->e($data->price)?>">
        </div>
        <div class="mb-3">
            <label for="prd-descript" class="form-label">Mô tả</label>
            <textarea rows="5" name="descript" class="form-control" id="prd-descript"><?=$this->e($data->descript)?></textarea>
        </div>

        <div class="updateimg-check mb-3 form-check form-switch" data-bs-toggle="collapse" data-bs-target="#imginput">
            <input name="updateimg-check" class="form-check-input" type="checkbox" role="switch" id="updateimg">
            <label class="form-check-label" for="updateimg">Sửa hình ảnh sản phẩm</label>
        </div>

       <div id="imginput" class="collapse">
            <div class="mb-3">
                <label for="prd-mainimg" class="form-label">Hình ảnh chính</label>
                <input name="mainimg" type="file" class="form-control" id="prd-mainimg">
            </div>
            <div class="d-flex justify-content-between">
                <div style="display: inline-block; width: 30%;" class="mb-3">
                    <label for="prd-img1" class="form-label">Hình ảnh khác</label>
                    <input name="img1" type="file" class="form-control" id="prd-img1">
                </div>
                <div style="display: inline-block; width: 30%;" class="mb-3">
                    <label for="pprd-img2" class="form-label">Hình ảnh khác</label>
                    <input name="img2" type="file" class="form-control" id="prd-img2">
                </div>
                <div style="display: inline-block; width: 30%;" class="mb-3">
                    <label for="prd-img3" class="form-label">Hình ảnh khác</label>
                    <input name="img3" type="file" class="form-control" id="prd-img3">
                </div>
            </div>
       </div>
        <button type="submit" name="submit" class="btn btn-primary px-4">Cập nhật</button>
        <div style="display: none;" class="product-type"><?=$this->e($data->producttype_id)?></div>
        <input name="id" style="display: none;" value="<?=$this->e($data->id)?>">
    </form>

</div>

<?php $this->push('scripts') ?>
<script>
    
    $(document).ready(()=>{
        type = $('.product-type').text()
        $(`.prd-type option[value=${type}]`).attr('selected', 'selected')
    })

</script>
<?php $this->end() ?>