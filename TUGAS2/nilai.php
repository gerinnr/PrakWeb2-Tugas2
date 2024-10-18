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