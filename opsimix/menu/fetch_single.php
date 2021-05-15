<?php 
include('database connection.php');
include('function.php');

if(isset($_POST["kode_barcode"]))
{
    $output = array();
    $statement = $connection->prepare("SELECT * FROM tb_barang WHERE kode_barcode = '".$_POST["kode_barcode"]."' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["kode_barcode"] = $row["kode_barcode"];
        $output["nama_barang"] = $row["nama_barang"];
        $output["harga"] = $row["harga"];
        $output["ukuran"] = $row["ukuran"];
        $output["jenisMenu"] = $row["jenisMenu"];
        $output["diskon"] = $row["diskon"];
    }
    echo json_encode($output);
}
?>
                           