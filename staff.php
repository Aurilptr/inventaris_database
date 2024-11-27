<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffe4e1; 
        }
        table {
            margin: 20px 0;
            background-color: #ffffff; 
        }
        tr:hover {
            background-color: #ffcccb; 
        }
        th, td {
            text-align: center; 
            vertical-align: middle; 
        }
        .btn-custom {
            margin: 5px;
        }
        .header {
            background-color: #ffb6c1; 
            padding: 20px;
            border-radius: 10px;
        }
        .footer {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffb6c1; 
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center my-4 header">
            <h1 class="text-white">Data Barang</h1>
        </header>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from barang");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($d['kode']); ?></td>
                        <td><?php echo htmlspecialchars($d['nama']); ?></td>
                        <td><?php echo htmlspecialchars($d['jenis']); ?></td>
                        <td><?php echo htmlspecialchars($d['merk']); ?></td>
                        <td><?php echo htmlspecialchars($d['stock']); ?></td>
                        <td>
                            <form method="POST" action="kurangi_stok.php" style="display:inline;">
                                <input type="hidden" name="id_barang" value="<?php echo $d['id_barang']; ?>">
                                <input type="number" name="jumlah" value="1" min="1" max="<?php echo $d['stock']; ?>" class="form-control-sm" style="width: 60px; display:inline-block;" required>
                                <button type="submit" class="btn btn-warning btn-custom">Kurangi Stok</button>
                            </form>
                        </td>
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>

        <footer class="text-center my-4 footer">
            <p class="text-white">&copy; 2024 Data Barang. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
