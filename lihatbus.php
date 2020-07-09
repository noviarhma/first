<?php
//connection
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Nama P.O</th>
                <th scope="col">Email</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nama Bus</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Durasi Sewa</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Harga Sewa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id=$_GET['id'];
            $ambil = $koneksi->query("SELECT * FROM daftar_po JOIN daftar_bus 
                ON daftar_po.id_anggota = daftar_bus.id_anggota WHERE daftar_bus.id_bus = '$id'");?>
                <?php while($column=mysqli_fetch_array($ambil)) { ?> 
                
            <section class="content">
                <div class="container" style="margin-left:25%; margin-top:80px;">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="adminn/img/fotobus/<?php echo $column['gambar']; ?>" class="img-responsive" style ="width:80%; max-height: 200px;">
                        </div>
                    </div>
                </div>
            </section>

            <tr>
                <td><?php echo $column['nama_perusahaan']; ?></td>
                <td><?php echo $column['email']; ?></td>
                <td><?php echo $column['no_telpon']; ?></td>
                <td><?php echo $column['alamat_anggota']; ?></td>
                <td><?php echo $column['nama_merkbus']; ?></td>
                <td><?php echo $column['tujuan']; ?></td>
                <td><?php echo $column['durasi']; ?></td>
                <td><?php echo $column['fasilitas']; ?></td>
                <td>Rp. <?php echo number_format($column['harga_sewa']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
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
.table {
    margin-top : 80px;
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
</style>
</body>