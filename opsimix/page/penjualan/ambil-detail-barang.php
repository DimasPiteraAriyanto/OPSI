<?php
header('Content-Type: application/json');
require("../../koneksi.php");

$kode_barcode = $_GET['kode_barcode'];

$sql = $koneksi->query("select * from tb_barang where kode_barcode='$kode_barcode'");

$tampil=$sql->fetch_assoc();

echo json_encode($tampil);

?>