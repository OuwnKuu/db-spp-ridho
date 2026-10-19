<html>

<head>
    <title>SPP Online</title>
    <link rel="stylesheet" type="text/css" href="../src/style.css">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['level'] == "") {
        header("location:index.php?pesan=gagal");
    }
    ?>
    <header>
        <h1>PEMBAYARAN SPP ONLINE SMK NEGERI 3 BANJARBARU</h1>
        <div class="menu-wrapper">
            <nav class="menu">
                <?php include "menu.php" ?>
            </nav>
        </div>
    </header>
    <main>
        <section class="blog">
            <article class="konten">
                <?php include "buka_file.php" ?>
            </article>
        </section>
    </main>
    <aside class="sidebar">
        <div class="widget">
            <h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>
            <p>Selamat datang di aplikasi pembayaran SPP SMK NEGERI 3 BANJARBARU</p>
        </div>
    </aside>
    <footer>
        <p>Copyright &copy; 2026 SMKN 3 Banjarbaru</p>
    </footer>
</body>

</html>