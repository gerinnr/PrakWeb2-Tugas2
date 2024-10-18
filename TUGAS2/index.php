<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column; /* mengatur arah fleksibel menjadi kolom */
            justify-content: center; /* memusatkan secara vertikal */
            align-items: center; /* memusatkan secara horizontal */
            height: 100vh; /* tinggi penuh viewport */
            margin: 0; /* menghapus margin default */
            background-color: #e1e2e4; /* Warna latar belakang */
        }
        .content {
            text-align: center; /* memusatkan teks di dalam konten */
            max-width: 600px; /* mengatur lebar maksimum konten */
            margin-top: 0px; /* jarak dari atas untuk tidak terlalu tinggi */
        }
    </style>
</head>
<body>

<!-- Konten Utama -->
<div class="content">
    <h2>Selamat Datang di Sistem Akademik Kampusku</h2>
    <p class="lead">Silakan pilih opsi di bawah ini untuk melanjutkan.</p>
    
    <!-- Tombol untuk masuk ke sistem -->
    <a href="beranda.php" class="btn btn-success btn-lg">Masuk ke Sistem</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
