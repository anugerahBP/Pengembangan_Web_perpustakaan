<?php include_once ('template_atas.php'); ?>
<style type="text/css">
@media print {
    #tombol {
        display: none;
    }
}
</style>
<div>
    <input type="button" value="Beli Lagi" onClick="window.location.assign('barang_tersedia.php')">
    <input type="button" value="Print" onclick="window.print()">
</div>
<?php
    include "koneksi.php";
    $sqlhbuku= "SELECT * FROM hbuku WHERE idhbuku = 0";
    $hasilhbuku = mysqli_query($kon, $sqlhbuku);
    $rowhbuku = mysqli_fetch_assoc($hasilhbuku);

    echo "<pre>";
    echo "<h2> BUKTI PEMINJAMAN </h2>";
    echo "NO.      : ".date("Ymd")."<br/>";
    echo "TANGGAL  : ".date("Y-m-d")."<br/>";
    echo "NAMA     : "."Bayu<br/>";
    $sqldbuku = "SELECT buku.judul, dbuku.harga, dbuku.qty,
                (dbuku.harga * dbuku.qty) AS jumlah
                FROM dbuku INNER JOIN buku
                ON dbuku.idbuku = buku.idbuku
                WHERE dbuku.idhbuku = 0";
    $hasildbuku = mysqli_query($kon, $sqldbuku);
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr>";
    echo "<th> Judul Buku </th>";
    echo "<th> Pengarang </th>";
    echo "</tr>";
    $totalharga = 0;
    while($rowdbuku = mysqli_fetch_assoc($hasildbuku)){
        echo "<tr>";
        echo " <td> ".$rowdbuku['judul']." </td>";
        echo " <td align='rigth'> DIDIK SETIAWAN </td>";
        echo "</tr>";
    }
    echo "<tr>";
    echo " <td colspan='1' align='rigth'>";
    echo " <strong>Total Buku</strong> </td>";
    echo " <td align='rigth'><strong>1</strong> </td>";
    echo "</tr>";
    echo "</table>";
    echo "</pre>";
?>
<?php include_once ('template_bawah.php'); ?>