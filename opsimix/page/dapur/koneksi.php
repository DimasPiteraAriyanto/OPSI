<?php
$connection = new PDO( 'mysql:host=localhost;dbname=opsimix', 'root', '' );
?>
               <?php
               $con = mysqli_connect('localhost','root','','opsimix');
                if(mysqli_connect_error()){
                    echo mysqli_connect_error();
                }
                ?>