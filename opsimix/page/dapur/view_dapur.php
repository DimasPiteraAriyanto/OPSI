

<html>
   

<body>
    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-brown.css">


<h1>DAFTAR PESANAN YANG HARUS DIBUAT</h1>
	
        <!--AJAX Menampilkan Daftar Menu-->

		<h2 id="timestamp"></h2>

		<div class="data1"></div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</div>
</div>
</div>


<!--AJAX JQUERY-->

<script type="text/javascript">
function loadlink(){
    $('.data1').load('loadDapur.php',function () {
         $(this).unwrap();
    });
}

loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 5000);

// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
 
//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: 'ajaxtimestamp.php',
success: function(data) {
$('#timestamp').html(data);
},
});
}


	
</script>
</body>
</html>
