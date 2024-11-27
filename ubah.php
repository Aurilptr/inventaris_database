<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffe4e1; 
        }
        .header {
            background-color: #ffb6c1; 
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffb6c1; 
            border-radius: 10px;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="text-white">Ubah Data Barang</h1>
        </div>

        <div class="mb-3">
            <form method="post" action="update.php">
                <table class="table table-bordered">
                    <tbody>
                        <?php
                        // Ambil ID dari URL
                        $id = $_GET['id']; // Misal menggunakan parameter GET

                        // Koneksi ke database
                        include 'koneksi.php';

                        // Ambil data berdasarkan ID
                        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
                        $data = mysqli_fetch_assoc($query);

                        // Jika data tidak ditemukan
                        if (!$data) {
                            echo '<tr><td colspan="2" class="text-center">Data tidak ditemukan!</td></tr>';
                        } else {
                            echo '<tr>
                                    <td class="form-label">Kode</td>
                                    <td><input class="form-control form-control-lg" type="text" name="kode" value="' . $data['kode'] . '" required></td>
                                  </tr>
                                  <tr>
                                    <td class="form-label">Nama Barang</td>
                                    <td><input class="form-control form-control-lg" type="text" name="nama" value="' . $data['nama'] . '" required></td>
                                  </tr>
                                  <tr>
                                    <td class="form-label">Jenis Barang</td>
                                    <td><input class="form-control form-control-lg" type="text" name="jenis" value="' . $data['jenis'] . '" required></td>
                                  </tr>
                                  <tr>
                                    <td class="form-label">Merk Barang</td>
                                    <td><input class="form-control form-control-lg" type="text" name="merk" value="' . $data['merk'] . '" required></td>
                                  </tr>
                                  <tr>
                                    <td class="form-label">Stock</td>
                                    <td><input class="form-control form-control-lg" type="number" name="stock" value="' . $data['stock'] . '" required></td>
                                  </tr>
                                  <input type="hidden" name="id_barang" value="' . $data['id_barang'] . '"> <!-- Menyimpan ID untuk update -->
                                  ';
                        }
                        ?>
                        <tr>
                            <td colspan="2" class="text-center">
                                <div class="d-flex justify-content-between">
                                    <a href="manager.php" class="btn btn-outline-danger btn-lg">Kembali</a>
                                    <button type="submit" class="btn btn-danger btn-lg">Simpan</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

        <footer class="footer">
            <p class="text-white">&copy; 2024 Data Barang. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
