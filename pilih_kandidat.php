<?php 
    session_start();

    // Jika tidak ada session username berarti dia belum login
    if(!isset($_SESSION['no_id']) || !isset($_SESSION['password'])) {
        // Redirect ke halaman index.php karena belum login    
        header("location: index.php"); 
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo.png">




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
    <title>DAFTAR PEMILIH OSIS</title>
    <link rel="shortcut icon" href="image/logo.png">
</head>
<body>


    <hr>

 <?php 
        require 'config.php';


        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
        $d = mysqli_fetch_assoc($data);
        
    ?>

        <center><h1>
            <?php echo $d['npsn']; ?> -
            <?php echo $d['nm_sekolah']; ?> 
        </h1></center>



<?php
     
        require 'config.php';
        $no_id = $_SESSION['no_id'];
        // Mengambil nama peserta dari database berdasarkan nomor ID siswa
        $query = mysqli_query($db, "SELECT nm_siswa, nama_kelas FROM tb_pemilih WHERE no_id = '$no_id'");
        $data = mysqli_fetch_assoc($query);
        $nm_siswa = $data['nm_siswa'];
        $nama_kelas = $data['nama_kelas'];

    ?>

 <div class="menu-header" style="text-align: center; padding-right: 20px; background-color: #3498db; color: #fff;">
        
        <span>===  Identitas Pemilih: <?php echo $no_id; ?></span> ||
        <span>Nama Pemilih: <?php echo $nm_siswa; ?></span> ||
         <span>Kelas: <?php echo $nama_kelas; ?>   ||
         </span> <a href="logout.php" class="keluar-button">KELUAR</a>  ===
       
    </div>

    <center>
        <h2>=== ANDA HANYA PUNYA SATU HAK PILIH ===</h2>
        <h2>Silahkan Gunakan Hak Pilih Anda dengan Baik dan sesuai Hati Nurani Anda</h2>
    </center>
<hr>

    <div class="container">
    <?php
    require 'config.php';

    $query = "SELECT * FROM tb_kandidat ORDER BY no_kandidat ASC";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="kandidat-card">';
        echo '<div class="kandidat-header">';
        echo '<span class="nomor-kandidat">'. 'NOMOR '. $row['no_kandidat'] . '</span>';
        echo '<h2>' . $row['nama'] . '</h2>';
        echo '</div>';
        // echo '<a href="vote.php?id=' . $row['no_kandidat'] . '" class="kandidat-image">';
        echo '<img src="image/foto_kandidat/' . $row['photo'] . '" alt="' . $row['nama'] . '">';
        echo '</a>';
        echo '<div class="kandidat-footer">';

        echo '<button class="pilih-button" data-id="' . $row['no_kandidat'] . '" data-no-id="' . $no_id . '" data-kandidat-nama="' . $row['nama'] . '">Pilih Nomor ' . $row['no_kandidat'] . '</button>';

        echo '</div>';
        echo '</div>';
    }

    mysqli_close($db);
    ?>
</div>

<hr>

   <script>
const pilihButtons = document.querySelectorAll('.pilih-button');
pilihButtons.forEach(button => {
    button.addEventListener('click', () => {
        const idKandidat = button.getAttribute('data-id');
        const noId = button.getAttribute('data-no-id');
        const kandidatNama = button.getAttribute('data-kandidat-nama'); // Tambahkan atribut untuk nama kandidat

        const confirmation = confirm(`Apakah Anda yakin ingin memilih ${kandidatNama} (Nomor ${idKandidat}) ? Pilihan Anda Menentukan Masa Depan OSIS !!! `);

        if (confirmation) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'proses_pemilihan.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                    window.location.href = 'index.php';
                }
            };
            const data = 'no_id=' + encodeURIComponent(noId) + '&no_kandidat=' + encodeURIComponent(idKandidat);
            xhr.send(data);
        }
    });
});
</script>




</body>

<br>

<?php 
        require 'config.php';
        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_admin");
        $d = mysqli_fetch_assoc($data);
        
        ?>

                <footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>



</html>
