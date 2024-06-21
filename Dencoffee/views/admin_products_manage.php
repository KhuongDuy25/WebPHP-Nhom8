<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}

$i=1
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div style="flex-direction: column;" class="admin-prdmanage-container container-fluid d-flex justify-content-center">
    <h3>Quản lý sản phẩm</h3>
    <hr>

    <div class="d-flex justify-content-end align-items-center mb-2 manage-option">
        <div class="">Phân loại: </div>
        <select class="prd-type-fill form-select" aria-label="Default select example">
            <option value="0">Tất cả</option>
            <option value="1">Cà phê</option>
            <option value="2">Bánh ngọt</option>
            <option value="3">Đồ uống khác</option>
        </select>
        <button class="typ-fill-submit p-1 px-4 me-4 btn btn-info text-white">Lọc</button>
        <button class="p-1 me-4 btn btn-primary"><a href="/admin/capnhatsanpham/them">Thêm +</a></button>
    </div>

    <table class="table">
    <thead class="table-dark">
        <td>#</td>
        <td></td>
        <td>Tên sản phẩm</td>
        <td>Phân loại</td>
        <td>Giá</td>
        <td></td>
    </thead>
    <tbody>
        <?php foreach($data as $prd): ?>
        <tr class="prd-row">
            <td><?=$i++?></td>
            <td><img src=<?='/imgs/products/'.$prd->main_image?> alt=""></td>
            <td style="max-width: 160px;"><?=$prd->name?></td>
            <td style="min-width:140px;"><?=$prd->producttype->type?></td>
            <td class="prd-price"><?=$prd->price?></td>
            <td style="max-width:120px;">
                <button class="p-1 btn btn-success"><a href=<?="/admin/capnhatsanpham/sua?pid=".$prd->id?>>Sửa</a></button>
                <form class="prd-removing-form" style="display: inline-block;" action="/admin/capnhatsanpham/xoa" method="POST">
                    <input style="display: none;" type="number" name="pid" value="<?=$prd->id?>">
                    <button class="p-1 btn btn-danger prd-removing-btn" type="submit" name="submit"><a>Xóa</a></button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>


</div>

<?php $this->push('scripts') ?>
<script>
    $(document).ready(()=>{

        $('.prd-row .prd-price').each((i,e)=>{
        e.innerHTML = currencyFormatting(parseInt(e.innerHTML))
        })

        $('.typ-fill-submit').click(()=>{
            window.location.href=window.location.pathname+'?typefill='+$('.prd-type-fill').val()
        })

        const params = new URLSearchParams(window.location.search)
        $(`.prd-type-fill option[value=${params.get('typefill')}]`).attr('selected', 'selected')

        $('.prd-removing-btn').click((e)=>{
            var deletingConfirm = confirm('Bạn chắc chắc muốn xóa sản phẩm?');
            if(deletingConfirm) $(e.currentTarget).parent().submit();
            else{
                e.preventDefault();
                e.stopPropagation();
            }
        })

    })


</script>
<?php $this->end() ?>