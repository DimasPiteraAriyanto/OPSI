<?php
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    include('koneksi.php');
     
    $update = "UPDATE tb_penjualan_detail SET status = '2' WHERE id = '".$id."'";

    if (mysqli_query($con, $update))
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($con);
    }
    die;
}
?>