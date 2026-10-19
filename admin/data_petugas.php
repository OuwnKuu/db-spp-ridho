<?php
include_once "../src/koneksi.php";
?>

<h1><b>DATA PETUGAS</b></h1>
<h4><a href="?open=tambah_petugas">+ Tambah Petugas</a></h4>
<table cellspacing="1" cellpadding="3" border="1">
    <tr bgcolor="lightgray">
        <td width="5%"><b>No</b></td>
        <td width="10%"><b>ID Petugas</b></td>
        <td width="15%"><b>Username</b></td>
        <td width="15%"><b>Nama Petugas</b></td>
        <td width="10%"><b>Level</b></td>
        <td colspan="2" align="center"><b>Tools</b></td>
    </tr>
    <?php
    $sql = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY id_petugas ASC");
    $nomor = 0;
    while ($data = mysqli_fetch_array($sql)) {
        $nomor++;
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $data['id_petugas']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['nama_petugas']; ?></td>
            <td><?php echo $data['level']; ?></td>
            <td width="9%" align="center"><a href="?open=hapus_petugas&id_petugas=<?php echo $data['id_petugas']; ?>"
                    target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS DATA PETUGAS INI ... ?')">Delete</a></td>
            <td width="9%" align="center"><a href="?open=edit_petugas&id_petugas=<?php echo $data['id_petugas']; ?>"
                    target="_self">Edit</a></td>
        </tr>
    <?php } ?>
</table>