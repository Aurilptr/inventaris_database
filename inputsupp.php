<?php
// Koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$nama_supplier = $_POST['nama_supplier'];
$jenis_supplier = $_POST['jenis_supplier'];
$alamat_supplier = $_POST['alamat_supplier'];
$telepon_supplier = $_POST['telepon_supplier'];

// Masukkan data supplier ke tabel supplier
mysqli_query($koneksi, "INSERT INTO supplier (nama_supplier, jenis_supplier, alamat_supplier, telepon_supplier) VALUES ('$nama_supplier', '$jenis_supplier', '$alamat_supplier', '$telepon_supplier')");

// Mengalihkan halaman kembali ke halaman sebelumnya atau ke halaman supplier
header("Location: manager.php"); // ganti "supplier.php" sesuai dengan halaman tujuan Anda
?>
