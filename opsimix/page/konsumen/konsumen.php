<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KONSUMEN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql = $koneksi->query("select * from tb_konsumen");

                                    		while ($data = $sql->fetch_assoc()) {
                                    			
                                    		
                                    	?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama']?></td>
                                            <td><?php echo $data['alamat']?></td>
                                            <td><?php echo $data['telpon']?></td>
                                            <td><?php echo $data['email']?></td>
                                            <td>
                                            	
                                            	<a href="?page=konsumen&aksi=edit&id=<?php echo $data['id_konsumen']?>" class="btn btn-success" >Edit</a>
                                            	<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?page=konsumen&aksi=delete&id=<?php echo $data['kode_konsumen']?>" class="btn btn-danger" >Delete</a>
                                            </td>
                                        </tr>
                                    	<?php } ?>
                                    </tbody>
                                </table>
                                <a href>
                                <a href="?page=konsumen&aksi=tambah" class="btn btn-primary">Tambah Data </a>
                            </div>