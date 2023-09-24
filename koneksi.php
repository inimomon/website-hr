<?php 
$koneksi = new mysqli('localhost','root','','hr_tc');

if($koneksi->connect_errno){
    echo $koneksi->connect_errno . ' - ' . $koneksi->connect_error;
}
?>