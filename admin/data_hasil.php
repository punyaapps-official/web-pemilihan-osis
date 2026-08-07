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
    <link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
    <link rel="shortcut icon" href="../image/logo.png">


   



    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .kandidat-card {
            width: 25%;
            text-align: center;
            margin: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .kandidat-image {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: transform 0.3s; /* Transisi perubahan transformasi */
        }
        .nomor-kandidat {
            font-weight: bold;
            font-size: 18px;
            color: #e74c3c; /* Ganti dengan warna yang Anda inginkan */
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .pilih-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
            margin-top: 10px;
        }
        .pilih-button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            .kandidat-card {
                width: 80%;
            }
            .kandidat-card:hover .kandidat-image img {
                transform: scale(1.1); /* Efek perbesaran gambar saat dihover */
            }
            .kandidat-footer {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                padding: 10px;
                background-color: rgba(0, 0, 0, 0.7);
                text-align: center;
                display: none;
            }
            .kandidat-card:hover .kandidat-footer {
                display: block; /* Tampilkan footer saat dihover */
            }


            .keluar-button {
    display: inline-block;
    background-color: #e74c3c; /* Warna latar belakang tombol */
    color: #fff;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
}

.keluar-button:hover {
    background-color: #c0392b; /* Warna latar belakang tombol saat dihover */
    transform: scale(1.05); /* Efek perbesaran tombol saat dihover */
}

a{
	text-decoration: none;
	
}


        }
    </style>
    <title>HASIL VOTING PEMILIHAN OSIS</title>
    <link rel="shortcut icon" href="image/logo.png">
</head>
<body>




    


    <?php 

     require 'index2.php';

     ?>

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



<center>
        <a class="import-data" href="data_hasil/tabel.php">LIHAT (TABEL)</a> 

        <a class="tambah-data"  href="data_hasil/batang.php">LIHAT (GRAFIK BATANG)</a> 
 
        <a class="unduh-data"  href="data_hasil/lingkaran.php" >LIHAT (GRAFIK LINGKARAN)</a> 

       <a class="dowload" target="_blank" href="data_hasil/proses_pdf_voting.php">DOWLOAD KE PDF</a>

    </center>



    <center>
        <h1>=== HASIL VOTING ===</h1>


        <?php 
        require '../config.php';


        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
        $d = mysqli_fetch_assoc($data);
        
    ?>

        <center><h4>
            <?php echo $d['npsn']; ?> -
            <?php echo $d['nm_sekolah']; ?> 
        </h4></center>
       
    </center>
<hr>
    <div class="container">
    <?php
    require '../config.php';

    $query = "SELECT * FROM tb_kandidat ORDER BY no_kandidat ASC";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="kandidat-card">';
        echo '<div class="kandidat-header">';
        echo '<span class="nomor-kandidat">'. 'Nomor '. $row['no_kandidat'] . '</span>';
        echo '<h2>' . $row['nama'] . '</h2>';
        echo '</div>';
        echo '<img src="../image/foto_kandidat/' . $row['photo'] . '" alt="' . $row['nama'] . '">';
        echo '</a>';



        $queryCount = "SELECT COUNT(*) as total_voting FROM tb_pilih WHERE id_kandidat = '" . $row['no_kandidat'] . "'";
    $resultCount = mysqli_query($db, $queryCount);
    $rowCount = mysqli_fetch_assoc($resultCount);

    echo '<div class="kandidat-footer">';
    echo '<br>';
    echo 'JUMLAH VOTING: ' . $rowCount['total_voting'];
    echo '</div>';

    echo '</div>';
}


       

    mysqli_close($db);
    ?>
</div>


    <script>
    const pilihButtons = document.querySelectorAll('.pilih-button');
    pilihButtons.forEach(button => {
        button.addEventListener('click', () => {
            const idKandidat = button.getAttribute('data-id');
            const noId = button.getAttribute('data-no-id');
            
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'proses_pemilihan.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText); // Tampilkan pesan respons dari server (opsional)
                    window.location.href = 'index.php'; // Redirect ke halaman utama setelah pemilihan
                }
            };
            const data = 'no_id=' + encodeURIComponent(noId) + '&no_kandidat=' + encodeURIComponent(idKandidat);
            xhr.send(data);
        });
    });
</script>






<?php 
require '../config.php';

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

<hr>
<h1>Jumlah DPT  :   <?php echo $rowTotalPemilih['total_pemilih']; ?></h1>
<h1>Jumlah DPT yang memilih :   <?php echo $rowPemilihMemilih['pemilih_memilih']; ?></h1>
<h1>Jumlah DPT yang tidak memilih   :   <?php echo $jumlahPemilihBelumMemilih; ?></h1>
<br>
<hr>
<br><br>


</body>

<?php 
        require '../config.php';
        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_admin");
        $d = mysqli_fetch_assoc($data);
        
        ?>

                <footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>




</html>
