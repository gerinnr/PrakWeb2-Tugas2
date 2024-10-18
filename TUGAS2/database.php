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