<?php
//session_start();
//ob_start();
include_once("../../koneksi.php"); 
?>
<html>
<head>
  <title>LAPORAN PENJUALAN MENU</title>
</head>
<body>
 
  <center>
 
    <h2>LAPORAN PENJUALAN MAKANAN DAN MINUMAN</h2>
    
  </center>
 <?php
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
            echo '<b>Data Transaksi Bulan '.$nama_bulan[$_POST['bulan']].' </b><br /><br />';

            ?>
 
 
  <table border="1" style="width: 100%">
    <tr>
      <th width="1%">No</th>
      
	    <th>Tanggal</th>
	    <th>Nama Menu</th>
	    <th>Jumlah</th>
	    <th>Harga Jual</th>
	    <th>Total Pendapatan</th>
    </tr>
    <?php 
    $no = 1;
    
    	$sql = mysqli_query($koneksi,"SELECT * FROM tb_penjualan p left join tb_penjualan_detail d On p.kode_penjualan=d.kode_penjualan left join tb_barang b on b.kode_barcode=d.kode_barcode WHERE MONTH(tgl_penjualan)='$_POST[bulan]' ");

		while($data = mysqli_fetch_array($sql)){
    
    
			
		
	?>
	<tr>
	    <td><?php echo $no++;?></td>
	    <td><?php echo $data['tgl_penjualan']?></td>
	    <td><?php echo $data['nama_barang']?></td>
	    <td><?php echo $data['jumlah']?></td>
	    <td><?php echo "Rp. ".number_format ($data['harga'])?></td>
	    <td><?php echo "Rp. ".number_format ($data['total'])?></td>

	    
	</tr>
    <?php 
    @$total = $total+$data['total'];
    } 
    ?>

    <tr>
	    <th colspan="5" style="text-align: center;">Jumlah Pendapatan</th>
	    <td align="left"><?php  echo "RP. ".number_format(@$total);?></td>
	</tr>
  </table>
 <p><br>
  <div align="right" >Pimpinan </div><p></br>
  <div align="right">Ferry</div>
  <script>
    window.print();
  </script>
 
</body>
</html>


