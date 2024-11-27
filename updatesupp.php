<?php
//include koneksi database
include('koneksi.php');

//get data dari form
$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$jenis_supplier = $_POST['jenis_supplier'];
$alamat_supplier = $_POST['alamat_supplier'];
$telepon_supplier = $_POST['telepon_supplier'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE supplier SET nama_supplier = '$nama_supplier', jenis_supplier = '$jenis_supplier', alamat_supplier = '$alamat_supplier', telepon_supplier = '$telepon_supplier' WHERE id_supplier = '$id_supplier'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($query)) {
    //redirect ke halaman manager.php 
    header("location: manager.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}
?>
