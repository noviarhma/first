<!DOCTYPE html>
<?php
session_start();
include 'koneksi.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP STYLES-->
    <link href="adminn/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="adminn/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="adminn/assets/css/custom.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<!-- form login-->
<div class="container">
    <div class="row text-center ">
        <div class="col-md-12">
            <br /><br />
            <h2> Sewa Sewa</h2>
             <br />
        </div>
        </div>
        <div class="row ">    
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#f9d200">
                        <strong>   Enter Details To Login </strong>  
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                        <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" class="form-control" name="user" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" class="form-control"  name="password" />
                            </div>
                            <div class="form-group">
                            </div>         
                            <button class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i>Login</button>
                            <hr />
                            Not register ? <a href="index.php" >click here </a> 
                        </form>
                        <?php
                        if (isset($_POST['login']))
                        {
                            $ambil = $koneksi->query("SELECT * FROM daftar_po WHERE email='$_POST[user]' 
                            AND password_user = '$_POST[password]'");
                            //hitung akun terambil
                            $match = $ambil->num_rows;
                            //jika 1 akun cocok akan login
                            if ($match== 1) 
                            {
                                //dapat akun dlm bentuk array
                                $row_akun = $ambil->fetch_assoc();
                                //simpan di session user
                                $_SESSION["user"]=$row_akun["id_anggota"];
                                echo"<div class='alert alert-info'>Login Success</div>";
                                echo"<meta http-equiv='refresh' content='1;url=halamanuser.php'>";
                            } else{
                                //gagal login
                                echo"<div class='alert alert-danger'>Login Failed</div>";
                                echo"<meta http-equiv='refresh' content='1;url=loginuser.php'>";
                            }
                        }
                        ?>
                    </div>          
                </div>
            </div>      
        </div>
    </div>
</div>
</body>
</html>