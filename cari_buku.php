<?php include_once ('template_atas.php'); ?>
<form action="buku_tampil.php" method="post">
    <table width="300" border="0">
        <h2>CARI BUKU </h2>
        <hr>
        <tr>
            <td width="100">
        </tr>
        <tr>
            <td>
                Judul
            </td>
            <td><input type="text" name="judul" /></td>
        </tr>
        <br>
        <tr>
            <td>
                Pengarang
            </td>
            <td>
                <input type="text" name="pengarang" />
            </td>
        </tr>
    </table>
    <hr>
    <input type="submit" value="CARI">
</form>
<?php include_once ('template_bawah.php'); ?>