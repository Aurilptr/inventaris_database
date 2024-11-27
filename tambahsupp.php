<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #ffe4e1; }
        .header { background-color: #ffb6c1; padding: 20px; border-radius: 10px; text-align: center; margin-bottom: 20px; }
        .table { margin-top: 20px; background-color: #ffffff; border-radius: 10px; overflow: hidden; }
        .footer { margin-top: 20px; padding: 10px; background-color: #ffb6c1; border-radius: 10px; text-align: center; }
        .form-label { font-weight: bold; }
        td { text-align: center; vertical-align: middle; font-size: 1.1rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="text-white">Tambah Supplier</h1>
        </div>

        <div class="mb-3">
            <form method="post" action="inputsupp.php">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="form-label">Nama Supplier</td>
                            <td><input class="form-control form-control-lg" type="text" name="nama_supplier" required></td>
                        </tr>
                        <tr>
                            <td class="form-label">Jenis Supplier</td>
                            <td><input class="form-control form-control-lg" type="text" name="jenis_supplier" required></td>
                        </tr>
                        <tr>
                            <td class="form-label">Alamat Supplier</td>
                            <td><input class="form-control form-control-lg" type="text" name="alamat_supplier" required></td>
                        </tr>
                        <tr>
                            <td class="form-label">Telepon Supplier</td>
                            <td><input class="form-control form-control-lg" type="text" name="telepon_supplier" required></td>
                        </tr>
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
            <p class="text-white">&copy; 2024 Data Supplier. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
