<script type="text/javascript">
    
    window.print()
    

</script>
    
    <head>
       <link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin.css">
    </head>


    <center>
        DAFTAR HADIR DPT-PEMILIHAN OSIS
    </center>

    <br><br>
    <?php 
            // koneksi database
            require '../../config.php';
        ?>

    <table class="data-table">

        <thead>
        <tr>
            <th>No</th>
            <th>No Identitas</th>
            
            <th>Nama pemilih</th>
            <th>Kelas</th>
            <th>Keterangan</th>
           
        </tr>
        </thead>

        <?php 

            $nama_kelas=$_GET['nama_kelas'];
            // menampilkan data 
            $data = mysqli_query($db ,"SELECT * FROM tb_pemilih WHERE nama_kelas='$nama_kelas'  ");
        
            $no = 1;
            while($d = mysqli_fetch_assoc($data)){
            ?>


        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['no_id']; ?></td>
            
            <td><?php echo $d['nm_siswa']; ?></td>
            <td><?php echo $d['nama_kelas']; ?></td>
            <td><?php echo $d['hadir']; ?></td>
            
        
        </tr>

        <?php

        }

        ?>

    </table>