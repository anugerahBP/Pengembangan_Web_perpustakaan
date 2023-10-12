<?php
  @session_start();
  $pengguna = isset($_SESSION["user"]) ? $_SESSION["user"] :"" ;
  $nama_lengkap = isset($_SESSION["nama_lengkap"]) ? $_SESSION["nama_lengkap"] :"" ;
  $akses =  isset($_SESSION["akses"]) ? $_SESSION["akses"] :"beli" ;
  if($akses == "akses"){
      $nama_akses = "Operator";
  }else{
      $nama_akses = "Peminjam";
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>APLIKASI PERPUSTAKAAN ONLINE</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="wrap">
        <div id="header">
            <h1>Perpustakaan Online</h1>
        </div>
        <div style="clear: both;"></div>
        <div id="tengah">
            <div id="info_pengguna">
                <?php
                  if(!empty($pengguna)){
                      echo "Sedang Login Sebagai : $pengguna <br/>,
                            Nama Lengkap : $nama_lengkap <br/>
                            Akses Sebagai : $sakses";
                      $tampil_login = "display:none";
                      $tampil_logout = "";
                  }else{
                      $tampil_login = "";
                      $tampil_logout = "display:none";
                  }
                ?>
                Tanggal : <?php echo date("d F Y") ?>
            </div>
            <div id="menu">
                <div id="menu_header">Menu</div>
                <div id="menu_konten">
                    <ul>
                        <?php
                          $tampil = "";
                          if($akses == "beli"){
                              $tampil = "display:none";
                          }
                        ?>
                        <li><a style="<?php echo $tampil?>" href="buku_tampil.php">Daftar Buku</a></li>
                        <li><a style="<?php echo $tampil?>" href="isi_buku.php">Input Buku</a></li>
                        <li><a href="buku_tersedia.php">Buku Tersedia</a></li>
                        <li><a href="buku_tampil.php">Daftar Buku</a></li>
                        <li><a href="Bukti_pinjam.php">Peminjaman Buku</a></li>
                        <li><a style="<?php echo $tampil_login ?>" href="login.php">Login</a></li>
                        <li><a style="<?php echo $tampil_login ?>" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div id="konten">