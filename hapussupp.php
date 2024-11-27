<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id_supplier yang dikirim dari URL
$id_supplier = $_GET['id_supplier'];
 
// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier='$id_supplier'");

// mengalihkan halaman kembali ke manager.php
header("location:manager.php");
?>
