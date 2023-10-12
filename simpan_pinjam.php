<?php
 $nama = $_POST['nama'];
 $email = $_POST['email'];
 $notelp = $_POST['notelp'];
 $tanggal = $_POST["Ymd"];
 $barang_pilih = '';
 $qty = 1;
 
 $dataValid = "YA";
 if(strlen(trim($nama))==0) {
     echo "Nama harus di isi.. <br/>";
     $dataValid = "TIDAK";
 }
 if(strlen(trim($notelp))==0) {
     echo "No. Telp harus di isi.. <br/>";
     $dataValid = "TIDAK";
 }
 if(isset($_COOKIE['keranjang'])) {
     $barang_pilih = $_COOKIE['keranjang'];
 }else{
     echo "Keranjang Belanja Kosong <br/>";
     $dataValid = "TIDAK";
 }
 if ($dataValid == "TIDAK") {
     echo "Masih ada kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
     onClick='self.history.back() '>";
     exit;
 }

include "koneksi.php";

$simpan = true;
$mulai_transaksi = mysqli_begin_transaction($kon);

$sql = "INSERT into hbuku (tanggal, nama, email, notelp) 
        VALUES ('$tanggal', '$nama', '$email', '$notelp')";
$hasil = mysqli_query($kon, $sql);
if(!$hasil){
    echo "Data Customer Gagal Simpan";
    $simpan = false;
}

$idhbuku = mysqli_insert_id($kon);
if($idhbuku == 0){
    echo "Data Customer Tidak Ada";
    $simpan = false;
}

$buku_array = explode(",", $buku_pilih);
$jumlah =count($buku_array);
if($jumlah <= 1){
    echo "Tidak Ada Buku Yang Dipilih <br/>";
    $simpan = false;
}else{
    foreach($buku_array as $idbuku){
        if($idbuku == 0){
            continue;
        }
        $sql = "SELECT * FROM buku WHERE idbuku = $idbuku";
        $hasil = mysqli_query($kon, $sql);
        if(!$hasil){
            echo "Buku Tidak Ada <br/>";
            $simpan = false;
        break;
        }else{
        $row = mysqli_fetch_assoc($hasil);
        $stok = $row['stok'] - 1;
        if($stok < 0){
            echo "Stok Buku".$row['judul']."Kosong <br/>";
            $simpan = false;
        break; 
        }
        $harga = $row['harga'];
    }
    $sql = "INSERT into dbuku (idhbuku, idbuku, qty, harga)
            VALUES ('$idhbuku', '$idbuku', '$qty', '$harga')";
    $hasil = mysqli_query($kon, $sql);
    if(!$hasil){
        echo "Detail Pinjam Gagal Simpan <br/>";
        $simpan = false;
        break;
    }
    $sql = "UPDATE buku set stok = $stok
            WHERE idbuku = $idbuku";
    $hasil = mysqli_query($kon, $sql);
    if(!$hasil){
        echo "Update Stok Buku Gagal <br/>";
        $simpan = false;
        break;
    }
  }
}

if($simpan){
    $komit = mysqli_commit($kon);
}else{
    $rollback = mysqli_rollback($kon);
    echo "Peminjaman Gagal <br/>
          <input type='button' value='Kembali'
          onClick='self.history.back()'>";
    exit;
}
header("Location: bukti_pinjam.php?idhjual=$idhbuku");
setcookie('keranjang', $buku_pilih, time()-3600);
 ?>