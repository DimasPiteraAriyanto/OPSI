<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA USER
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql = $koneksi->query("select * from user");

                                    		while ($data = $sql->fetch_assoc()) {
                                    			
                                    		
                                    	?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['username']?></td>
                                            <td><?php echo $data['name']?></td>
                                            <td><?php echo $data['level']?></td>
                                            <td>
                                            	
                                            	<a href="?page=user&aksi=edit&id=<?php echo $data['id']?>" class="btn btn-success" >Edit</a>
                                            	<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?page=user&aksi=delete&id=<?php echo $data['id']?>" class="btn btn-danger" >Delete</a>
                                            </td>
                                        </tr>
                                    	<?php } ?>
                                    </tbody>
                                </table>
                                <a href="?page=user&aksi=tambah" class="btn btn-primary">Tambah Data </a>
                            </div>