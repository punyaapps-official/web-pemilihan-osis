<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
    header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN | RESET LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">
    <style>
        .search-box {
            margin-bottom: 20px;
        }
        .search-box input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-box input[type="submit"] {
            padding: 10px 20px;
            background: #f44336;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>


<body>



<?php 
    require 'index2.php';
    ?>
    


<?php 
    require '../config.php';

    // menampilkan data
    $data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
    $d = mysqli_fetch_assoc($data);
?>

<center>
    <h4>
        <?php echo $d['npsn']; ?>  | <?php echo $d['nm_sekolah']; ?> 
    </h4>
</center>

</body>
</html>



<br>

<center>
    <h1>DAFTAR PEMILIH SUDAH LOGIN</h1>
    <hr>
</center>


<br>

<center>


    <a class="hapus-data" href="hapus_semua_sudah_login.php" onclick="return confirm('Apakah anda yakin ingin RESET LOGIN SEMUA ?');" class="aksi"> RESET LOGIN SEMUA </a> 
    &nbsp;&nbsp;





    <br><br>
</center>


<p align="center">RESET LOGIN SEMUA, TIDAK AKAN MENGGANGGU PESERTA PEMILIH YANG SEDANG MEMILIH, DAN YANG SUDAH MEMILIH TIDAK AKAN MEMPENGARUHI HAK PILIH MESKI DI RESET LOGIN</p>


<div class="search-box" align="center">
    <form action="" method="get">
        <input type="text" name="keyword" placeholder="Cari Nama pemilih ...">
        <input type="submit" value="Cari">
    </form>
</div>


<br>
<?php 
    // koneksi database
    require '../config.php';

?>

<?php 

$data = mysqli_query($db,"SELECT * FROM cek_login");
$jlh_peserta = mysqli_num_rows($data);

?>
<center>
    <H2> Jumlah Pemilih Sudah Login   :<?php echo $jlh_peserta;?><H2>
</center>



<?php 
    // koneksi database
    require '../config.php';
?>


<table class="data-table">

<thead>
    <tr>
        <th>No</th>
        <th>No Identitas</th>
        <th>Password</th>
        <th>Nama Peserta </th>
        <th>Kelas</th>
       
        <th>Aksi</th>
    </tr>
</thead>

<?php 

// menampilkan data
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $data = mysqli_query($db, "SELECT * FROM tb_pemilih INNER JOIN cek_login ON cek_login.id_login = tb_pemilih.no_id WHERE nm_siswa LIKE '%$keyword%'");
} else {
    $data = mysqli_query($db ,"SELECT * FROM tb_pemilih INNER JOIN cek_login ON cek_login.id_login = tb_pemilih.no_id");
}

$no = 1;

while($d = mysqli_fetch_assoc($data)){

?>


<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['no_id']; ?></td>
    <td><?php echo $d['password']; ?></td>
    <td><?php echo $d['nm_siswa']; ?></td>
    <td><?php echo $d['nama_kelas']; ?></td>
    
    <td>
        <br>
        <a href="proses_hapuslogin_by_id.php?id=<?= $d["id"]; ?>" onclick="return confirm('Apakah anda yakin ingin mereset LOGIN Pemilih ?');" class="hapus-data"> RESET LOGIN </a> 
        <br><br>	
    </td>
</tr>


<?php
}

?>


</table>



<br>

<?php 
require '../config.php';
// menampilkan data
$data = mysqli_query($db,"SELECT * FROM tb_admin");
$d = mysqli_fetch_assoc($data);

?>

<footer>
    <p align="center" ><i><?php echo $d['footer']; ?></i></p>
</footer>
