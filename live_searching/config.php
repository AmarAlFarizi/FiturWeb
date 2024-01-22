<?php

$con = mysqli_connect("localhost","root","","progresbuku");

if(!$con){
    echo "Koneksi Gagal" . mysqli_connect_error() ;
}
?>