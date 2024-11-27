<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Barang, Supplier, dan Restock</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffe4e1;
        }
        table {
            margin: 20px 0;
            background-color: #ffffff;
            width: 100%;
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
        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center my-4 header">
            <h1 class="text-white">Data Barang, Supplier, dan Restock</h1>
        </header>

        <!-- Tabel Barang -->
        <h2 class="text-center">Data Barang</h2>
        <div class="table-container">
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
                    $data = mysqli_query($koneksi, "SELECT * FROM barang");
                    while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($d['kode']); ?></td>
                            <td><?php echo htmlspecialchars($d['nama']); ?></td>
                            <td><?php echo htmlspecialchars($d['jenis']); ?></td>
                            <td><?php echo htmlspecialchars($d['merk']); ?></td>
                            <td><?php echo htmlspecialchars($d['stock']); ?></td>
                            <td>
                                <a role="button" class="btn btn-info btn-custom" href="ubah.php?id=<?php echo $d['id_barang']; ?>">Edit</a>
                                <a role="button" class="btn btn-danger btn-custom" href="hapus.php?id=<?php echo $d['id_barang']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol Restock Barang -->
        <form method="POST" action="tambah.php" class="text-center mt-4">
            <button type="submit" class="btn btn-outline-danger btn-lg">Restock Barang</button>
        </form>

        <!-- Tabel Supplier -->
        <h2 class="text-center mt-5">Data Supplier</h2>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Jenis Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $suppliers = mysqli_query($koneksi, "SELECT * FROM supplier");
                    while ($supp = mysqli_fetch_array($suppliers)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($supp['nama_supplier']); ?></td>
                            <td><?php echo htmlspecialchars($supp['jenis_supplier']); ?></td>
                            <td><?php echo htmlspecialchars($supp['alamat_supplier']); ?></td>
                            <td><?php echo htmlspecialchars($supp['telepon_supplier']); ?></td>
                            <td>
                                <a role="button" class="btn btn-info btn-custom" href="ubahsupp.php?id_supplier=<?php echo $supp['id_supplier']; ?>">Edit</a>
                                <a role="button" class="btn btn-danger btn-custom" href="hapussupp.php?id_supplier=<?php echo $supp['id_supplier']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol Tambah Supplier -->
        <form method="POST" action="tambahsupp.php" class="text-center mt-4">
            <button type="submit" class="btn btn-outline-danger btn-lg">Tambah Supplier</button>
        </form>

        <!-- Tabel Restock -->
        <h2 class="text-center mt-5">Data Restock</h2>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Restock</th>
                        <th>Tanggal Restock</th>
                        <th>Nama Barang</th>
                        <th>Nama Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    // Query untuk mengambil data restock dengan nama barang dan supplier
                    $query = "SELECT restock.id_restock, restock.jumlah_restock, restock.tgl_restock, barang.nama, supplier.nama_supplier
                              FROM restock
                              JOIN barang ON restock.id_barang = barang.id_barang
                              JOIN supplier ON restock.id_supplier = supplier.id_supplier";
                    $data = mysqli_query($koneksi, $query);
                    while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($d['jumlah_restock']); ?></td>
                            <td><?php echo htmlspecialchars($d['tgl_restock']); ?></td>
                            <td><?php echo htmlspecialchars($d['nama']); ?></td>
                            <td><?php echo htmlspecialchars($d['nama_supplier']); ?></td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <footer class="text-center my-4 footer">
            <p class="text-white">&copy; 2024 Data Barang, Supplier, dan Restock. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
