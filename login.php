<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    body {
        background-color: #ffe4e1; /* Warna latar belakang pastel pink */
        background-image: url('https://www.transparenttextures.com/patterns/paper.png'); /* Gambar pola latar belakang */
        background-size: cover; /* Mengatur ukuran gambar agar menutupi seluruh latar belakang */
        font-family: 'Roboto', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
    }
    .container {
        max-width: 400px;
        width: 100%;
    }
    .header {
        background-color: #ff007f; /* Warna header pastel pink */
        padding: 20px;
        border-radius: 10px 10px 0 0;
        text-align: center;
        color: #fff;
    }
    .form-container {
        background-color: #ffffff;
        padding: 30px 20px;
        border-radius: 0 0 10px 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-label {
        color: #333;
    }
    .form-control:focus {
        border-color: #ff007f; /* Warna border saat fokus */
        box-shadow: 0 0 5px rgba(255, 111, 97, 0.5);
    }
    .btn-custom {
        background-color: #ff007f; /* Warna tombol login */
        color: white;
        width: 100%;
        transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #e65c50; /* Warna tombol login saat hover */
    }
    .btn-cancel {
        background-color: #e5e5e5;
        color: #333;
        width: 100%; 
        margin-top: 10px; 
        transition: background-color 0.3s ease;
    }
    .btn-cancel:hover {
        background-color: #ccc;
    }
    footer.footer {
        margin-top: 20px;
        padding: 10px;
        text-align: center;
        font-size: 0.9rem;
        color: #666;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>

        <div class="form-container">
            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-custom">Login</button>
                <a href="index.php" class="btn btn-cancel">Cancel</a>
            </form>

            <?php
            // Memproses form login
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include 'koneksi.php';

                $username = $_POST['username'];
                $password = $_POST['password'];

                // Query untuk memeriksa username dan password
                $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

                if (mysqli_num_rows($result) > 0) {
                    // Ambil data user dan tentukan statusnya
                    $users = mysqli_fetch_assoc($result);
                    $status = $users['status'];

                    // Jika login berhasil, cek status untuk menentukan halaman tujuan
                    if ($status == 'Manager') {
                        header("Location: manager.php"); // Halaman untuk manager
                        exit();
                    } elseif ($status == 'Staff') {
                        header("Location: staff.php"); // Halaman untuk staff
                        exit();
                    }
                } else {
                    // Jika login gagal
                    echo '<div class="alert alert-danger mt-3" role="alert">Username atau password salah!</div>';
                }
            }
            ?>
        </div>

        <footer class="footer">
            &copy; 2024 Data Barang. All rights reserved.
        </footer>
    </div>
</body>
</html>
