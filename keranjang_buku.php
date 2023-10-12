<?php
 $buku_pilih = 0;
 if(isset($_COOKIE['keranjang'])){
     $buku_pilih = $_COOKIE['keranjang'];
 }
 if(isset($_GET['idbuku'])){
     $idbuku = $_GET['idbuku'];
     $buku_pilih = $buku_pilih . "," . $idbuku;
     setcookie('keranjang', $buku_pilih, time()+3600);
 }
 include "koneksi.php";
 $sql = " SELECT * FROM buku WHERE idbuku in (".$buku_pilih.")
        and stok > 0 order by idbuku desc ";
 $hasil = mysqli_query($kon,$sql);
 if (!$hasil)
    die("Gagal query..");
?>
<h2> KERANJANG PEMINJAMAN </h2>
<table border="1">
    <tr>
        <th>Foto</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Operasi</th>
    </tr>
    <?php
        $no = 0;
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo " <td> <a href ='pict/{$row['foto']}' /> 
                   <img src='thumb/{$row['foto']}' width='100' />
                   </a></td>";
            echo "<td>".$row['judul']."</td>";
            echo "<td>".$row['pengarang']."</td>";
            echo "<td>";
            echo " <a href='".$_SERVER['PHP_SELF']."?idbuku=".
                    $row['idbuku']."' > BATAL </a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
</table>