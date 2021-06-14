<?php
include 'config.php';

if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($con,"select * from tb_barang order by kode_barcode limit 10");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($con,"select * from tb_barang where nama_barang like '%".$search."%' limit 10");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['kode_barcode'], "text"=>$row['nama_barang']." ".$row['ukuran']);
}

echo json_encode($data);