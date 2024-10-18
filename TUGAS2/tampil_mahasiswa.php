<?php
//mengimpor dile mahasiswa.php yang berisi class Mahasiswa
require_once 'mahasiswa.php';

//membuat objek dari class Mahasiswa
$mhs = new Mahasiswa();
//mengambil data mahasiswa dengan mengambil metode tampilkanData() dari class Mahasiswa
$dataMhs = $mhs->tampilkanData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #0077b6;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 23px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
            font-size: 30px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #95a5a6;
            text-align: center;
        }

        th {
            color: black;
        }

        td {
            background-color: #f1f9ff;
        }

        .sub-heading {
            background-color: #95a5a6;
            color: black;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- menu navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- link menuju halaman admin -->
                <li class="nav-item">
                    <a class="nav-link active" href="beranda.php">Admin</a>
                </li>
                <!-- link menuju halaman data mahasiswa -->
                <li class="nav-item">
                    <a class="nav-link" href="tampil_mahasiswa.php">Mahasiswa</a>
                </li>
                <!-- link untuk menampilkan nilai mahasiswa -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nilai</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="tampil_nilaiakhir_100.php">Nilai Akhir > 80 </a></li>
                        <li><a class="dropdown-item" href="tampil_nilaiakhir_80.php">Nilai Akhir < 80 </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Container -->
<div class="container mt-5">
    <h1 class="header">Data Mahasiswa</h1>

    <!-- Tabel Data Mahasiswa -->
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr class="sub-heading">
                <!-- definisi header kolom tabel -->
                <th scope="col">ID Mahasiswa</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">No. Telp</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code untuk fetch Data Mahasiswa -->
            <?php
            require_once('database.php'); //file koneksi database
            require_once('mahasiswa.php');

            //mengecek apakah ada data mahasiswa yang tersedia
            if (!empty($dataMhs)) {
                foreach ($dataMhs as $row) { //looping data mahasiswa
            

                echo "<tr>";
                echo "<td>" . $row['id_mahasiswa'] . "</td>";
                echo "<td>" . $row['nim'] . "</td>";
                echo "<td>" . $row['nama_mhs'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['no_telp'] . "</td>";
                echo "</tr>";
                }
            } else {
                //jika tidak ada data, tampilkan pesan ini
                echo "<tr><td colspan='7' class='text-center'> Tidak ada data mahasiswa. </td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>