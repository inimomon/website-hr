<?php 
require 'logic.php';
date_default_timezone_set('Asia/Jakarta');
$unit = $_GET['unit'];
$id = $_GET['id'];
$nik = $_GET['nik'];
$action = 'hapus';
$minute = date("i");
$hour = date("H");
$year = date("Y");
$date = date("d");
$month = date("m");
delete($id);
$stmt = $koneksi->prepare("INSERT INTO tb_log (action, bagian, nik, minute, hour, year, date, month) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiiiii", $action, $unit, $nik, $minute, $hour, $year, $date, $month);
$stmt->execute();
$stmt->close();
header("location:pages/bagian.php?unit=$unit");
?>