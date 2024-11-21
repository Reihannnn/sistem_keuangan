<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Keuangan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background-color: #ffffff;
            padding: 3rem 1rem;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .hero img {
            max-width: 100%;
            height: auto;
        }
        .btn-custom {
            width: 150px;
            margin: 0 10px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1rem 0;
            color: #6c757d;
        }

        .navbar{
            display: 'flex';
            justify-content: 'space-between';
            padding : 2rem;
            align-items : 'center';
        }
    </style>
</head>
<body>
    <nav class = 'navbar'>
        <div></div>
        <div>            
            <a href="http://127.0.0.1:8000/dashboard/register" class="btn btn-warning btn-custom">Sign up</a>
            <a href="http://127.0.0.1:8000/dashboard/login" class="btn btn-primary btn-custom">Sign in</a>
        </div>
    </nav>
    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <img src="https://i.pinimg.com/736x/1a/59/79/1a5979ad4ad336d82821dea32ade9e86.jpg" alt="Sistem Keuangan">
            <h1 class="my-4">Selamat Datang di Sistem Keuangan</h1>
            <p class="lead">Kelola pemasukan dan pengeluaran Anda dengan mudah</p>
            <div class="mt-4">
            </div>
        </div>

        <!-- Features Section -->
        <div class="mt-5 text-center">
            <h2 class="mb-4">Fitur Utama</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                        <img src="https://i.pinimg.com/736x/a2/06/8b/a2068bf20f06cea9fec7963a9aaefe2c.jpg" class="card-img-top" alt="Pemasukan">
                        <div class="card-body">
                            <h5 class="card-title">Pemasukan</h5>
                            <p class="card-text">Catat semua pemasukan Anda untuk mengelola keuangan secara efektif.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                        <img src="https://i.pinimg.com/736x/1a/25/f8/1a25f8af618e8de9d56d691c38dd1244.jpg" class="card-img-top" alt="Pengeluaran">
                        <div class="card-body">
                            <h5 class="card-title">Pengeluaran</h5>
                            <p class="card-text">Pantau pengeluaran Anda agar tetap sesuai anggaran.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                        <img src="https://i.pinimg.com/236x/12/76/3c/12763cf1b10a8301a2daa1ab1c85d502.jpg" class="card-img-top" alt="Laporan Keuangan">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Keuangan</h5>
                            <p class="card-text">Dapatkan laporan keuangan lengkap setiap saat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Sistem Keuangan. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
