<?php
	$kode = $_GET['id'];
	$sql = $koneksi->query("delete from tb_konsumen where kode_konsumen='$kode'");
?>

<script type="text/javascript">
					alert("Data Berhasil di Hapus");
					window.location.href="?page=konsumen";
</script> 