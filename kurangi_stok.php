<?php
include 'koneksi.php';

// Memastikan ada data yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    // Ambil stok barang saat ini
    $result = mysqli_query($koneksi, "SELECT stock FROM barang WHERE id_barang = '$id_barang'");
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $stok_sekarang = $data['stock'];

        // Pastikan stok tidak negatif
        if ($stok_sekarang >= $jumlah) {
            $stok_baru = $stok_sekarang - $jumlah;

            // Update stok barang
            mysqli_query($koneksi, "UPDATE barang SET stock = '$stok_baru' WHERE id_barang = '$id_barang'");

            // Redirect kembali ke halaman staff
            header("Location: staff.php");
            exit();
        } else {
            echo "<script>alert('Stok tidak cukup'); window.history.back();</script>";
        }
    }
}
?>
