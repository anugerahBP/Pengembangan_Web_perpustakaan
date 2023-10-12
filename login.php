<?php include_once ('template_atas.php'); ?>
<style type="text/css">
.login {
    margin: 250px auto;
    width: 400px;
    padding: 10px;
    border: 1px solid #ccc;
    background: lightblue;
}
</style>
<div class="login">
    <h2 align="center">LOGIN</h2>
    <form method="post" action="login_proses.php">
        <table border="0" align="center">
            <tr>
                <td>USER</td>
                <td><input type="text" placeholder="user" name="pengguna" /></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td><input type="password" placeholder="password" name="kata_kunci"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</div>
<?php include_once ('template_bawah.php'); ?>