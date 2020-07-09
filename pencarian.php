<?php
include 'koneksi.php';

    $keyword = $_GET["keyword"];
    $semuadata = array();
    $ambil = $koneksi->query("SELECT * FROM daftar_bus WHERE nama_merkbus LIKE '%$keyword%'");
    while($column = $ambil->fetch_assoc())
    {
        $semuadata[]=$column;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="adminn/assets/fontawesome/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>S E W A S E W A</title>
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">S E W A S E W A</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" style="margin-right:20px">About Us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" 
                    style="margin-right:20px">Category<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="bigbus.php">Big Bus</a></li>
                        <li><a href="mediumbus.php">Medium Bus</a></li>
                        <li><a href="van.php">Van / Micro Bus</a></li>
                    </ul>
                </li>
                <li><a href="index.php" style="margin-right:20px">Contact</a></li>
                <li>
                    <form class="form-inline my-2 my-lg-0 ml-auto" method="GET" action="pencarian.php" style="margin-top:10px;">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>  
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="category" class="content">
    <div class="container">
        <h2>Hasil Pencarian : <?php echo $keyword ?></h2>

        <div class="row">
            <?php foreach ($semuadata as $key => $value):?>

            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="adminn/img/fotobus/<?php echo $value['gambar']; ?>" alt="">
                    <div class="caption">
                        <h3><?php echo $value['nama_merkbus']; ?></h3>
                        <h5><?php echo $value['category']; ?></h5>
                        
                        <a href="lihatbus.php?halaman=detail&id=<?php echo $value['id_bus']; ?>" class="btn btn-info">Lihat</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>


        </div>
    </div>
</section>

<style>
/*navbar*/
.navbar{
    background-color: #f9d200;
    margin-bottom: 0;
    z-index: 9999;
    border: 0;
    font-size: 16px !important;
    line-height: 1.4 !important;
    letter-spacing: 4px;
    border-radius: 0;
}

.navbar li a, .navbar .navbar-brand{
    color: #000 !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a{
    color: #f9d200 !important;
    background-color: #000 !important;
}

.navbar-default .navbar-toggle{
    border-color: transparent;
    color: #fff;
}
.btn {
    padding: 5px 5px;
    background-color: #f9d200;
    color: black;
    border-radius: 5px;
    transition: .2s;
    border-color: black;
}
.btn:hover, .btn:focus {
    border: 1px solid #f9d200;
    background-color: black;
    color: #f9d200;
}

/*content*/
section {
    margin: 30px;
}
section h2{
    text-align: center;
    padding-bottom: 40px;
    padding-top:20px;
}
.thumbnail img{
    height:200px;
    width:100%;
}
</style>
</body>
</html>