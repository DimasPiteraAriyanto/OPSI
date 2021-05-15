<?php
include('database connection.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tb_barang ";
if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE nama_barang LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR kode_barcode LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY kode_barcode ASC ';
}

if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' .$_POST['start']. ', ' .$_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
    $sub_array = array();
    $sub_array[] = $row["kode_barcode"];
    $sub_array[] = $row["nama_barang"];
    $sub_array[] = $row["harga"];
    $sub_array[] = $row["ukuran"];
    $sub_array[] = $row["jenisMenu"];
    $sub_array[] = ($row["diskon"]/100)*$row["harga"];
    $sub_array[] = '<button type="button" name="update" id="'.$row["kode_barcode"].'" class="btn btn-primary btn-sm update">Edit</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["kode_barcode"].'" class="btn btn-danger btn-sm delete">Delete</button>';
    $data[] = $sub_array;
}

$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_total_all_records(),
    "data"              => $data
);
echo json_encode($output);
?>