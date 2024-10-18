# PrakWeb2-Tugas2


## TUGAS 2 
1. Membuat View berbasis OOP, dengan mengambil data dari database MySQL. <br>
2. Gunakan _construct sebagai tautan ke database. <br>
3. Terapkan encapsulation sesuai logika studi kasus. <br>
4. Buatlah kelas turunan dengan menggunakan konsep pewarisan. <br>
5. Terapkan polymorhphism untuk setidaknya 2 peran sesuai dengan studi kasus. <br>


### Case Study Table Mahasiswa dan Nilai
![image](https://github.com/user-attachments/assets/698a8904-82d2-4d84-b70b-d2567271b7e0)

## Langkah - langkah Membuat Sistem <br>

**1. Membuat View berbasis OOP, dengan mengambil data dari database MySQL. <br>**

  - Langkah pertama yaitu membuat database dengan nama `db_akademik`, setelah itu membuat table `mahasiswa` dan table `nilai`.<br>
  ![image](https://github.com/user-attachments/assets/4e6bc287-7e62-40bc-a49c-560619448030)

  - Table `mahasiswa` <br>
  ![image](https://github.com/user-attachments/assets/969a0fde-9c6a-4d74-b866-25a76cdbaad3)

  - Table `nilai` <br>
  ![image](https://github.com/user-attachments/assets/2a1c5911-bd3c-4891-b84a-25162cdbd6f4)

```php
<?php
class Database {

//properti untuk menyimpan informasi koneksi ke database
private $host = 'localhost'; //alamat server database
private $username = 'root'; //username database
private $password = ''; //password database 
private $database = 'db_akademik'; //nama database

protected $conn; //properti untuk menyimpan objek koneksi

//constructor untuk melakukan koneksi ke database saat objek dibuat
public function __construct() {
    //membuat koneksi ke database menggunakan class mysqli
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

    //mengecek apakah ada error dalam koneksi
    if ($this->conn->connect_error) {
        //apabila ada error, hentikan eksekusi dan tampilkan pesan error
        die("Koneksi gagal: " . $this->conn->connect_error);
    }
}
//fungsi untuk mendapatkan koneksi ke database
public function getConnection() {
    return $this->conn;//mengembalikan objek koneksi yang tersimpan dalam properti $conn
}
//fungsi untuk menampilkan data yang diambil dari database
public function tampilkanData() {
}
}
?>
```

Lalu membuat kelas PHP dengan nama `database`, kelas ini dibuat untuk mengelola koneksi ke database MySQL. Deklarasikan properti untuk menyimpan informasi koneksi ke database, yang mencakup `$host`, `$username`, `$password`, `$database`. Properti `$conn` yang terproteksi digunakan untuk menyimpan objek koneksi. <br>

Buat constructor `__construct()` yang akan dipanggil saat objek kelas dibuat, gunakan `new mysqli()` untuk membuat koneksi ke database dengan menggunakan informasi dari properti yang telah didefinisikan. Tambahkan pemeriksaan untuk menangani kesalahan koneksi. Jika terjadi kesalahan, hentikan eksekusi dan tampilkan pesan error. <br>

Buat fungsi `getCOnnection()` yang akan mengembalikan koneksi `$conn`. Definisikan fungsi `tampilkanData()`.



**2. Gunakan _construct sebagai tautan ke database. <br>**

```php
//constructor untuk melakukan koneksi ke database saat objek dibuat
public function __construct() {
    //membuat koneksi ke database menggunakan class mysqli
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
```
Bagian constructor `__construct` dalam kelas `Database` berfungsi untuk menginisialisasi koneksi ke database saat objek kelas `database` dibuat. Objek koneksi dibuat menggunakan kelas mysqli, setelah mencoba untuk menghubungkan, terdapat pemeriksaan untuk mendeteksi apakah ada salah koneksi dengan memeriksa `connect_error` dari objek koneksi. Jika terjadi kesalahan, eksekusi dihentikan menggunakan perintah `die()` yang menampilkan pesan "Koneksi gagal:" diikuti dengan rincian kesalahan.




**3. Terapkan encapsulation sesuai logika studi kasus. <br>**

```php
<?php
class Database {

//properti untuk menyimpan informasi koneksi ke database
private $host = 'localhost'; //alamat server database
private $username = 'root'; //username database
private $password = ''; //password database 
private $database = 'db_akademik'; //nama database

protected $conn; //properti untuk menyimpan objek koneksi

//constructor untuk melakukan koneksi ke database saat objek dibuat
public function __construct() {
    //membuat koneksi ke database menggunakan class mysqli
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

    //mengecek apakah ada error dalam koneksi
    if ($this->conn->connect_error) {
        //apabila ada error, hentikan eksekusi dan tampilkan pesan error
        die("Koneksi gagal: " . $this->conn->connect_error);
    }
}
//fungsi untuk mendapatkan koneksi ke database
public function getConnection() {
    return $this->conn;//mengembalikan objek koneksi yang tersimpan dalam properti $conn
}
//fungsi untuk menampilkan data yang diambil dari database
public function tampilkanData() {
}
}
?>
```
Enkapsulasi diterapkan melalui penggunaan visibilitas atau access modifiers seperti private dan protected pada properti dan metode kelas `Database`. Properti yang dideklarasikan private artinya hanya dapat diakses dari dalam kelas `Database` itu sendiri, yang mana properti ini tidak dapat diakses langsung dari luar kelas, sehingga informasi sensitif seperti username dan password database terlindungi. Properti yang dideklarasikan protected, properti tersebut dapat diakses dari dalam kelas `Database` dan juga kelas-kelas yang mewarisinya. Metode `getConnection()` yang bersifat public, artinya dapat diakses dari luar kelas.<br>




**4. Buatlah kelas turunan dengan menggunakan konsep inheritance (pewarisan). <br>**

  - Mendeklarasikan kelas `Mahasiswa`
    
```php
    <?php
//meng-include file 'database.php' yang berisi class Database
include_once 'database.php';
//membuat class Mahasiswa yang mewarisi class Database
class Mahasiswa extends Database {

    //metode untuk menampilkan data mahasiswa dari tabel mahasiswa di database
    public function tampilkanData() {
        //SQL query untuk mengambil semua data dari tabel mahasiswa 
        $sql = "SELECT * FROM mahasiswa";
        //menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = $this->conn->query($sql);

        //inisialisasi array kosong untuk menampung hasil data mahasiswa
        $hasil = [];
        //mengecek apakah query mengembalikan hasil yang valid dan apakah terdapat data yang ditemukan
        if ($data && mysqli_num_rows($data) > 0) {
            //mengambil setiap baris data hasil query sebagai array dan menyimpannya ke dalam array $hasil
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        //mengembalikan array hasil yang berisi data mahasiswa 
        return $hasil;
    }
    }
    //membuat objek $mhs dari class Mahasiswa
    $mhs = new Mahasiswa();
    //memanggil metode tampilkanData() untuk mendapatkan data mahasiswa dan menyimpan hasilnya di variabel $dataMhs
    $dataMhs = $mhs->tampilkanData();
?>
```

Membuat kelas turunan yaitu kelas `Mahasiswa`, subclass dari kelas `Database` yang dirancang untuk mengelola dan menampilkan data mahasiswa yang tersimpan dalam database. Dengan mewarisi fungsi-fungsi dari kelas `Database`, kelas ini memanfaatkan koneksi database yang sudah ada untuk menjalankan operasi pengambilan data. Metode utama `tampilkanData()`, berfungsi untuk menjalankan query SQL yang menggabungkan tabel `mahasiswa` dan `nilai`, sehingga memungkinkan pengambilan data mahasiswa. Setelah mengeksekusi query, kelas ini memeriksa valid atau tidak hasilnya dan menyimpan setiap baris data yang ditemukan dalam sebuah array sebelum mengembalikannya. <br>

  - Mendeklarasikan kelas `Nilai`
```php
<?php
//meng-include file 'database.php' yang berisi class Database
include_once 'database.php';

//membuat class Nilai yang mewarisi class Database
class Nilai extends Database {

    //metode untuk menampilkan data nilai mahasiswa
    public function tampilkanData() {
        //SQL query untuk mengambil data dari tabel nilai, lalu join dengan tabel mahasiswa berdasarkan id_mahasiswa
        $sql = "SELECT * FROM nilai JOIN mahasiswa ON nilai.id_mahasiswa = mahasiswa.id_mahasiswa";
        //menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = $this->conn->query($sql);
        
        //inisialisasi array kosong untuk menampung hasil data
        $hasil = [];
        //mengecek apakah query mengembalikan hasil yang valid dan apakah ada data yang ditemukan
        if ($data && mysqli_num_rows($data) > 0) {
            //mengambil setiap baris data hasil query sebagai array dan menyimpannya ke array $hasil
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        //mengembalikan array hasil yang berisi data nilai dan mahasiswa
        return $hasil;
    }
}
```

Membuat kelas turunan yaitu kelas `Nilai`, subclass dari kelas `Database` yang dirancang untuk mengelola dan menampilkan data nilai mahasiswa. Dengan mewarisi fungsi-fungsi dari kelas `Database`, kelas ini memanfaatkan koneksi database yang sudah ada untuk menjalankan operasi pengambilan data. Metode utama `tampilkanData()`, berfungsi untuk menjalankan query SQL yang menggabungkan tabel 'mahasiswa' dan 'nilai', sehingga memungkinkan pengambilan data nilai beserta informasi terkait mahasiswa secara bersamaan. Setelah mengeksekusi query, kelas ini memeriksa valid atau tidak hasilnya dan menyimpan setiap baris data yang ditemukan dalam sebuah array sebelum mengembalikannya. <br>

  - Membuat kelas turunan `nilaiAkhir80` dari kelas `Nilai`
```php
//membuat subclass nilaiAkhir80 yang mewarisi class Nilai
class nilaiAkhir80 extends Nilai {
    
    //metode untuk menampilkan data mahasiswa dengan nilai akhir di bawah atau sama dengan 79.99
    public function tampilkanData() {
        //SQL query untuk mengambil data nilai dengan nilai akhir <=79.99 dan join dengan tabel mahasiswa
        $sql = "SELECT * FROM nilai JOIN mahasiswa ON nilai.id_mahasiswa = mahasiswa.id_mahasiswa WHERE nilai_akhir <= 79.99";
        //menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = $this->conn->query($sql);
    
        //inisialisasi array kosong untuk menampung hasil data
        $hasil = [];
        //mengecek apakah query mengembalikan hasil yang valid dan apakah ada data yang ditemukan
        if ($data && mysqli_num_rows($data) > 0) {
            //mengambil setiap baris data hasil query sebagai array dan menyimpannya ke array $hasil
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        //mengembalikan array hasil yang berisi data mahasiswa dengan nilai akhir <=79.99
        return $hasil;
    }
}
```

Membuat kelas turunan yaitu kelas `nilaiAkhir80`, subclass dari kelas `Nilai` yang bertujuan untuk mengelola dan menampilkan data mahasiswa dengan nilai akhir di bawah atau sama dengan 79.99. Dengan mewarisi kelas `Nilai`, kelas ini dapat memanfaatkan koneksi database yang sudah ada untuk menjalankan operasi pengambilan data. Metode utama, `tampilkanData()`, menjalankan query SQL yang menggabungkan tabel nilai dan mahasiswa, dengan kriteria untuk hanya mengambil mahasiswa yang memiliki nilai akhir di bawah atau sama dengan 79.99. <br>

  - Membuat kelas turunan `nilaiAkhir100` dari kelas `Nilai`
```php
//membuat subclass nilaiAkhir80 yang mewarisi class Nilai
class nilaiAkhir100 extends Nilai {
    
    //metode untuk menampilkan data mahasiswa dengan nilai akhir di atas atau sama dengan 80.00
    public function tampilkanData() {
        //SQL query untuk mengambil data nilai dengan nilai akhir >= 80.00 dan join dengan tabel mahasiswa
        $sql = "SELECT * FROM nilai JOIN mahasiswa ON nilai.id_mahasiswa = mahasiswa.id_mahasiswa WHERE nilai_akhir >= 80.00";
        //menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = $this->conn->query($sql);
    
        //inisialisasi array kosong untuk menampung hasil data
        $hasil = [];
        //mengecek apakah query mengembalikan hasil yang valid dan apakah ada data yang ditemukan
        if ($data && mysqli_num_rows($data) > 0) {
            //mengambil setiap baris data hasil query sebagai array dan menyimpannya ke array $hasil
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        //mengembalikan array hasil yang berisi data mahasiswa dengan nilai akhir >=80.00
        return $hasil;
    }
}
?>
```
Membuat kelas turunan yaitu kelas `nilaiAkhir100`, subclass dari kelas `Nilai` yang bertujuan untuk mengelola dan menampilkan data mahasiswa dengan nilai akhir di atas atau sama dengan 80.00. Dengan mewarisi kelas `Nilai`, kelas ini dapat memanfaatkan koneksi database yang sudah ada untuk menjalankan operasi pengambilan data. Metode utama, `tampilkanData()`, menjalankan query SQL yang menggabungkan tabel nilai dan mahasiswa, dengan kriteria untuk hanya mengambil mahasiswa yang memiliki nilai akhir di atas atau sama dengan 80.00. <br>




**5. Terapkan polymorhphism untuk setidaknya 2 peran sesuai dengan studi kasus. <br>**

  - Membuat turunan dari kelas `Nilai` yaitu `nilaiAkhir80` dan `nilaiAkhir100 `
    
```php deskr
<?php
//meng-include file 
include_once 'database.php';

//membuat class Nilai yang mewarisi class Database
class Nilai extends Database {

    //metode untuk menampilkan data nilai mahasiswa
    public function tampilkanData() {
        //SQL query untuk mengambil data dari tabel nilai, lalu join dengan tabel mahasiswa berdasarkan id_mahasiswa
        $sql = "SELECT * FROM nilai JOIN mahasiswa ON nilai.id_mahasiswa = mahasiswa.id_mahasiswa";
        //menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = $this->conn->query($sql);
        
        //inisialisasi array kosong untuk menampung hasil data
        $hasil = [];
        //mengecek apakah query mengembalikan hasil yang valid dan apakah ada data yang ditemukan
        if ($data && mysqli_num_rows($data) > 0) {
            //mengambil setiap baris data hasil query sebagai array dan menyimpannya ke array $hasil
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        //mengembalikan array hasil yang berisi data nilai dan mahasiswa
        return $hasil;
    }
}

//membuat subclass nilaiAkhir80 yang mewarisi class Nilai
class nilaiAkhir80 extends Nilai {
    
    //metode untuk menampilkan data mahasiswa dengan nilai akhir di bawah atau sama dengan 79.99
    public function tampilkanData() {
        //SQL query untuk mengambil data nilai dengan nilai akhir <=79.99 dan join dengan tabel mahasiswa
        $sql = "SELECT * FROM nilai JOIN mahasiswa ON nilai.id_mahasiswa = mahasiswa.id_mahasiswa WHERE nilai_akhir <= 79.99";
        //menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = $this->conn->query($sql);
    
        //inisialisasi array kosong untuk menampung hasil data
        $hasil = [];
        //mengecek apakah query mengembalikan hasil yang valid dan apakah ada data yang ditemukan
        if ($data && mysqli_num_rows($data) > 0) {
            //mengambil setiap baris data hasil query sebagai array dan menyimpannya ke array $hasil
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        //mengembalikan array hasil yang berisi data mahasiswa dengan nilai akhir <=79.99
        return $hasil;
    }
}

//membuat subclass nilaiAkhir80 yang mewarisi class Nilai
class nilaiAkhir100 extends Nilai {
    
    //metode untuk menampilkan data mahasiswa dengan nilai akhir di atas atau sama dengan 80.00
    public function tampilkanData() {
        //SQL query untuk mengambil data nilai dengan nilai akhir >= 80.00 dan join dengan tabel mahasiswa
        $sql = "SELECT * FROM nilai JOIN mahasiswa ON nilai.id_mahasiswa = mahasiswa.id_mahasiswa WHERE nilai_akhir >= 80.00";
        //menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = $this->conn->query($sql);
    
        //inisialisasi array kosong untuk menampung hasil data
        $hasil = [];
        //mengecek apakah query mengembalikan hasil yang valid dan apakah ada data yang ditemukan
        if ($data && mysqli_num_rows($data) > 0) {
            //mengambil setiap baris data hasil query sebagai array dan menyimpannya ke array $hasil
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        //mengembalikan array hasil yang berisi data mahasiswa dengan nilai akhir >=80.00
        return $hasil;
    }
}
?>
```
Script di atas menunjukkan penggunaan konsep polymorphism dalam pemrograman berorientasi objek, khususnya dalam konteks kelas yang mewarisi satu sama lain. Terdapat tiga kelas utama yaitu `Nilai`, `nilaiAkhir80`, dan `nilaiAkhir100`. <br>

Kelas `Nilai` berfungsi sebagai superclass yang menyediakan metode dasar `tampilkanData()` untuk menampilkan data nilai mahasiswa dengan menggabungkan tabel nilai dan mahasiswa. Kelas ini berisi logika umum untuk mengambil data dari database. <br>

Kemudian, dua subclass `nilaiAkhir80` dan `nilaiAkhir100` mewarisi kelas `Nilai` dan mengoverride metode `tampilkanData()`. Masing-masing subclass ini memiliki implementasi spesifik yang mengatur query SQL sesuai kriteria yang berbeda: `nilaiAkhir80` mengambil data mahasiswa dengan nilai akhir di bawah atau sama dengan 79.99, sedangkan `nilaiAkhir100` mengambil data mahasiswa dengan nilai akhir di atas atau sama dengan 80.00.

**#Tampilan Awal Saat Membuka Sistem**
```php
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
```
**Output :** <br>

![image](https://github.com/user-attachments/assets/ee04bdb7-004f-4867-932a-d7a18cbe130a)

**#Setelah meng-klik button masuk ke sistem, masuk ke beranda untuk menampilkan data keseluruhan pada navbar 'Admin'** 

```php
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
<!-- Container -->
<div class="container mt-5">
    <h1 class="header">Data Nilai Mahasiswa</h1>

    <!-- Tabel Data Nilai Mahasiswa -->
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
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
            require_once('nilai.php'); //file model nilai

            $nilai1 = new Nilai();
            $dataNilai = $nilai1->tampilkanData();//memanggil fungsi untuk mendapatkan data nilai

            //mengecek apakah ada data nilai yang tersedia
            if (!empty($dataNilai)) {
                foreach ($dataNilai as $row) { //looping data nilai
            

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
<!-- <footer class="bg-primary text-white text-bottom"> 
    <p>&copy; 2024 Sistem Akademik</p> 
 </footer>  -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

**Output :** <br>

![image](https://github.com/user-attachments/assets/c612d32e-f383-45aa-84f7-fc00074396c5) 

![image](https://github.com/user-attachments/assets/a493e0ed-5fd2-41f1-82fa-2d388b3d8ad9)

**#Pilih Menu Data Mahasiswa** <br>

**Output :** <br>

![image](https://github.com/user-attachments/assets/ab4fc52c-c09c-434d-9ec2-8bee9d119d31)

**#Pilih Menu Data Nilai Mahasiswa di Atas 80**

**Output :** <br>

  - Data nilai mahasiswa di atas 80. <br>
![image](https://github.com/user-attachments/assets/3f65b762-f503-4b64-85e1-ca913a93911e)

**#Pilih Menu Data Nilai Mahasiswa di Bawah 80**

**Output :**
  - Data nilai mahasiswa di bawah 80. <br>
![image](https://github.com/user-attachments/assets/a948bbba-fefa-424f-a465-a0a8a8902153)
