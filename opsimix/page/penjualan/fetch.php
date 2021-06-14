<?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=opsimix", "root", "");

$received_data = json_decode(file_get_contents("php://input"));

$data = array();

if($received_data->query != '')
{
 $query = "
 SELECT nama_barang FROM tb_barang 
 WHERE nama_barang LIKE '%".$received_data->query."%' 
 ORDER BY nama_barang ASC 
 LIMIT 10
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
}

echo json_encode($data);

?>