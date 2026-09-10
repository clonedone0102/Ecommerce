<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$query = "UPDATE produk SET nama='$nama', harga='$harga', kategori='$kategori', deskripsi='$deskripsi' WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Gagal memperbarui data";
}
?>