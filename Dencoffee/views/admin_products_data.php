<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>

<div style="flex-direction: column;" class="admin-prd-data-container container-fluid d-flex justify-content-center">
    <h3>Số liệu sản phẩm</h3>
    <hr>

    <div class="charts">
        <div class="chart-container">
            <h3>Số lượng sản phẩm</h3>
            <canvas id="chart1" class="data-chart scalesmall"></canvas>
        </div>

        <div class="chart-container">
            <h3>Doanh thu trong tháng</h3>
            <canvas id="chart2" class="data-chart scalesmall"></canvas>
        </div>

        <div style="margin-top: -100px;" class="chart-container fullwidth-chart">
            <h3>Top sản phẩm bán chạy trong tháng</h3>
            <canvas id="chart3" class="data-chart"></canvas>
        </div>

    </div>

</div>

<?php $this->push('scripts') ?>
<script>
     $(document).ready(()=>{
        $.getJSON( window.location.protocol + '//' + window.location.host + '/api/v1/getproductdata').done((data) => {
            
            const labelsPieChart = ['Cà phê', 'Bánh ngọt', 'Thức uống khác']
            const dataPieChart1 = {
                labels: labelsPieChart,
                datasets: [{
                    labels: 'Tổng lượt mua trong ngày',
                    backgroundColor: [
                        'rgb(144, 79, 35)',
                        'rgb(198, 191, 65)',
                        'rgb(67, 255, 224)'
                    ],

                    borderColor: 'rgb(255, 255, 255)',
                    data: data.productNumber
                }]
            }
            const configPieChart1 = {
                type: 'pie',
                data: dataPieChart1,
                options: {}
            }


            const dataPieChart2 = {
                labels: labelsPieChart,
                datasets: [{
                    labels: 'Tổng lượt mua trong ngày',
                    backgroundColor: [
                        'rgb(144, 79, 35)',
                        'rgb(198, 191, 65)',
                        'rgb(67, 255, 224)'
                    ],

                    borderColor: 'rgb(255, 255, 255)',
                    data: data.weekTotal
                }]
            }
            const configPieChart2 = {
                type: 'pie',
                data: dataPieChart2,
                options: {}
            }


            const labelsBarChart = data.productsName
            const dataBarChart = {
                labels: labelsBarChart,
                datasets: [{
                    label: 'Số lượng bán trong tháng',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: data.productsTotalValues,
                }]
            }

            const configBarChart = {
                type: 'bar',
                data: dataBarChart,
                options: {
                    indexAxis: 'y'
                }
            }

            new Chart(
                $('#chart1')[0],
                configPieChart1
            )

            new Chart(
                $('#chart2')[0],
                configPieChart2
            )

            new Chart(
                $('#chart3')[0],
                configBarChart
            )
        })
    })


</script>
<?php $this->end() ?>