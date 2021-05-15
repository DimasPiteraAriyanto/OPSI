<?php 
	function kode_random($lenght){
	$data = "1234567890";
	$string = 'OPSI-';

	for ($i=0; $i < $lenght ; $i++) { 
		$pos = rand(0, strlen($data)-1);
		$string .=$data{$pos};
	}
		return $string;

}

$kode= kode_random(10);

//echo  $kode;

?>