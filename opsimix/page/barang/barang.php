<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA MENU MAKANAN DAN MINUMAN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Menu</th>
                                            <th>Harga</th>
                                            <th>Ukuran</th>
                                            <th>Jenis Menu</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql = $koneksi->query("select * from tb_barang");

                                    		while ($data = $sql->fetch_assoc()) {
                                    			
                                    		
                                    	?>
                                        <tr><div class="banner" >
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['kode_barcode']?></td>
                                            <td><?php echo $data['nama_barang']?></td>
                                            <td><?php echo "Rp. ".number_format($data['harga'])?></td>
                                            <td><?php echo $data['ukuran']?></td>
                                            <td><?php echo $data['jenisMenu']?></td>
                                            </div>
                                            <td>
                                    
                                            </td>
                                        </tr>
                                    	<?php } ?>
                                    </tbody>
                                </table>
                                <a href="menu/index.php" class="btn btn-primary">Tambah Data dan Edit Data </a>
                            </div>