<!DOCTYPE html>
<html>
<head>
    <title>REKAP DATA DPT</title>
</head>
<body>
<style type="text/css">
    

    }
    table{
        margin: 20px auto;
        border-collapse: collapse;
    }
    table th,
    table td{
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }
    a{
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }
    </style>




<?php
require '../config.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap data DPT.xls");

$data = mysqli_query($db, "SELECT * FROM tb_pemilih");

?>

<center>
        <h3>REKAP DATA DPT</h3>
    </center>


<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Jumlah Pemilih</th>
    </tr>
    <?php
    $i = 0;
    $nama_kelas = [];

    while ($row = mysqli_fetch_array($data)) {
        if (!in_array($row["nama_kelas"], $nama_kelas)) {
            $nama_kelas[] = $row["nama_kelas"];
            ?>
            <tr>
                <td><?php echo 1 + $i++; ?></td>
                <td><?php echo $row["nama_kelas"]; ?></td>
                <td><?php echo jumlah_peserta($nama_kelas[$i - 1]); ?></td>
            </tr>
            <?php
        }
    }

    function jumlah_peserta($nama_kelas)
    {
        require '../config.php';
        $data = mysqli_query($db, "SELECT * FROM tb_pemilih WHERE nama_kelas = '$nama_kelas'");
        $jlh_kab = mysqli_num_rows($data);
        return $jlh_kab;
    }
    ?>
</table>
