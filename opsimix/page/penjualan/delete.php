<?php
$kode = $_GET['kodepj'];
	$id = $_GET['id'];
	$sql = $koneksi->query("delete from tb_penjualan_detail where id='$id'");
?>

<script type="text/javascript">
					alert("Pesanan Berhasil di Hapus");
					window.location.href="?page=penjualan&kodepj=<?php echo $kode;?>";
</script> 