<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div style="flex-direction: column;" class="admin-feedbacks-container container-fluid d-flex justify-content-center">
    <h3>Phản hồi</h3>
    <hr>

    <table class="table">
    <thead class="table-dark">
        <td>Thời gian phản hồi</td>
        <td>Phản hồi từ</td>
        <td>Nội dung</td>
    </thead>
    <tbody>
        <?php foreach($data as $feedback): ?>
        <tr>
            <td>
                <span>
                    <span style="margin-right:8px;"><?= $this->e($feedback->created_at['day'])?>/<?= $this->e($feedback->created_at['month'])?>/<?= $this->e($feedback->created_at['year'])?></span>
                    <span><?= $this->e($feedback->created_at['hours'])?>:<?= $this->e($feedback->created_at['minutes'])?>:<?= $this->e($feedback->created_at['seconds'])?></span>
                </span>
            </td>
            <td><?= $this->e($feedback->email) ?></td>
            <td style="width:500px;"><?= $this->e($feedback->text) ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>

</div>

<?php $this->push('scripts') ?>
<script>
    

</script>
<?php $this->end() ?>