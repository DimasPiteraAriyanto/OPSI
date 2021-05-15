<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA LAPORAN PENJUALAN
                            </h2>
                            
                        </div>
                         <!-- <div class="body">
                        <form method="post" action="page/laporan_penjualan/cetak.php" target="_blank" >
                            <table>
                                    <div ><br>
                                        <label>Bulan :</label>
                                        <select name="bulan" class="number_format">
                                            <option value="">Pilih</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                            <input type="submit" name="cetak" value="cetak" class="btn btn-primary" >        
                                   </div>
                                </table>

                        </form>
                    </div> -->

                        <div class="body">
                             
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Menu</th>
                                            <th>Harga</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php
                                            include "koneksi.php";
                                            $no = 1;
                                            $kode=$_GET['kode_penjualan'];
                                            $sql=$koneksi->query("SELECT pd.kode_penjualan, brg.* FROM tb_penjualan_detail pd JOIN tb_barang brg ON pd.kode_barcode = brg.kode_barcode WHERE pd.kode_penjualan ='$kode'");

                                           //$sql = $koneksi->query("SELECT * FROM tb_penjualan p left join tb_penjualan_detail d On p.kode_penjualan=d.kode_penjualan left join tb_barang b on b.kode_barcode=d.kode_barcode  ");


                                            while ($data = $sql->fetch_assoc()) {
                                                
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_barang']?></td>
                                            <td><?php echo "Rp. ".number_format ($data['harga'])?></td>
                                            

                                            
                                        </tr>
                                        <?php 
                                        $total = $total+$data['harga'];
                                    } ?>
                                    </tbody>
                                    <tr>
                                        <th colspan="2" style="text-align: center;">Jumlah Keuntungan</th>
                                        <td align="left"><?php  echo "Rp. ".number_format($total);?></td>
                                    </tr>
                                </table>
                               
                            </div>