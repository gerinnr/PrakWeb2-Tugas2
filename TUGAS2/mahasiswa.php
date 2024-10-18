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