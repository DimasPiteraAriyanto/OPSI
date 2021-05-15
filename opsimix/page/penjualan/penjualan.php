<?php
   $kode = $_GET['kodepj'];
   if(isset($_POST['simpan'])){
     
   
       // SIMPAN DATA PENJUALAN
       $date = date("Y-m-d");
       $id_konsumen = $_POST['konsumen'];
       $bayar = $_POST['bayar'];
       $kembali = $_POST['kembali'];
   
   
        $tampil = $koneksi->query("INSERT into tb_penjualan (kode_penjualan,tgl_penjualan,id_konsumen,bayar,kembali) values ('$kode','$date','$id_konsumen','$bayar','$kembali')");

        $id = mysqli_insert_id($koneksi);
   
        if ($tampil) {
          ?>
          <script>window.location="page/penjualan/struk.php?id=<?= $id ?>";</script>
        <?php
        }
   
        //STOK-Query
       $barang =  $koneksi->query("select * from tb_penjualan_detail where kode_penjualan='$kode'");
   
         //while ($data_barang = $barang->fetch_assoc()) {
   
               //$koneksi->query("UPDATE tb_barang SET stok=stok -'$data_barang[jumlah]' WHERE kode_barcode='$data_barang[kode_barcode]'");
               //echo "<script>alert('data tidak mencukupi ');</script>";
   
           //}
          
         }

   
     if(isset($_POST['tambahkan'])){
       // TAMBAH BARANG KE PENJUALAN
       $kode = $_GET['kodepj'];
       $kode_barcode = $_POST['kode_barcode'];
       $konsumen = $_POST['konsumen'];
       $total_bayar = $_POST['total_bayar'];
       $jumlah = $_POST['jumlah'];

       $potongan = $_POST['potongan'];
       $s_total = $_POST['s_total'];
       
      
       $koneksi->query("insert into tb_penjualan_detail(kode_penjualan,kode_barcode,jumlah,potongan, total) values ('$kode','$kode_barcode','$jumlah','$potongan','$s_total')");
     }
    
   ?>
