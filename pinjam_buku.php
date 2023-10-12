<h2>DATA PEMINJAMAN BUKU</h2>
<form action="simpan_pinjam.php" method="POST">
    <table border="0">
        <tr>
            <td>Nama</td>
            <td>: <input type="text" name="nama" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <input type="email" name="email"></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td>: <input type="text" name="notelp"></td>
        </tr>
        <tr>
            <td colspan="2" align="rigth">
                <input type="submit" value="Simpan">
            </td>
        </tr>
    </table>
</form>
<?php
    include_once("keranjang_buku.php");
?>