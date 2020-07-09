<?php
session_start();
//connection
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEWA SEWA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="adminn/assets/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
<body id="myPage" data-spy="scroll" data-target="navbar" data-offset="60">

<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#mypage">S E W A S E W A</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about" style="margin-right:20px">About Us</a></li>
                <li><a href="#category" style="margin-right:20px">Category</a></li>
                <li><a href="#contact" style="margin-right:20px">Contact</a></li>
                <li>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" 
                    style="margin: 8px;">Daftar</button>
                    <!--modal-Daftar-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                    
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Daftar Sekarang</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" role="form">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" class="form-control" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No Telpon</label>
                                            <input type="text" class="form-control" name="notelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" class="form-control" name="alamat">
                                        </div>
                                        <button name="signup" type="submit" class="btn btn-block"><span class="glyphicon glyphicon-off"></span>Daftar</button>
                                    </form>
                                    <?php
                                    if (isset($_POST["signup"]))
                                    {
                                        $nama = htmlspecialchars($_POST["nama"]);
                                        $email = htmlspecialchars($_POST["email"]);
                                        $pass = htmlspecialchars($_POST["password"]);
                                        $notelp = htmlspecialchars($_POST["notelp"]);
                                        $alamat = htmlspecialchars($_POST["alamat"]);

                                        $koneksi->query("INSERT INTO daftar_po
                                            (nama_perusahaan,email,password_user,no_telpon,alamat_anggota)
                                            Values('$nama','$email','$pass','$notelp','$alamat')");

                                        echo "<script>alert('Daftar Berhasil');</script>";
                                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                    <br>
                                    Sudah Punya Account ? <a href="loginuser.php" >click here </a>
                                    <br>
                                    <a href="#contact">Baca Syarat dan Ketentuan </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </li>
                <li><button class="btn btn-primary btn-lg" name="login" style="margin: 8px;"><a href="loginuser.php"><i class="fas fa-sign-in-alt"></i>Login</a></button></li>
            </ul>
        </div>
    </div>
</nav>

<!-- carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!--carousel wrapper -->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-caption jumbotron">
                <h1>S E W A S E W A</h2>
        </div>
        <div class="item active">
            <img src="img/cover.jpg" alt="">
        </div>

        <div class="item">
            <img src="img/1.jpg" alt="">
        </div>

        <div class="item">
            <img src="img/3.jpg" alt="">
        </div>
    </div>

<!-- L/R controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- about section-->
<div id="about" class="container-fluid">
    <div class="row">
        <h2 style="text-align:center;">About Us</h2>
        <div class="col-sm-8">
            <h3 style="margin-left:20%;">Hola, </h3>
            <h4 style="margin-left:20%;">Sewa Sewa merupakan layanan penyedia informasi sewa bus, kami membagi
            3 menu category yang dapat anda pilih. Untuk kalian yang ingin mempromosikan
            bus dapat mendaftar dengan klik tombol daftar diatas. Kami terus berusaha
            untuk mengembangkan fitur layanan kami supaya lebih baik lagi. Jika ada 
            saran atau pertanyaan silahkan kontak kami.</h4>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-road logo"></span>
        </div>
    </div>
</div>

<hr style="width:80%;">

<!-- category -->
<div id="category" class="container-fluid">
    <div class="text-center">
        <h2>CATEGORY</h2>
        <h4>Choose a bus that you need</h4>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h3>Big Bus</h3>
                </div>
                <div class="panel-body">
                    <img src="img/bigbus.jpg" alt="">
                    <p><strong>43-59 Seat</strong></p>
                </div>
                <div class="panel-footer">
                <a href="bigbus.php"><button class="btn btn-lg">Lihat</button></a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h3>Medium Bus</h3>
                </div>
                <div class="panel-body">
                    <img src="img/tour.png" alt="">
                    <p><strong>27-34 Seat</strong></p>
                </div>
                <div class="panel-footer">
                    <a href="mediumbus.php"><button class="btn btn-lg">Lihat</button></a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h3>Van / Micro Bus</h3>
                </div>
                <div class="panel-body">
                    <img src="img/van.jpg" alt="van">
                    <p><strong>15-22 Seat</strong></p>
                </div>
                <div class="panel-footer">
                <a href="van.php"><button class="btn btn-lg">Lihat</button></a>
                </div>
            </div>
        </div>
    </div>
</div>


<!--contact-->
<div id="contact" class="container-fluid text-center">
    <h2>CONTACT</h2>
    <p>Contact us and we'll get back to you within 24 hours.</p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Bekasi, Indonesia</p>
    <p><span class="glyphicon glyphicon-phone"></span> +62 821xxxxxx</p>
    <p><span class="glyphicon glyphicon-envelope"></span> hola@mail.co.id</p>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2" style="border-radius:8px; margin-bottom:5px;">Syarat dan Ketentuan</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Syarat dan Ketentuan</h4>
                </div>
                <div class="modal-body">
                    <p>Jika User Mengupload konten yang tidak sesuai admin kami berhak menghapusnya tanpa pemberitahuan.</p>
                    <p>Jika Mengupload data sertakan ID.
                    <p>Isikan Profil data anda dengan benar.</p>
                    <p>Pastikan kontak yang tertera dapat dihubungi.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>    
    <p>S E W A S E W A  &copy;  2020</p>
</footer>


<script>
//signup modal
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
//term modal
$(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal2").modal();
        });
    });

//smooth scrolling
    $(document).ready(function(){
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            if (this.hash !== ""){
                event.preventDefault();

                var hash = this.hash;

                $('html, body').animate({
                    scrollTop:$(hash).offset().top
                }, 900, function(){
                    window.location.hash = hash;
            });
        }
    });

        $(window).scroll(function() {
            $(".slideanim").each(function(){
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>

</body>
</html>