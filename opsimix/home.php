<?php

date_default_timezone_set('Asia/Jakarta');
$date    = date('Y-m-d');

    $sql= $koneksi->query("SELECT * from tb_barang");
    while ($tampil = $sql->fetch_assoc()) {
        $jumlah_barang = $sql->num_rows;

    $sql1= $koneksi->query("SELECT * from tb_penjualan_detail WHERE status is null ");
    while ($tampil1 = $sql1->fetch_assoc()) {
    $jumlah_pending = $sql1->num_rows;
    }}

    $sql2= $koneksi->query("SELECT SUM(total) as profit FROM  tb_penjualan p left join tb_penjualan_detail d on p.kode_penjualan=d.kode_penjualan WHERE tgl_penjualan='$date' ");
    while ($data = $sql2->fetch_assoc()) {
    $profit = $data['profit'];

    
    
    $bulan       = mysqli_query($koneksi, "SELECT DATE_FORMAT(tgl_penjualan, '%W') as bulan FROM tb_penjualan group by tgl_penjualan DESC LIMIT 5");
    $penghasilan = mysqli_query($koneksi, "SELECT COUNT(kode_penjualan) jumlah from tb_penjualan group by tgl_penjualan DESC LIMIT 5");
    
    ?>

<style type="text/css">
            .chartjs {
                width: 35%;
                margin-left: 15px auto;
            }
</style>

        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <a href="?page=barang"><i class="material-icons">menu_book</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Data Barang</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_barang ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                        <a href="page/penjualan/list_penjualan.php"><i class="material-icons">production_quantity_limits</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Jumlah Pesanan Pending</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php if ($jumlah_pending !== 'NULL'){
                                                                                                                                echo "0";
                                                                                                                                }else echo $jumlah_pending ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                        <i class="material-icons">attach_money</i>
                        </div>

                        <?php
                        ?>
    
                        <div class="content">
                            <div class="text">Profit</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $profit ?></div>
                        </div>
                    </div>
                </div>
                        <?php }?> 
                        <div class="chartjs">
                        <canvas id="myChart" width="100" height="100"></canvas>
                        
                    </div>
                
               
               
        
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['bulan'] . '",';}?>],
                    datasets: [{
                            label: 'Jumlah Penjualan',
                            data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['jumlah'] . '",';}  ?> ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>