<!doctype html>
<html>

<head>
<meta charset="utf-8">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<body>


<?php

include('koneksi.php');
$kode = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tb_penjualan_detail WHERE status=1 "));
$kode_pj = $kode['kode_penjualan'];

?>

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
            <td>Nama Menu</td>
            <td></td>
 </tr>
 </thead>

        <!--
            join 3 table
            select s.name "Student", c.name "Course"
            from student s, bridge b, course c
            where b.sid = s.sid and b.cid = c.cid -->

        <?php                                
            $no = 1;
            $query = "SELECT * FROM tb_penjualan p 
            left join tb_penjualan_detail d on p.kode_penjualan=d.kode_penjualan 
            left join tb_barang b on b.kode_barcode=d.kode_barcode WHERE status=1";
             
            $dewan1 = $con->prepare($query);
            $dewan1->execute();
            $res1 = $dewan1->get_result();
 
            if ($res1->num_rows > 0) {
                while ($row = $res1->fetch_assoc()) {
                    $kodep = $row['kode_penjualan'];
                    $namaMenu = $row['nama_barang'];
                    $status = $row['status'];
                    $id = $row['id'];
        ?>

<tbody>
<tr>
        <div id="rene">
                <td><?php echo $no++; ?></td>
                <td><?php echo $kodep; ?></td>
                <td><?php echo $namaMenu; ?></td> 
                <td> 
                
                <a href="javascript:void(0)" onClick="updateId('<?= $id ?>')"><button type="button" class="btn btn-success" class="preference" id="check" value="<?= $status ?>"/></a>
                <p class="text-success"></p>
                
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
}, 3000);
});

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




