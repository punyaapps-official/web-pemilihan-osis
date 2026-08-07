<head>
    
     <link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin.css">
</head>

<script type="text/javascript">
    
    window.print()

</script>  

<center>
 <h1>=== HASIL VOTING ===</h1>

</center>
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


<br><br>

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