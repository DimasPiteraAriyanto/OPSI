<?php

include('database connection.php');
include('function.php');

if(isset($_POST["kode_barcode"]))
{
	$statement = $connection->prepare(
		"DELETE FROM tb_barang WHERE kode_barcode = :id"
	);
	$result = $statement->execute(

		array(':id'	=>	$_POST["kode_barcode"])
		
	    );
}

?>