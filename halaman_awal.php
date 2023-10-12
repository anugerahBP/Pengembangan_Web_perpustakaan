<?php
    session_start();
    if(!isset($_SESSION["user"])) {
        echo "Sesi Sudah Habis <br/>
              <a href='login.php'>LOGIN LAGI</a>";
        exit;
    }
    echo "SELAMAT DATANG <br/>";
    echo "USER : ".$_SESSION["user"]."<br/>";
    echo "NAMA : ".$_SESSION["nama_lengkap"]."<br/>";
    echo "AKSES : ".$_SESSION["akses"]."<br/>";
?>
<hr />
<div id="menu">
    <h2>LINK</h2>
    <a href="bukti_pinjam.php">Data Pinjam</a> <br /><br />
    <a href="logout.php"><input type="button" value="Logout"></a>
</div>