<?php
// Koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$merk = $_POST['merk'];
$jumlah_restock = $_POST['jumlah_restock'];
$tgl_restock = $_POST['tgl_restock'];
$id_supplier = $_POST['supplier'];

// Cek apakah kode barang sudah ada di tabel barang
$cek_kode = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode='$kode'");
$data_barang = mysqli_fetch_assoc($cek_kode);

if ($data_barang) {
    // Jika barang sudah ada, update stok barang
    $id_barang = $data_barang['id_barang'];
    $stok_sekarang = $data_barang['stock'];
    $stok_baru = $stok_sekarang + $jumlah_restock;
    
    mysqli_query($koneksi, "UPDATE barang SET stock='$stok_baru' WHERE id_barang='$id_barang'");
} else {
    // Jika barang belum ada, masukkan data barang baru
    mysqli_query($koneksi, "INSERT INTO barang (kode, nama, jenis, merk, stock) VALUES ('$kode', '$nama', '$jenis', '$merk', '$jumlah_restock')");
    $id_barang = mysqli_insert_id($koneksi); // Mengambil ID barang yang baru ditambahkan
}

// Masukkan catatan restock ke tabel restock
mysqli_query($koneksi, "INSERT INTO restock (jumlah_restock, tgl_restock, id_barang, id_supplier) VALUES ('$jumlah_restock', '$tgl_restock', '$id_barang', '$id_supplier')");

// Mengalihkan halaman kembali ke manager.php
header("Location: manager.php");
?>
