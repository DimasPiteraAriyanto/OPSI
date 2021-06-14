<!doctype html>
<html>

<head>
<meta charset="utf-8">
</head>


<body>




<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<?php 
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
            <td>Kode Sturk</td>
            <td>Status</td>
 </tr>
 </thead>

        <!--
            join 3 table
            select s.name "Student", c.name "Course"
            from student s, bridge b, course c
            where b.sid = s.sid and b.cid = c.cid -->

<?php 
require("../../koneksi.php");
$kode = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_penjualan"));
$kode_pj = $kode['kode_penjualan'];
?>
<?php
            $sql=$koneksi->query("SELECT * from tb_penjualan, tb_penjualan_detail, tb_barang
            where tb_penjualan.kode_penjualan = tb_penjualan_detail.kode_penjualan
            and tb_penjualan_detail.kode_barcode=tb_barang.kode_barcode
            GROUP BY tb_penjualan.kode_penjualan ASC ");

            $total_keseluruhan = 0;
            $no=1;
            while($tampil = mysqli_fetch_assoc($sql)){
                    $kodep = $tampil['kode_penjualan'];
                    $status = $tampil['status'];
                    $wait = "";

            if ($status == 0){
                $wait = "Pesanan sedang dibuatkan";
            } else if ($status == 1){
                $wait = "Pesanan sudah jadi";
            } else if ($status == 2){
                $wait = "Pesanan sedang diantarkan ke meja";
            }

        ?>

<tbody>
<tr>
        <div id="rene">
                <td><?php echo $no++; ?></td>
                <td><?php echo $kodep; ?></td>
                <td><p class="text-success"><?= $wait ?></p></td>                                          
        <?php } ?>
        </div>
</tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
          
</body>
</html>

<script>



/*button
var buttons = document.querySelectorAll('button');

buttons.forEach(function(button) {
  if (!button.value) {
    button.style.display 
  } else {
    button.style.display = "none"
  }
});*/

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
        xmlhttp.open("GET", "getStat.php?id=" +id, true);
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




