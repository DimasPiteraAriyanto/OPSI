<!DOCTYPE html>
<html>

<head>
    
    <title>Server Side Ajax CURD data table with Bootstrap</title>
        
    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
</head>
<body>

        <table id="course_table" class="table table-striped">
            <thead bgcolor=#6cd8dc>
            <tr class="table-primary">
                <th width="10%">ID</th>
                <th width="30%">Nama Menu</th>
                <th width="15%">Harga</th>
                <th width="10%">Ukuran</th>
                <th width="5%">Jenis Menu</th>
                <th width="5%">Diskon</th>
                <th scope="col" width="5%">Edit</th>
                <th scope="col" width="5%">Delete</th>
            </tr>
            </thead>
        </table>
        <br>
        <div align="right">
        <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success">Tambah Menu</button>
        <a href ="../index.php" class="btn btn-warning">Kembali</a>
        </div>
    </div>
    
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="course_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Menu</h4>
                </div>
                <div class="modal-body">
                    <br><br><br>
                    <label>Tambah Nama Menu</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                    <br>
                    <label>Tambah Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control">
                    <br>
                    <label>Tambah Ukuran</label>
                        <select name="ukuran" id="ukuran" class="form-control" required="true">
							<option value=""></option>
							<option value="L">L</option>
							<option value="M">M</option>
                            <option value="S">S</option>
					    </select>
                    <br>
                    <label>Tambah Jenis Menu</label>
                    <select name="jenisMenu" id="jenisMenu" class="form-control" required="true">
							<option value=""></option>
							<option value="minuman">Minuman</option>
							<option value="makanan">Makanan</option>
					</select>
                    <label>Diskon</label>
                    <input type="text" name="diskon" id="diskon" class="form-control">
                </div>
                <div class="modal-footer">
                <label>Kode</label>
                    <input type ="text" name="kode_barcode" id="kode_barcode"/>
                    
                    <input type="hidden" name="operation" id="operation"/>
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Add"/>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#add_button').click(function(){
            $('#course_form')[0].reset();
            $('.modal-title').text("Add Menu Details");
            $('#action').val("Add");
            $('#operation').val("Add")
        });

     var dataTable = $('#course_table').DataTable({
        "paging":true,
        "processing":true,
        "serverSide":true,
        "order": [],
        "info":true,
        "ajax":{
            url:"fetch.php",
            type:"POST"
        },
        "columnDefs":[
           {
            "target":[0,3,4],
            "orderable":false,
           },
        ],
     });
        
        $(document).on('submit', '#course_form', function(event){
        event.preventDefault();
        var id = $('#id').val();
        var nama_barang = $('#nama_barang').val();
        var harga = $('#harga').val();
        
        if(nama_barang != '' && harga != '')
        {
            $.ajax({
                url:"insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    $('#course_form')[0].reset();
                    $('#userModal').modal('hide');
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            alert("Data Menu Makanan atau Minuman Tidak Boleh Kosong");
        }
    });

    $(document).on('click', '.update', function(){
        var kode_barcode = $(this).attr("id");
        $.ajax({
            url:"fetch_single.php",
            method:"POST",
            data:{kode_barcode:kode_barcode},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#id').val(data.id);
                $('#nama_barang').val(data.nama_barang);
                $('#harga').val(data.harga);
                $('#ukuran').val(data.ukuran);
                $('#jenisMenu').val(data.jenisMenu); 
                $('#diskon').val(data.diskon);         
                $('.modal-title').text("Edit Course Details");
                $('#kode_barcode').val(kode_barcode);
                $('#action').val("Save");
                $('#operation').val("Edit");
            }
        });
     });

     $(document).on('click','.delete', function(){

    var kode_barcode = $(this).attr("id");
    if(confirm("Apakah anda Yakin akan menghapus menu ini ?"))
    {
        $.ajax({
            url:"delete.php",
            method:"POST",
            data:{kode_barcode:kode_barcode},
            success:function(data)
            {
                dataTable.ajax.reload();
            }
        });
    }
    else
    {
        return false;
    }
    });

    });

        

</script>