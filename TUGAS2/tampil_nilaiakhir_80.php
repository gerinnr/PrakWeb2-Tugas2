<?php
//meng-include file nilai.php yang berisi class Nilai dan turunannya
require_once('nilai.php');
    //membuat instansiasi dari class nilaiAkhir80 untuk menampilkan data mahasiswa dengan nilai akhir <=79.99
    $nilai1 = new nilaiAkhir80();
    $dataNilai = $nilai1->tampilkanData();
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - Data Nilai Mahasiswa</title>
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
        <!-- judul navbar -->
        <a class="navbar-brand">Sistem Akademik</a>
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
            </ul>
        </div>
    </div>
</nav>
<!-- Container -->
<div class="container mt-5">
    <h1 class="header">Data Nilai Mahasiswa</h1>

    <!-- Tabel Data Nilai Mahasiswa -->
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr class="sub-heading">
                <!-- definisi header kolom tabel -->
                <th scope="col">ID Nilai</th>
                <th scope="col">Nilai</th>
                <th scope="col">Nilai Akhir</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">ID Matkul</th>
                <th scope="col">ID Semester</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code untuk fetch Data Mahasiswa -->
            <?php
            require_once('database.php'); //file koneksi database
            require_once('nilai.php');

            //mengecek apakah ada data nilai mahasiswa yang tersedia
            if (!empty($dataNilai)) {
                foreach ($dataNilai as $row) { //looping data mahasiswa
            

                echo "<tr>";
                echo "<td>" . $row['id_nilai'] . "</td>";
                echo "<td>" . $row['nilai'] . "</td>";
                echo "<td>" . $row['nilai_akhir'] . "</td>";
                echo "<td>" . $row['nama_mhs'] . "</td>";
                echo "<td>" . $row['id_matkul'] . "</td>";
                echo "<td>" . $row['id_semester'] . "</td>";
                echo "</tr>";
                }
            } else {
                //jika tidak ada data nilai mahasiswa, tampilkan pesan ini
                echo "<tr><td colspan='6' class='text-center'> Tidak ada data nilai mahasiswa. </td></tr>";
            }
            ?>
<!-- Footer -->
<!-- <footer class="bg-primary text-white text-center py-3 mt-5"> -->
    <!-- <p>&copy; 2024 Sistem Akademik</p> -->
<!-- </footer> -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>