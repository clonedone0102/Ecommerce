<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>TokoKu</h2>
    <a href="index.php" class="btn">Kembali Belanja</a>
</div>

<div class="container">
    <h2>Keranjang Belanja</h2>
    <br>
    <table class="cart-table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT keranjang.id as cart_id, produk.nama, produk.harga, keranjang.jumlah 
                      FROM keranjang 
                      JOIN produk ON keranjang.produk_id = produk.id";
            $result = mysqli_query($conn, $query);
            $grand_total = 0;

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $subtotal = $row['harga'] * $row['jumlah'];
                    $grand_total += $subtotal;
            ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                <td>
                    <a href="hapus_cart.php?id=<?= $row['cart_id']; ?>" class="btn-delete">Hapus</a>
                </td>
            </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='5' style='text-align:center;'>Keranjang masih kosong.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div style="margin-top:20px; text-align:right;">
        <h3>Total Bayar: Rp <?= number_format($grand_total, 0, ',', '.'); ?></h3>
    </div>
</div>

</body>
</html>