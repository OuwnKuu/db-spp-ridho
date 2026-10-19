<?php
include_once "../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $pesanError = array();
    if (trim($id_petugas) == "") {
        $pesanError[] = "Data <b>ID petugas</b> tidak boleh kosong!";
    }
    if (trim($username) == "") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong!";
    }
    if (trim($password) == "") {
        $pesanError[] = "Data <b>Password</b> tidak boleh kosong!";
    }
    if (trim($nama_petugas) == "") {
        $pesanError[] = "Data <b>Nama Petugas</b> tidak boleh kosong!";
    }
    if (trim($level) == "") {
        $pesanError[] = "Data <b>level</b> tidak boleh kosong!";
    }

    if (count($pesanError) >= 1) {
        $noPesan = 0;
        foreach ($pesanError as $indeks => $pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil <br>";
        }
        echo "<br>";
    } else {
        $sqlEdit = mysqli_query($koneksi, "UPDATE petugas SET username='$username', password='$password', nama_petugas='$nama_petugas', level='$level'
            WHERE id_petugas = '$id_petugas'");
        if ($sqlEdit) {
            echo "<center><b><font color='red' size='4'><p>Data Berhasil Diubah!</p>
                </font></b></center><br>
                <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
        } else {
            echo "<center><b><font color='red' size='4'><p>Data Gagal Diubah!</p>
                </font></b></center>
                <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
        }
        exit;
    }
}

$id_petugas = $_GET['id_petugas'];
$sql = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
$data = mysqli_fetch_array($sql);

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="lightgray"><strong>UBAH DATA petugas</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>ID petugas</td>
            <td>:</td>
            <td><input name="id_petugas" type="text" value="<?php echo $data['id_petugas']; ?>"
                size="10" maxlength="10"
                readonly="true"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input name="username" type="text" value="<?php echo $data['username']; ?>"
                size="50" maxlength="50"></td>
        </tr>
        <tr>
            <td>password</td>
            <td>:</td>
            <td><input name="password" type="text" value="<?php echo $data['password']; ?>"
                size="50" maxlength="50"></td>
        </tr>
        <tr>
            <td>Nama Petugas</td>
            <td>:</td>
            <td><input name="nama_petugas" type="nama_petugas" value="<?php echo $data['nama_petugas']; ?>"
                size="50" maxlength="50"></td>
        </tr>
        <tr>
            <td>Level</td>
            <td>:</td>
            <td>
                <select name="level">
                    <option value="Kosong">--- Pilih Level ---</option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan"></td>
        </tr>
    </table>
</form>