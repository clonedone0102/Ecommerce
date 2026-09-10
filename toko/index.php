<?php 
session_start();
include 'koneksi.php'; 
?>
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
    <div>
        <a href="cart.php" class="btn" style="margin-right: 10px;">🛒 Keranjang</a>
        <a href="form.php" class="btn">+ Tambah Produk</a>
    </div>
</div>

<div class="container">

    <!-- FILTER -->
    <div class="filter-box">
        <form method="GET">
            <select name="kategori" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <option value="Elektronik" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                <option value="Pakaian" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Pakaian') ? 'selected' : ''; ?>>Pakaian</option>
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
                <h3><?= htmlspecialchars($row['nama']); ?></h3>
                <p class="harga">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                <span class="kategori"><?= htmlspecialchars($row['kategori']); ?></span>
                <p class="desc"><?= htmlspecialchars($row['deskripsi']); ?></p>
                
                <div class="action-buttons" style="margin-top: 15px;">
                    <a href="tambah_keranjang.php?id=<?= $row['id']; ?>" class="btn-cart">Add to Cart</a>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

</body>
</html>