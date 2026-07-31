<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>TokoKu</h2>
    <h1>TEST BERHASIL</h1>
    <a href="index.php" class="btn">Kembali</a>
</div>

<div class="container">

    <div class="form-card">
        <h2>Tambah Produk</h2>

        <form action="proses.php" method="POST">

            <label>Nama Produk</label>
            <input type="text" name="nama" required>

            <label>Harga</label>
            <input type="number" name="harga" required>

            <label>Kategori</label>
            <select name="kategori">
                <option value="Elektronik">Elektronik</option>
                <option value="Pakaian">Pakaian</option>
            </select>

            <label>Deskripsi</label>
            <textarea name="deskripsi"></textarea>

            <button type="submit" class="btn-submit">Simpan</button>

        </form>
    </div>

</div>

</body>
</html>