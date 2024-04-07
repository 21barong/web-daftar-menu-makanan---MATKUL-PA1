<?php
    session_start();
    if(isset($_SESSION['uid'])) {
        header('location:admin/index.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  </head>

  <style>
    .login-page {
        width: 100%;
        height: 100vh;
        display: inline-block;
        display: flex;
        align-items: center;
    }

    .form-right i {
        font-size: 100px;
    }
  </style>

  <body>
        <div class="login-page bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="bg-white shadow rounded">
                            
                            <div class="row">
                                <div class="col-md-7 pe-0">
                                    <div class="form-left h-100 py-5 px-5">

                                    <form action="" class="row g-4" method="post">

                                        <div class="col-12">
                                            <label for="">Username<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                            <input type="text" name="user" class="form-control" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="">Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                            <input type="password" name="pass" class="form-control" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="inlineFormCheck">
                                                <label for="inlineFormCheck" class="form-check-label">Remember Me</label>
                                            </div>
                                        </div>
                                        <?php

                                        // cek jika tombol login di tekan
                                        if(isset($_POST['login'])){

                                            include 'database.php';

                                            // cek data login
                                            $query_select = 'select * from users
                                            where username = "'.mysqli_real_escape_string($conn, $_POST['user']).'"
                                            and password = "'.mysqli_real_escape_string($conn, ($_POST['pass'])).'" ';

                                            $run_query_select = mysqli_query($conn, $query_select);
                                            $d = mysqli_fetch_object($run_query_select);

                                            if($d){
                                                
                                                // buat session
                                                $_SESSION['uid'] 	= $d->iduser;
                                                $_SESSION['uname'] 	= $d->namalengkap;
                                                $_SESSION['restaurantid'] = $d -> idrestaurant;
                                              

                                                header('location:admin/index.php');

                                            }else{
                                                echo 'Username atau password salah';
                                            }

                                        }

                                        ?>
                                        
                                        <div class="col-12">
                                            <button type="submit" name="login" class="btn btn-dark px-4 float-end mt-4">Login</button>
                                        </div>

                                    </form>
                                   
                                    </div>
                                </div>

                                    <div class="col-md-5 ps-0 d-none d-md-block">
                                        <div class="form-right h-100 bg-dark text-white text-center pt-5">
                                            <i class="bi-key-fill"></i>
                                            <h2 class="fs-1">Login Admin</h2>
                                        </div>
                                    </div>
                                   
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



</body>
</html>