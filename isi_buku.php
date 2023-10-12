<?php include_once ('template_atas.php'); ?>

<body>
    <form action="simpan_buku.php" method="post" enctype="multipart/form-data">
        <table width="545" border="0">
            <h1>Input Buku</h1>
            <hr>
            <tr>
                <td width="284">kode</td>
                <td width="221">:
                    <input name="kode" type="text" id="kode">
                </td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>:
                    <input name="judul" type="text" id="judul">
                </td>
            </tr>

            <tr>
                <td>Pengarang</td>
                <td>:
                    <input name="pengarang" type="text" id="pengarang">
                </td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:
                    <input name="penerbit" type="text" id="penerbit">
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:
                    <input name="stok" id="stok">
                </td>
            </tr>
            <tr>
                <td>Gambar [max=1.5mb]</td>
                <td>:<input type="file" name="foto"></td>
            </tr>
        </table>
        <hr>
        <p>
            <label>
                <input name="submit" type="submit" id="submit" value="Simpan" />
            </label>
            <label>
                <input name="reset" type="reset" id="reset" value="Reset" />
            </label>
        </p>
    </form>
</body>
<?php include_once ('template_bawah.php'); ?>