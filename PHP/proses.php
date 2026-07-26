<?php

// data dari form
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

// validasi
if (empty($nama) || empty($harga) || empty($deskripsi)) {
    echo "❌ Data tidak boleh kosong!";
} else {

    // penggunaan operator & if else
    if ($harga <= 0) {
        echo "❌ Harga harus lebih dari 0!";
    } else {

        echo "<h3>✅ Data berhasil disimpan!</h3>";
        echo "Nama Produk: " . $nama . "<br>";
        echo "Harga: Rp " . $harga . "<br>";
        echo "Deskripsi: " . $deskripsi . "<br>";

    }
}

?>