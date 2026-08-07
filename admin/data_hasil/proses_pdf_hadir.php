<script type="text/javascript">
    
    window.print()
    

</script>
    

    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin.css">
    </head>
    <?php 
        // koneksi database
        require '../../config.php';

        ?>

<center>
    
    DAFTAR HADIR DPT-PEMILIHAN OSIS
</center>

<br><br>
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

          

            $data = mysqli_query($db ,"SELECT * FROM tb_pemilih " ); //ASC

            $no = 1;

            while($d = mysqli_fetch_array($data)){
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