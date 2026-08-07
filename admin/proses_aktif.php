<?php
// Mengambil koneksi database dari file config.php
require '../config.php';

// Ambil nilai status saat ini dari database (asumsikan nama kolom adalah 'aktif')
$sql = "SELECT aktif FROM tb_admin";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$status = $row['aktif'];

// Ubah status menjadi berlawanan
if ($status == 'AKTIF') {
    $newStatus = 'TIDAK AKTIF';
} else {
    $newStatus = 'AKTIF';
}

// Update status di database
$updateSql = "UPDATE tb_admin SET aktif='$newStatus'";
if (mysqli_query($db, $updateSql)) {
    echo "Status berhasil diubah menjadi: " . $newStatus;
} else {
    echo "Error: " . $updateSql . "<br>" . mysqli_error($db);
}

mysqli_close($db);

// Mengalihkan halaman kembali ke index.php
header("location:data_aktif.php");
?>
