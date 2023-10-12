<?php
  $idbuku = $_GET['idbuku'];
  include "koneksi.php";
  $sql = "SELECT * FROM buku WHERE idbuku = '$idbuku' ";
  $hasil = mysqli_query($kon, $sql);
  if (!$hasil) die ('Gagal query...');

  $data = mysqli_fetch_array($hasil);
  $kode = $data['kode'];
  $judul = $data['judul'];
  $pengarang = $data['pengarang'];
  $penerbit = $data['penerbit'];
  $foto = $data["foto"];

  echo "<h2>KONFIRMASI HAPUS BUKU</h2>";
  echo "Foto : <img src'thumb/t_'".$foto."<br/>";
  echo "Kode Buku : ".$kode."<br/>";
  echo "Judul Buku: ".$judul."<br/>";
  echo "Pengarang: ".$pengarang."</br>";
  echo "Penerbit: ".$penerbit."</br>";
  echo "APAKAH DATA INI AKAN DIHAPUS? <br/>";
  echo "<a href ='buku_hapus.php?idbuku=$idbuku&hapus=1'> YA </a>";
  echo "&nbsp;&nbsp;";
  echo "<a href='buku_tampil.php'> TIDAK </a> <br/><br/>";

  if(isset($_GET['hapus'])) {
      $sql = "DELETE FROM buku WHERE idbuku = '$idbuku' ";
      $hasil = mysqli_query($kon,$sql);
      if (!$hasil) {
          echo "Gagal Hapus Buku: $nama ..<br/> ";
          echo "<a href = 'buku_tampil.php'>Kembali ke Daftar Buku</a>";
      } else {
          $gbr = "pict/$foto";
          if (file_exists($gbr)) unlink ($gbr); 
          $gbr = "thumb/t_$foto";
          if (file_exists($gbr)) unlink ($gbr); 
          header('location:buku_tampil.php');
      }
  }
?>