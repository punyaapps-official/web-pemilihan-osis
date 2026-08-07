<?php 

    session_start();

     // Jika tidak ada session username berarti dia belum login
    if($_SESSION['username'] == false && $_SESSION['password'] == false ){

    // Kita Redirect ke halaman index.php karena belum login    
    header("location: index.php"); 
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin.css">
    <link rel="shortcut icon" href="../../image/logo.png">


    <title>LAPORAN VOTING PEMILIHAN OSIS</title>
    <link rel="shortcut icon" href="image/logo.png">
</head>
<body>

<br><br>
 <center>

    
<a class="kembali" href="../data_hasil.php">KEMBALI</a>

<a class="dowload" target="_blank" href="proses_pdf_voting_tabel.php">DOWLOAD KE PDF</a>

<?php 
    function getIndonesianDay($englishDay) {
        $days = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );

        return isset($days[$englishDay]) ? $days[$englishDay] : '';
    }

    ?>

     <?php
            date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'id_ID');
            $tanggal = date('d-m-Y');
            $hari = strftime('%A');
            $jam = date('H:i:s');
        ?>

         <h3 align="center" > Hari: <?php echo getIndonesianDay(date('l')); ?> || Tanggal: <?php echo $tanggal; ?> || Jam: <span id="jam"> </h3> 

            <br>

            <script>
        function updateJam() {
            var jam = new Date();
            var jamText = jam.getHours().toString().padStart(2, '0') + ':' +
                jam.getMinutes().toString().padStart(2, '0') + ':' +
                jam.getSeconds().toString().padStart(2, '0');
            document.getElementById('jam').textContent = jamText;
        }

        setInterval(updateJam, 1000);
    </script>

   
        <h1>=== HASIL VOTING ===</h1>


        <?php 
        require '../../config.php';


        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
        $d = mysqli_fetch_assoc($data);
        
    ?>

        <center><h4>
            <?php echo $d['npsn']; ?> -
            <?php echo $d['nm_sekolah']; ?> <br>
            TAHUN PELAJARAN <?php echo $d['tapel']; ?>

        </h4></center>
       
    </center>


<br>


<table align="center">
    <tr>
        <td style="font-size: 15px;">Kabupaten/Kota &nbsp&nbsp&nbsp&nbsp&nbsp</td>
        <td> : &nbsp </td>
        <td style="font-size: 15px;"><?php echo $d['kab']; ?></td>
    </tr>

    <tr>
        <td style="font-size: 15px;">Kecamatan &nbsp&nbsp&nbsp&nbsp&nbsp</td>
        <td> : &nbsp</td>
        <td style="font-size: 15px;"><?php echo $d['kec']; ?></td>
    </tr>

    <tr>
        <td style="font-size: 15px;">Tanggal Pelaksanaan &nbsp&nbsp&nbsp&nbsp&nbsp</td>
        <td> : &nbsp</td>
        <td style="font-size: 15px;">
    <?php
    $tanggal = $d['tgl']; // Ambil nilai tanggal dari $d['tgl']

    // Ubah format tanggal menjadi "dd-mm-yyyy"
    $tanggal_formatted = date('d-m-Y', strtotime($tanggal));

    echo $tanggal_formatted; // Tampilkan tanggal yang sudah diformat
    ?>
</td>

    </tr>
</table>




<table border="1" align="center" class="data-table">
    <tr>
        <thead>
        <th>
            No Urut
        </th>
        <th>
            Nama Calon
        </th>
        <th>
            Jumlah Suara
        </th>
        </thead>
    </tr>

    <?php
    require '../../config.php';

    // Mengambil data dari tabel tb_kandidat
    $queryKandidat = "SELECT * FROM tb_kandidat ORDER BY no_kandidat ASC";
    $resultKandidat = mysqli_query($db, $queryKandidat);

    while ($rowKandidat = mysqli_fetch_assoc($resultKandidat)) {
        $noKandidat = $rowKandidat['no_kandidat'];
        $namaKandidat = $rowKandidat['nama'];

        // Menghitung jumlah suara untuk setiap kandidat dari tabel tb_pilih
        $queryJumlahSuara = "SELECT COUNT(*) AS jumlah_suara FROM tb_pilih WHERE id_kandidat = '$noKandidat'";
        $resultJumlahSuara = mysqli_query($db, $queryJumlahSuara);
        $rowJumlahSuara = mysqli_fetch_assoc($resultJumlahSuara);
        $jumlahSuara = $rowJumlahSuara['jumlah_suara'];

        echo '<tr>';
        echo '<td>' . $noKandidat . '</td>';
        echo '<td>' . $namaKandidat . '</td>';
        echo '<td>' . $jumlahSuara . '</td>';
        echo '</tr>';
    }

    mysqli_close($db);
    ?>
</table>

<?php
$today = date("d-m-Y"); // Format tanggal: tahun-bulan-hari (contoh: 2023-08-14)
?>





<br><br>

<hr>

<?php 
        require '../../config.php';
        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_admin");
        $d = mysqli_fetch_assoc($data);
        
        ?>

                <footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>




</html>
