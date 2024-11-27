<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id_barang  = $_POST['id_barang'];
$kode       = $_POST['kode'];
$nama       = $_POST['nama'];
$jenis      = $_POST['jenis'];
$merk       = $_POST['merk'];
$stock      = $_POST['stock'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE barang SET kode = '$kode', nama = '$nama', jenis = '$jenis', merk = '$merk', stock = '$stock' WHERE id_barang = '$id_barang'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: manager.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>
