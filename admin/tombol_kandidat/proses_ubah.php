<?php

require '../../config.php';

$id_kandidat = $_POST['id_kandidat'];
$no_id = $_POST['no_id'];
$nama = $_POST['nama'];
$no_kandidat = $_POST['no_kandidat'];

$cek2 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_kandidat WHERE no_kandidat='$no_kandidat' "));

if ($cek2 > 0) {
    echo "<script>window.alert('No Kandidat yang anda masukan sudah ada, Silahkan Input Ulang')
        window.location='../data_kandidat.php'</script>";
} else {
    $update_query = "UPDATE tb_kandidat SET
                    no_id        = '$no_id',
                    nama         = '$nama'";
                    
    if (!empty($no_kandidat)) {
        $update_query .= ", no_kandidat  = '$no_kandidat'";
    }

    if (!empty($_FILES['foto']['name'])) {
        $file_foto = upload(); // Upload foto baru
        if ($file_foto) {
            $update_query .= ", photo = '$file_foto'";
        }
    }

    $update_query .= " WHERE id_kandidat = '$id_kandidat'";

    $result = mysqli_query($db, $update_query);

    if ($result) {
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href = '../data_kandidat.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal mengubah data, silakan cek kembali');
        window.location='../data_kandidat.php';
        </script>";
    }
}

function upload()
{
    $namafilelama = $_POST['no_id'] . ".jpg"; // Nama file lama
    $path_foto_lama = '../../image/foto_kandidat/' . $namafilelama;

    // Hapus foto lama jika ada
    if (file_exists($path_foto_lama)) {
        unlink($path_foto_lama);
    }

    $namafilebaru = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpfile = $_FILES['foto']['tmp_name'];

    // Cek apakah ada foto yang dimasukkan
    if ($error === 4) {
        return $namafilelama; // Kembalikan nama file lama jika tidak ada file yang diunggah
    }

    // Hanya masukkan tipe file jpg/png
    $tipefile = ['jpg', 'jpeg', 'png'];
    $ektensifile = pathinfo($namafilebaru, PATHINFO_EXTENSION); // Menggunakan pathinfo untuk mendapatkan ekstensi
    $ektensifile = strtolower($ektensifile);

    if (!in_array($ektensifile, $tipefile)) {
        return false; // Mengembalikan false jika tipe file tidak sesuai
    }

    // Cek ukuran file foto
    if ($ukuranfile > 5000000) {
        return false; // Mengembalikan false jika ukuran file terlalu besar
    }

    // Simpan foto baru dengan nama file lama
    move_uploaded_file($tmpfile, $path_foto_lama);
    return $namafilelama; // Mengembalikan nama file baru jika berhasil
}


?>
