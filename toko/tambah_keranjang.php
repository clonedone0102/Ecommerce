<?php
include 'koneksi.php';

$produk_id = $_GET['id'];

// Cek apakah produk sudah ada di keranjang
$check = mysqli_query($conn, "SELECT * FROM keranjang WHERE produk_id='$produk_id'");

if (mysqli_num_rows($check) > 0) {
    // Update jumlah jika sudah ada
    mysqli_query($conn, "UPDATE keranjang SET jumlah = jumlah + 1 WHERE produk_id='$produk_id'");
} else {
    // Insert baru jika belum ada
    mysqli_query($conn, "INSERT INTO keranjang (produk_id, jumlah) VALUES ('$produk_id', 1)");
}

header("Location: cart.php");
?>