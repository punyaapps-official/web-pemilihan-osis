<script type="text/javascript">
    
    window.print()
    

</script>
    
   <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin.css">
    <link rel="shortcut icon" href="../../image/logo.png">


    <title>LAPORAN VOTING PEMILIHAN OSIS</title>
    <link rel="shortcut icon" href="../image/logo.png">
</head>
<body>






    


    <center>

       

        <h1>=== LAPORAN VOTING ===</h1>


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


<table align="left">
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


<br><br><br><br>

<table border="1" align="left" class="data-table">
    
    <tr>
        <thead>
        <th>
            NO
        </th>

        <th>
            Nama Sekolah
        </th>

        <th>
            DPT
        </th>

        <th>
            Hadir
        </th>

        <th>
            Tidak Hadir
        </th>

        </thead>
    </tr>


    <tr>
        <td>
            1
        </td>

        <td>
            <?php echo $d['nm_sekolah']; ?></p>
        </td>
<?php 
require '../../config.php';

// Menghitung total pemilih
$queryTotalPemilih = "SELECT COUNT(*) as total_pemilih FROM tb_pemilih";
$resultTotalPemilih = mysqli_query($db, $queryTotalPemilih);
$rowTotalPemilih = mysqli_fetch_assoc($resultTotalPemilih);

// Menghitung jumlah yang sudah memilih
$queryPemilihMemilih = "SELECT COUNT(*) as pemilih_memilih FROM tb_pilih";
$resultPemilihMemilih = mysqli_query($db, $queryPemilihMemilih);
$rowPemilihMemilih = mysqli_fetch_assoc($resultPemilihMemilih);

// Menghitung jumlah yang belum memilih
$jumlahPemilihBelumMemilih = $rowTotalPemilih['total_pemilih'] - $rowPemilihMemilih['pemilih_memilih'];
?>
        <td>
            <?php echo $rowTotalPemilih['total_pemilih']; ?>
        </td>

        <td>
            <?php echo $rowPemilihMemilih['pemilih_memilih']; ?>
        </td>

        <td>
            <?php echo $jumlahPemilihBelumMemilih; ?>
        </td>
    </tr>




</table>



<br><br><br><br><br>

<p align="left">Hasil Pemilihan</p>




<table border="1" align="left" class="data-table">
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


<br><br><br><br><br><br><br><br><br><br>


<table align="left">
    <tr>
        <td style="font-size: 15px;"><?php echo $d['desa']; ?>, <?php echo $today; ?></td>
    </tr>
    
    <tr>
        <td style="font-size: 15px;">Kepala Sekolah</td>
    </tr>
    
    <tr>
        <td style="font-size: 15px;"><br><br><br><br><br></td>
    </tr>
    
    <tr>
        <td style="font-size: 15px;"><b><u><?php echo $d['kpl_sekolah']; ?></u></b></td>
    </tr>
    
    <tr>
        <td style="font-size: 15px;">NIP. <?php echo $d['nip']; ?></td>
    </tr>
</table>