<?php include_once ('template_atas.php'); ?>
<?php
$judul = "";
$pengarang = "";
if(isset($_POST["judul"]))
    $judul = $_POST["judul"];
include "koneksi.php";
$sql = "SELECT * FROM buku WHERE judul like '%".$judul."%'
        order by idbuku desc";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
  die("Gagal query..".mysqli_error($kon));
?>
<a href="isi_buku.php">Input Buku</a>
&nbsp; &nbsp; &nbsp;
<a href="cari_buku.php">Cari Buku</a>
<table border="1">
    <tr>
        <th>Foto</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th></th>
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
            echo "<a href='info_buku.php'>Lihat Buku</a>";
            echo " | ";
            echo "<a href = 'buku_edit.php?idbuku =" . $row['idbuku']  ." '>
            Edit Buku</a>";
            echo " | ";
            echo "<a href = 'buku_hapus.php?idbuku=" . $row['idbuku'] . " '>
            Hapus Buku</a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
</table>
<?php include_once ('template_bawah.php'); ?>