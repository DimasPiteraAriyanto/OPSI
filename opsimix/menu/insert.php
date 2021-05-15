<?php 
include('database connection.php');
include('function.php');

if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $statement = $connection->prepare("INSERT INTO tb_barang (kode_barcode, nama_barang, harga, ukuran, jenisMenu, diskon) 
                                            VALUES (:kode_barcode, :nama_barang, :harga, :ukuran, :jenisMenu, :diskon)");
        $result = $statement->execute(
             array(
                ':kode_barcode'   =>  $_POST["kode_barcode"],
                ':nama_barang'   =>  $_POST["nama_barang"],
                ':harga' =>  $_POST["harga"],
                ':ukuran'   =>  $_POST["ukuran"],
                ':jenisMenu' =>  $_POST["jenisMenu"],
                ':diskon' =>  $_POST["diskon"],
             )
        );
    }
    if($_POST["operation"] == "Edit")
    {
        $statement = $connection->prepare("UPDATE tb_barang SET nama_barang = :nama_barang, harga = :harga, ukuran = :ukuran, jenisMenu = :jenisMenu , diskon = :diskon WHERE kode_barcode = :kode_barcode");
        $result = $statement->execute(
             array(
                ':nama_barang'        =>  $_POST["nama_barang"],
                ':harga'              =>  $_POST["harga"],
                ':ukuran'             =>  $_POST["ukuran"],
                ':jenisMenu'          =>  $_POST["jenisMenu"],
                ':diskon'             =>  $_POST["diskon"],
                ':kode_barcode'       =>  $_POST["kode_barcode"]
             )
        );
    }
    
}
?>
                           