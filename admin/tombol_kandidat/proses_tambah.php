<?php

require '../../config.php';

$no_id = $_POST['no_id'];
$nama = $_POST['nama'];
$no_kandidat = $_POST['no_kandidat'];

$cek = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_kandidat WHERE no_id='$no_id' "));
if ($cek > 0) {
    echo "<script>window.alert('No Identitas yang anda masukan sudah ada, Silahkan Input Ulang')
        window.location='tambah_kandidat.php'</script>";
} else {
    $cek2 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_kandidat WHERE no_kandidat='$no_kandidat' "));
    if ($cek2 > 0) {
        echo "<script>window.alert('No Kandidat yang anda masukan sudah ada, Silahkan Input Ulang')
            window.location='tambah_kandidat.php'</script>";
    } else {
        $file_foto = upload(); // Foto hanya akan diunggah jika tidak ada kesalahan di atas

        if ($file_foto !== false) { // Hanya jika foto berhasil diunggah
            $result = mysqli_query($db, "INSERT INTO tb_kandidat VALUES ('', '$no_id', '$nama', '$no_kandidat', '$file_foto')");

            echo "<script>
            alert('data berhasil di import');
            document.location.href = '../data_kandidat.php';
            </script>";
        } else {
            echo "<script>
            alert('Gagal mengunggah foto, silakan cek kembali');
            window.location='tambah_kandidat.php';
            </script>";
        }
    }
}

function upload()
{
    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpfile = $_FILES['foto']['tmp_name'];

    // Cek apakah ada foto yg dimasukkan
    if ($error === 4) {
        return false; // Mengembalikan false jika tidak ada file yang diunggah
    }

    // Hanya masukkan tipe file jpg/png
    $tipefile = ['jpg', 'jpeg', 'png'];
    $ektensifile = explode('.', $namafile);
    $ektensifile = strtolower(end($ektensifile));

    if (!in_array($ektensifile, $tipefile)) {
        return false; // Mengembalikan false jika tipe file tidak sesuai
    }

    // Cek ukuran file foto
    if ($ukuranfile > 5000000) {
        return false; // Mengembalikan false jika ukuran file terlalu besar
    }

    // Jika semua kondisi berhasil, simpan foto
    $no_id = $_POST['no_id'];
    $namafilebaru = $no_id . ".jpg";

    move_uploaded_file($tmpfile, '../../image/foto_kandidat/' . $namafilebaru);
    return $namafilebaru; // Mengembalikan nama file baru jika berhasil
}

?>