<div class="card" >
   <div class="header">
      <table style="width:100%">
      <td style="text-align:left"><h2>Data barang</h2> <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a></td>

      </table>
   </div>
   <div class="body">
      <div class="row">
         <form method="POST">
            <div class="col-md-20 cols-xs-6">
               <div class="form-group">
                  <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly="" />
               </div>
               <div class="form-group">
                  <label>Kode Barcode</label>
                  <input type="text" name="kode_barcode"  class="form-control" autofocus="" onkeyup="hitung()" />
               </div>
               <div class="col-md-50 col-xs-12 text-left">      
               <table class="table table-striped"><tr>
               <th><label>Jumlah : </label> </th>
               <th><label>Harga Barang :</label> </th>
               <th><label>Diskon (%) : </label> </th>
               <th><label>Potongan Diskon : </label> </th>
               <th><label>Sub Total : </label> </th>
               </tr>

               
               <td>
               <input type="text" style="text-align: right;" name="jumlah" id="jumlah" value="1" min="1" onkeyup="hitungSubTotal(detail_barang)" >
               </td>
               <td>
               <input type="text" readonly="" style="text-align: right;" name="total_bayar" id="total_bayar" onkeyup="hitungSubTotal(detail_barang)" value="<?php echo $total_bayar;?>" >
               </td>
               <td>
               <input type="number" readonly="" style="text-align: right;" name="diskon" id="diskon" value=" " onkeyup="hitungSubTotal(detail_barang)" >
               </td>
               <td>
               <input type="number" readonly="" style="text-align: right;" name="potongan" id="potongan" >
               </td>
               <td>
               <input type="number" readonly="" style="text-align: right;" name="s_total" id="s_total" required>
               </td>
               </div>
               </table>
               <br/>
               <div class="form-group">
                  <input type="submit" name="tambahkan" value="Tambahkan" class="btn btn-primary">
               </div>
               
            </div>
            
            <!--  <div class="col-md-6 col-xs-12 text-right">
               <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
               
               
               <input type="submit" name="simpan" value="Batal" class="btn btn-danger">
               
               <input type="submit" name="simpan_pj" value="Cetak" class="btn btn-success">
               
               </div> -->

               <!--Modal Search-->
               <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="width:120px;">Kode Barcode</th>
                            <th style="width:240px;">Nama Menu</th>
                            <th>Harga</th>
                            <th style="width:100px;">Ukuran</th>
                            <th>Jenis Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                       $no = 1;

                       $sql = $koneksi->query("SELECT DISTINCT * from tb_barang ORDER BY nama_barang");

                       while ($data = $sql->fetch_assoc()) {
                     ?>
                            <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['kode_barcode']?></td>
                                            <td><?php echo $data['nama_barang']?></td>
                                            <td><?php echo "Rp. ".number_format($data['harga'])?></td>
                                            <td><?php echo $data['ukuran']?></td>
                                            <td><?php echo $data['jenisMenu']?></td>
                                        </tr>              
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>          

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </div>
            </div>
        </div>
               <!--Modal END-->


      </div>
   </div>
   </form>
</div>
</div>
</div>
<div class="card">
   <div class="header">
      <h2>
         DAFTAR BELANJAAN
      </h2>
   </div>
   <div class="body">
      <div class="table-responsive">
         <table class="table table-striped ">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Diskon</th>
                  <th>Jumlah</th>
                  <th>Diskon</th>
                  <th>Total</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $no = 1;
                  $total_bayar = 0;
                  $sql = $koneksi->query("select a.*, b.diskon, b.nama_barang , a.jumlah, b.harga from tb_penjualan_detail a JOIN tb_barang b ON a.kode_barcode = b.kode_barcode WHERE a.kode_penjualan = '".$_GET['kodepj']."'");
                  
                  while ($data = $sql->fetch_assoc()) {
                    
                  $total_bayar += $data['total'];
                  
                 
                  ?>
               <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['kode_barcode']?></td>
                  <td><?php echo $data['nama_barang']?></td>
                  <td><?php echo "Rp. ".number_format($data['harga']-(($data['diskon']/100)*$data['harga']))?></td>
                  <td><?php echo number_format($data['jumlah'])?></td>\
                  <td><?php echo $data['diskon']."%"?></td>
                  <td><?php echo "Rp. ".number_format($data['total'])?></td>
                  <td>
                     <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?kodepj=<?=$_GET['kodepj']?>&page=penjualan&aksi=delete&id=<?php echo $data['id']?>" class="btn btn-danger" >Delete</a>
                  </td>
               </tr>
               <?php 
                  }    
                  ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
</div>
<div class="card">
   <div class="header">
   </div>

   <div class="body">
      <form method="POST" action="" target="_blank" >
         <div class="row">
            <div class="col-md-6 col-xs-12 text-right">
               Nama Konsumen
            </div>
            <div class="col-md-6 col-xs-12">
            <input type="text" name="nama" class="form-control">
               </input>
            </div>
            <div class="col-md-6 col-xs-12 text-right">
               Total Rp.
            </div>
            <div class="col-md-6 col-xs-12 text-right">
               <?php echo $total_bayar; ?>
               <input type="hidden" name="total_bayar" value="<?php echo $total_bayar; ?>" />
            </div>
            <div class="col-md-6 col-xs-12 text-right" >
               Bayar
            </div>
            <div class="col-md-6 col-xs-12 text-right">
               <input type="number" name="bayar" id="bayar" class="form-control" />
            </div>
            <div class="col-md-6 col-xs-12 text-right">
               Kembali
            </div>
            <div class="col-md-6 col-xs-12 text-right">
               <input type="number" name="kembali" id="kembali" class="form-control" />
            </div>
         </div>
         <input type="submit" name="simpan" value="Print" class="btn btn-info">
         <!-- <input type="submit" name="batal" value="Batal" class="btn btn-danger"> -->
         <!-- <input type="submit" name="struk" value="Cetak" class="btn btn-info"> -->
         <?php 
                  if(isset($_POST['simpan'])){
                     // TAMBAH BARANG KE PENJUALAN
                     $nama = $_POST['nama'];
                     $konsumen = $koneksi->query("insert into tb_konsumen(nama) value ('$nama')");
                  }
         ?>

                  

   </div>

   </form>        
</div>
<script type="text/javascript">

   var detail_barang = null;
   function hitung(){
     var kode_barcode = document.getElementsByName("kode_barcode")[0].value;
     if(kode_barcode != "")
     {
       // Jika barcode sudah terisi, maka ambil data barangnya
       axios.get("page/penjualan/ambil-detail-barang.php?kode_barcode=" + kode_barcode)
         .then(function(res){
           detail_barang = res.data;

           if(detail_barang == null)
           {
             document.getElementsByName("total_bayar")[0].value = 1;
             document.getElementsByName("diskon")[0].value = 1;
           }
           else
           {
             document.getElementsByName("total_bayar")[0].value = detail_barang.harga;
             document.getElementsByName("diskon")[0].value = detail_barang.diskon;
           }
           hitungSubTotal(detail_barang);
         })
     }
     
   }

   function hitungSubTotal(detail_barang_sekarang)
   {
     var jumlah = parseInt(document.getElementById('jumlah').value);
     if(jumlah == 0)
     {
      document.getElementById('jumlah').value = 1;  
     }
     else
     {
         var total_bayar = document.getElementById('total_bayar').value * jumlah;
         var diskon = document.getElementById('diskon').value ;
         var diskon_pot = parseInt(total_bayar) * parseFloat(diskon) / parseInt(100);
      if (!isNaN(diskon_pot)) {
         var potongan = document.getElementById('potongan').value = diskon_pot;
       }
         var sub_total = parseInt(total_bayar)-parseInt(potongan) ;
         var s_total = document.getElementById('s_total').value = sub_total;
     }
   }

   function hitungTotal(){
     var total_bayar = document.getElementsByName('total_bayar')[1].value;
     var bayar = document.getElementById('bayar').value ;
     var kembali = bayar - total_bayar;
     
     if (kembali < 0){
     //alert("UANG KURANG");
     document.getElementById("kembali").value = 0;
     
   }else {
     document.getElementById("kembali").value = kembali;
   }
   }
   document.getElementById("bayar").addEventListener("keyup", hitungTotal)
   
</script>