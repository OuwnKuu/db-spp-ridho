<html>

<head>
    <title>SPP Online</title>
    <link rel="stylesheet" type="text/css" href="src/style.css">
</head>

<body>
    <header>
        <h1>PEMBAYARAN SPP ONLINE SMK NEGERI 3 BANJARBARU</h1>
    </header>
    <main>
        <section class="blog">
            <article class="konten">
                <h3>Transaksi Pembayaran SPP</h3>
                <form method="get" action="">
                    nisn: <input type="text" name="nisn">
                    <input type="hidden" id="open" name="open" value="data_pembayaran">
                    <input type="submit" name="cari" value="Cari Siswa">
                </form>

                <?php
                include_once "src/koneksi.php";
                if (isset($_GET['nisn']) && $_GET['nisn'] !== '') {
                    $sql_siswa = mysqli_query($koneksi, "SELECT * FROM kelas JOIN siswa ON kelas.id_kelas = siswa.id_kelas
                    JOIN spp ON siswa.id_spp = spp.id_spp WHERE nisn='$_GET[nisn]'");
                    $data = mysqli_fetch_array($sql_siswa);
                    $nisn = $data['nisn'];
                ?>

                <h3>Biodata Siswa</h3>
                <table>
                    <tr>
                        <td>nisn</td>
                        <td>:</td>
                        <td><?php echo $data['nisn']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                    </tr>
                </table>

                <h3>Tagihan SPP Siswa</h3>
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>No. Bayar</th>
                        <th>Tgl. Bayar</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>

                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM pembayaran JOIN spp ON
                    pembayaran.id_spp = spp.id_spp WHERE nisn='$data[nisn]'");
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<tr>
                            <td>$no</td>
                            <td>$data[bulan_tagihan]</td>
                            <td>$data[tahun_tagihan]</td>
                            <td>$data[no_bayar]</td>
                            <td>$data[tgl_pembayaran]</td>
                            <td>$data[nominal]</td>
                            <td>$data[keterangan]</td>
                        </tr>";
                        $no++;
                    }
                    ?>
                </table>
                <?php
                }
                ?>
                <p>Pengecekan pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan
                    NISN melalui form di atas.
                </p>
            </article>
        </section>
    </main>
    <aside class="sidebar">
        <div class="widget">
            <p>Selamat datang di aplikasi pembayaran SPP SMK NEGERI 3 BANJARBARU</p>
        </div>
    </aside>
    <footer>
        <p>Copyright &copy; 2026 SMKN 3 Banjarbaru</p>
    </footer>
</body>

</html>