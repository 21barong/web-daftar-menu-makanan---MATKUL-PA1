

<?php  require_once 'header_template.php'; 

        
?>


<div class="content">
    <div class="container">

    <h3 class="page-title"> Tambah User </h3>

        <div class="card">

        <form action="" method="post">

            <div class="input-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="user" placeholder="Username" class="input-control" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="pass" placeholder="Password" class="input-control" required>
            </div>

            <div class="input-group">
                <button type="button" class="btn-back" onclick="window.location.href = 'users.php'"> Kembali </button>
                <button type="submit" name="submit" class="btn-submit"> Simpan </button>
            </div>

        </form>
    
        <?php

            if(isset($_POST['submit'])) {
                
                // proses insert data
                $query_insert = 'insert into users (namalengkap,username,password) value ("'.$_POST['nama'].'","'.$_POST['user'].'","'.$_POST['pass'].'")';

                $run_query_insert = mysqli_query($conn,$query_insert);

                if($run_query_insert) {
                    echo 'Simpan Data Berhasil';
                } else {
                    echo 'Simpan Data Gagal';
                }

            }

        ?>
       
        </div>

    </div>
</div>


<?php require_once 'footer_template.php'; ?>



  


           