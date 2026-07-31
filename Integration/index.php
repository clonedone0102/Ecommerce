<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Toko Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>TokoKu</h2>
    <a href="form.php" class="btn">+ Tambah</a>
</div>

<div class="container">

    <!-- FILTER -->
    <div class="filter-box">
        <form method="GET">
            <select name="kategori" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Pakaian">Pakaian</option>
            </select>
        </form>
    </div>

    <!-- PRODUK -->
    <div class="produk-grid">
        <?php
        $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

        if ($kategori != '') {
            $query = "SELECT * FROM produk WHERE kategori='$kategori'";
        } else {
            $query = "SELECT * FROM produk";
        }

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card">
            <div class="card-body">
                <h3><?= $row['nama']; ?></h3>
                <p class="harga">Rp <?= number_format($row['harga']); ?></p>
                <span class="kategori"><?= $row['kategori']; ?></span>
                <p class="desc"><?= $row['deskripsi']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

</body>
</html>