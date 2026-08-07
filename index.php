<html>
<head>
    <title>LOGIN PEMILIH</title>
    <link rel="stylesheet" type="text/css" href="css/style_login_peserta.css">
    <link rel="shortcut icon" href="image/logo.png">

</head>

<body>
    
    


    <?php 
        require 'config.php';


        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
        $d = mysqli_fetch_assoc($data);
        
    ?>
    	



    <div class="login">
        

        <img src="image/logo.png" width="80px" height="80px" style="display:block; margin:auto;">
        <center><h3> Selamat Datang...</h3>
        
       </center>


        <!-- proses: login_peserta.php -->
        
        <form action="proses_login.php" method="post" onSubmit="return validasi()"> 

            <div>
                <input type="text" name="no_id" id="no_id" placeholder="masukkan no identitas..."  autofocus="" autocomplete="off" />
            </div>


            <div>
                <input type="password" name="password" id="password" placeholder="masukkan password..."  autofocus="" autocomplete="off" />
            </div>  
                
                <input type="checkbox" onclick="myFunction()">Tampilkan Password
            

        

            <div align="center">
                <br><br><br>
                <input  type="submit" value="LOGIN" name ="tombol" class="tombol">
            </div>
        </form>


    </div>


</body>

<hr>

		<center>
    	<h2> <?php echo $d['npsn']; ?> ||
        <?php echo $d['nm_sekolah']; ?></h2>
        </center>


    <?php 
        require 'config.php';
        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_admin");
        $d = mysqli_fetch_assoc($data);
        
        ?>

            
                <footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>

                </footer>

 
        <script type="text/javascript">

            function validasi() {
            var no_id = document.getElementById("no_id").value;
            var password = document.getElementById("password").value;       
            if (no_id != "" && password!="") {
            return true;
            }

            else {
            alert('username atau Password harus diisi.. !');
            return false;
                }
            }

            function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } 
            else {
                x.type = "password";
                }
            }
 
</script>

</html>