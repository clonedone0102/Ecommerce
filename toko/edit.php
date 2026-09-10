<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM produk WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>TokoKu</h2>
    <a href="index.php" class="btn">Kembali</a>
</div>

<div class="container">
    <div class="form-card">
        <h2>Edit Produk</h2>

        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <label>Nama Produk</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>

            <label>Harga</label>
            <input type="number" name="harga" value="<?= $data['harga']; ?>" required>

            <label>Kategori</label>
            <select name="kategori">
                <option value="Elektronik" <?= ($data['kategori'] == 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                <option value="Pakaian" <?= ($data['kategori'] == 'Pakaian') ? 'selected' : ''; ?>>Pakaian</option>
            </select>

            <label>Deskripsi</label>
            <textarea name="deskripsi"><?= htmlspecialchars($data['deskripsi']); ?></textarea>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </form>
    </div>
</div>

</body>
</html>