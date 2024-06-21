<?php 
$pagemess=false;
if(isset($_SESSION['mess'])){
    $pagemess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}
?>
<?php $this->layout('layouts/admin', ['cssLink'=>'/css/admin_home.css','title' => 'Trang quản trị', 'pagemess'=>$pagemess]) ?>
<div class="admin-turnover-container container-fluid d-block justify-content-center">
    <h3>Quản lý doanh thu</h3>
    <hr>

    <div class="charts">
        <div class="chart-container">
            <h3>Doanh thu hôm nay</h3>
            <canvas id="chart1" class="data-chart scalesmall"></canvas>
        </div>

        <div class="chart-container">
            <h3>Doanh thu 7 ngày gần nhất</h3>
            <canvas id="chart2" class="data-chart"></canvas>
        </div>

        <div style="margin-top: -100px;" class="chart-container fullwidth-chart">
            <h3>Doanh thu trong tháng</h3>
            <canvas id="chart3" class="data-chart"></canvas>
        </div>

    </div>


</div>

<?php $this->push('scripts') ?>
<script>
  $(document).ready(()=>{
        $.getJSON(window.location.protocol + '//' + window.location.host + '/api/v1/getturnoverdata').done((data) => {
            week = []
            for (let i = -6; i <= 0; i++) {
                day = new Date()
                day.setDate(new Date().getDate() + i)

                day = day.getDate() + '/' + (day.getMonth() + 1) + '/' + day.getFullYear()
                week = [...week, day]
            }

            month = []
            for (let i = -30; i <= 0; i++) {
                day = new Date()
                day.setDate(new Date().getDate() + i)

                day = day.getDate() + '/' + (day.getMonth() + 1) + '/' + day.getFullYear()
                month = [...month, day]
            }

            const labelsPieChart = ['Cà phê', 'Bánh ngọt', 'Thức uống khác']
            const dataPieChart = {
                labels: labelsPieChart,
                datasets: [{
                    labels: 'Tổng lượt mua trong ngày',
                    backgroundColor: [
                        'rgb(144, 79, 35)',
                        'rgb(198, 191, 65)',
                        'rgb(67, 255, 224)'
                    ],

                    borderColor: 'rgb(255, 255, 255)',
                    data: data.todaySale
                }]
            }
            const configPieChart = {
                type: 'pie',
                data: dataPieChart,
                options: {}
            }



            const labelsLineChart = week
            const dataLineChart = {
                labels: labelsLineChart,
                datasets: [{
                    label: 'Tổng lượt mua trong ngày',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: data.weekSale
                }]
            }
            const configLineChart = {
                type: 'line',
                data: dataLineChart,
                options: {}
            }


            const labelsBarChart = month
            const dataBarChart = {
                labels: labelsBarChart,
                datasets: [{
                    label: 'Tổng lượt mua trong ngày',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: data.monthSale
                }]
            }

            const configBarChart = {
                type: 'bar',
                data: dataBarChart,
                options: {}
            }

            new Chart(
                $('#chart1')[0],
                configPieChart
            )

            new Chart(
                $('#chart2')[0],
                configLineChart
            )

            new Chart(
                $('#chart3')[0],
                configBarChart
            )
        })
    })


</script>
<?php $this->end() ?>