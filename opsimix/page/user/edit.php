<?php 
	$id = $_GET['id'];
	$sql = $koneksi->query("select * from user where id='$id'");
	$tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah User
                                
                            </h2>
					</div>
					<div class="body">
                        <form method="POST">

         					<label for="">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" value="<?php echo $tampil['username']?>" class="form-control" />
                                </div>
                            </div>

                            <label for="">Nama</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" value="<?php echo $tampil['name']?>" class="form-control" />
                                </div>
                            </div>


                            <label for="">Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="password"  value="<?php echo $tampil['password']?>" class="form-control" />
                                </div>
                            </div>
                         

                            <label for="">Level</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text"  name="level" value="<?php echo $tampil['level']?>" class="form-control" />
                                </div>
                            </div>




                           <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                        </form>

           <?php 

           	if (isset($_POST['simpan'])) {
           		$username = $_POST['username'];
           		$name = $_POST['name'];
           		$password = $_POST['password'];
           		$level = $_POST['level'];
           	

           	$sql = $koneksi->query("update  user  set username='$username',name='$name',password='$password',level='$level' where id='$id'");

           	if ($sql) {
           		?>

           		<script type="text/javascript">
           			alert("Data Berhasil di Edit");
           			window.location.href="?page=user";
           		</script>


           		<?php
           	}
		}
     ?>