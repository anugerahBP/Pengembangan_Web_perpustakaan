<?php
  session_start();
  $pengguna = $_POST['pengguna'];
  $kata_kunci = md5($_POST['kata_kunci']);

  $datavalid = "YA";
  if (strlen(trim($pengguna))==0) {
      echo "User Harus Diisi! <br/>";
      $datavalid = "TIDAK";
  }
  if (strlen(trim($kata_kunci))==0) {
      echo "Password Harus Diisi! <br/>";
      $datavalid = "TIDAK";
  }
  if ($datavalid == "TIDAK") {
      echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
      echo "<input type='button' value='Kembali'
            onClick='self.history.back()'>";
      exit;
  }

  include "koneksi.php";
  $sql = "SELECT * FROM pengguna WHERE 
          user='".$pengguna."' and password='".$kata_kunci."' limit 1";
  $hasil = mysqli_query($kon, $sql) or die ('Gagal Akses <br/>');
  $jumlah = mysqli_num_rows($hasil);
  if($jumlah > 0) {
      $row = mysqli_fetch_assoc($hasil);
      $_SESSION["user"] = $row["user"];
      $_SESSION["nama_lengkap"] = $row["nama_lengkap"];
      $_SESSION["akses"] = $row["akses"];
      header("location: halaman_awal.php");
  }else{
      echo "User atau Password salah! <br/>";
      echo "<input type'button' value='Kembali'
            onClick='self.history.back()'>";
  }
?>