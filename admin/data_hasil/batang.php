<!DOCTYPE html>
<html>
<head>
	<title>HASIL VOTING</title>

	
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../../image/logo.png">
	<script type="text/javascript" src="../../js/Chart.js"></script>


</head>
<body>

	
<br>
<center>

<a class="kembali" href="../data_hasil.php">KEMBALI</a>
<a class="download" target="_blank" onclick="window.print(); return false;">DOWLOAD KE PDF</a>
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


		



		<?php 
		require '../../config.php';

		// Ambil data label dari tabel tb_kandidat
		$labels = [];
		$query = mysqli_query($db, "SELECT id_kandidat FROM tb_pilih");
		while ($row = mysqli_fetch_assoc($query)) {
			
			
		    $labels[$row['id_kandidat']] = 'Nomor Kandidat ' . $row['id_kandidat'];
		}
	?>

		
		<div style="width: 800px;margin: 0px auto;">
				<canvas id="myChart"></canvas>
		</div>





<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: [
            <?php
            // Menggunakan data labels yang diambil dari query sebelumnya
            foreach ($labels as $label) {
                echo "'$label', ";
            }
            ?>
        ],
        datasets: [{
            label: '',
            data: [


                <?php 
                foreach ($labels as $id => $label) {
                    $jumlah = mysqli_query($db, "SELECT * FROM tb_pilih WHERE id_kandidat='$id'");
                    echo mysqli_num_rows($jumlah) . ", ";
                }

                ?>




					],



					backgroundColor: [
					'rgba(255, 99, 132, 2)',// asel
					'rgba(54, 162, 235, 2)',//agara
					'rgba(255, 206, 86, 2)',//atim
					'rgba(75, 192, 192, 2)',//ateng

					'rgba(1, 1, 1, 2)', //abar
					'rgba(100, 100, 100, 2)', //abes
					'rgba(25, 206, 86, 2)', //pidie
					'rgba(500, 192, 192, 2)',//acut

					'rgba(2, 99, 132, 2)',//simelu
					'rgba(500, 100, 235, 2)',//singkil
					'rgba(100, 2, 86, 2)',//biuren
					'rgba(200, 192, 192, 2)',//abdya

					
					],

					borderColor: [

					'rgba(255, 99, 132, 2)',// asel
					'rgba(54, 162, 235, 2)',//agara
					'rgba(255, 206, 86, 2)',//atim
					'rgba(75, 192, 192, 2)',//ateng

					'rgba(1, 1, 1, 2)', //abar
					'rgba(100, 100, 100, 2)', //abes
					'rgba(25, 206, 86, 2)', //pidie
					'rgba(500, 192, 192, 2)',//acut

					'rgba(2, 99, 132, 2)',//simelu
					'rgba(500, 100, 235, 2)',//singkil
					'rgba(100, 2, 86, 2)',//biuren
					'rgba(200, 192, 192, 2)',//abdya

					
					],

					borderWidth: 1
				}]
			},
			options: {
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>



</body>

<br>

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