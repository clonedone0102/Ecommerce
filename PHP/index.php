<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>

<h2>Form Tambah Produk</h2>

<form action="proses.php" method="POST">
    <label>Nama Produk:</label><br>
    <input type="text" name="nama"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>