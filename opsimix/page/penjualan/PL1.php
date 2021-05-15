<!doctype html>
<html>

<head>
<meta charset="utf-8">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<body>


<?php

include('koneksi.php');
$kode = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tb_penjualan_detail WHERE status IS NULL
                                        GROUP BY id ASC "));
$kode_pj = $kode['kode_penjualan'];

?>
<h3>KODE PENJUALAN NO : <?php echo $kode_pj; ?></h3> </br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr><?php 
    $tanggal = mktime(date('m'), date("d"), date('Y'));
    echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
    date_default_timezone_set("Asia/Jakarta");
    $jam = date ("H:i:s");
    echo " | Pukul : <b> " . $jam . " " ." </b> ";
    $a = date ("H");
    if (($a>=6) && ($a<=11)) {
        echo " <b>, Selamat Pagi !! </b>";
    }else if(($a>=11) && ($a<=15)){
        echo " , Selamat  Pagi !! ";
    }elseif(($a>15) && ($a<=18)){
        echo ", Selamat Siang !!";
    }else{
        echo ", <b> Selamat Malam </b>";
    }
 ?>
            <td>No</td>
            <td>Nama Menu</td>
            <td>Jumlah Menu</td>
            <td>Ukuran</td>
            <td></td>
 </tr>
 </thead>

        <?php                                
            $no = 1;
            $query = "SELECT * from tb_penjualan, tb_penjualan_detail, tb_barang
            where status IS NULL and tb_penjualan.kode_penjualan = tb_penjualan_detail.kode_penjualan
            and tb_penjualan_detail.kode_barcode=tb_barang.kode_barcode
            and tb_penjualan.kode_penjualan='$kode_pj' ";
             
            $dewan1 = $con->prepare($query);
            $dewan1->execute();
            $res1 = $dewan1->get_result();
 
            if ($res1->num_rows > 0) {
                while ($row = $res1->fetch_assoc()) {
                    $kodep = $row['kode_penjualan'];
                    $jumlah = $row['jumlah'];
                    $namaMenu = $row['nama_barang'];
                    $id = $row['id'];
                    $status = $row['status'];
                    $ukuran = $row['ukuran'];
        ?>

<tbody>
<tr>
        <div id="rene">
                <td><?php echo $no++; ?></td>
                <td><?php echo $namaMenu; ?></td>
                <td><?php echo $jumlah; ?></td> 
                <td><?php echo $ukuran; ?></td>  
                <td> 
                
                <a href="javascript:void(0)" onClick="updateId('<?= $id ?>')"><button type="button" class="btn btn-success" class="preference" id="check" value="<?= $status ?>"/></a>
                <p class="text-success"><?=$status?></p>
                
                </td>                                          
        <?php }} ?>
        </div>
</tbody>
</table>

          
</body>
</html>

<script>

$(document).ready(function(){
setInterval(function(){
      $("#rene").load(window.location.href + "#rene" );
}, 10000);
});

/*button*/
var buttons = document.querySelectorAll('button');

buttons.forEach(function(button) {
  if (!button.value) {
    button.style.display 
  } else {
    button.style.display = "none"
  }
});

   /* checked after refresh 
   $(function(){
    $('.preference').each(function(e){
    if($(this).val() == 1){
        $(this).attr("checked", "checked");
    }
    });
    });*/

    /*post status*/
    function updateId(id)
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            alert(xmlhttp.responseText);
        }
        };
        xmlhttp.open("GET", "getPL.php?id=" +id, true);
        xmlhttp.send();
    }

    /* Setting refresh mouse 
    var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 5000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 5000);
     }

     setTimeout(refresh, 5000);


     /*setting status*/
     
</script>




