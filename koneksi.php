<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$password = "";
$dbName = "toko_buku";

$kon = mysqli_connect($host, $user, $password);
if (!$kon)
    die("Gagal Koneksi....");

$hasil = mysqli_select_db($kon, $dbName);
if (!$hasil); {
    $hasil = mysqli_query($kon,"CREATE DATABASE IF NOT EXISTS $dbName");
    if (!$hasil)
        die("Gagal Buat Database");
    else
        $hasil = mysqli_select_db($kon, $dbName);
    if (!$hasil) die("Gagal Konek Database");
}

$sqlTabelBuku = "CREATE TABLE if not exists buku (idbuku int auto_increment not null primary key, 
                 kode varchar(11) not null, judul varchar(40) not null, 
                 pengarang varchar(40) not null,penerbit varchar(40) not null, stok int not null default 0, 
                 foto varchar(40) not null)";

mysqli_query($kon, $sqlTabelBuku) or die("Gagal Buat Tabel Buku");

$sqlTabelHbuku = "CREATE TABLE IF NOT EXISTS hbuku (
                idhbuku int auto_increment not null primary key,
                tanggal date not null,
                nama varchar (40) not null,
                email varchar (50) not null default '',
                notelp varchar (20) not null default ''
                )";

mysqli_query($kon, $sqlTabelHbuku) or die ("Gagal Buat Tabel Header Buku");

$sqlTabelDbuku = "CREATE TABLE IF NOT EXISTS dbuku (
                iddbuku int auto_increment not null primary key,
                idhbuku int not null,
                idbuku int not null,
                qty int not null,
                harga int not null
                )";

mysqli_query($kon, $sqlTabelDbuku) or die("Gagal Buat Tabel Detail Buku");

$sqlTabelUser = "CREATE TABLE if not exists pengguna (
    idpengguna int auto_increment not null primary key,
    user varchar(25) not null,
    password varchar(50) not null,
    nama_lengkap varchar(50) not null,
    akses varchar(10) not null)";

mysqli_query($kon, $sqlTabelUser) or die("Gagal Buat Tabel Pengguna");

$sql = "SELECT * FROM pengguna";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);
if($jumlah == 0){
$sql = "INSERT into pengguna (user, password, nama_lengkap, akses)
VALUES ('Bayu', md5('bayu'), 'Bayu Pratama', 'peminjam')";
mysqli_query($kon, $sql);
}
?>