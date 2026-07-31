<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$query = "INSERT INTO produk (nama, harga, kategori, deskripsi)
          VALUES ('$nama', '$harga', '$kategori', '$deskripsi')";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Gagal menyimpan data";
}
?>