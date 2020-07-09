<?php
session_start();
include 'koneksi.php';

//jk tdl ada session user
if (!isset($_SESSION["user"]))
{
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='loginuser.php;</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="adminn/assets/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>User</title>
</head>
<body>
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
                <li><a href="logout.php" style="margin-left:20px">Logout<i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

    
<div class="container">
    <!-- Table -->
    <table class="table table-striped table-bordered" style="margin-top:60px;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama P.O</th>
                <th scope="col">Email</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Alamat</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $id_anggota= $_SESSION["user"];
            $ambil=$koneksi->query("SELECT * FROM daftar_po WHERE id_anggota= '$id_anggota'"); ?>
            <?php while($column = $ambil->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $column['id_anggota']; ?></td>
                <td><?php echo $column['nama_perusahaan']; ?></td>
                <td><?php echo $column['email']; ?></td>
                <td><?php echo $column['no_telpon']; ?></td>
                <td><?php echo $column['alamat_anggota']; ?></td>
                <td>
                    <a href="updatepo.php?&id=<?php echo $column['id_anggota']; ?>"><i class="fas fa-edit bg-success p-1 text-white rounded" data-toggle="toltip" title="Edit"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <!--Modal button-->
    <button type="button" class="btn btn-primary" style="margin-bottom:8px; margin-top:70px;" data-toggle="modal" data-target="#myModal" ><i class="fas fa-plus-circle" style="margin-right:3px;"></i>Tambah Data</button>
    <!--Modal-login-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Bus</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama Merk Bus</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category">
                                <option value="Van / Micro Bus">Van / Micro Bus</option>
                                <option value="Big bus">Big bus</option>
                                <option value="Medium bus">Medium bus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            <input type="text" class="form-control" name="tujuan">
                        </div>
                        <div class="form-group">
                            <label for="">Durasi Sewa</label>
                            <input type="text" class="form-control" name="durasi">
                        </div>
                        <div class="form-group">
                            <label for="">Fasilitas</label>
                            <textarea class="form-control" name="fasilitas" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Sewa</label>
                            <input type="text" class="form-control" name="harga_sewa">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                        <div class="form-group">
                            <label for="">Id Pengguna</label>
                            <input type="text" class="form-control" name="id_anggota">
                        </div>
                        <button name="save" value="save" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

        if (isset($_POST['save']))
        {
            $nama = $_FILES['gambar']['name'];
            $lokasi = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($lokasi,"adminn/img/fotobus/".$nama);
            $koneksi->query("INSERT INTO daftar_bus
            (nama_merkbus,category,tujuan,durasi,fasilitas,harga_sewa,gambar,id_anggota)
            Values('$_POST[nama]','$_POST[category]','$_POST[tujuan]','$_POST[durasi]',
            '$_POST[fasilitas]','$_POST[harga_sewa]','$nama','$_POST[id_anggota]')");
            
            echo "<div class='alert alert-info'>Data Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=halamanuser.php'>";
        }
    ?>
    <!--table daftar bus-->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Merk Bus</th>
                <th scope="col">Category</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Durasi</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Harga Sewa</th>
                <th scope="col">Gambar</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            <?php $nomor=1; ?>
            <?php  ?>
            <?php 
            $id_anggota= $_SESSION["user"];
            $ambil=$koneksi->query("SELECT * FROM daftar_bus WHERE id_anggota= '$id_anggota'"); ?>
                <?php while($column =$ambil->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $column['nama_merkbus']; ?></td>
                <td><?php echo $column['category']; ?></td>
                <td><?php echo $column['tujuan']; ?></td>
                <td><?php echo $column['durasi']; ?></td>
                <td><?php echo $column['fasilitas']; ?></td>
                <td>Rp.<?php echo number_format($column['harga_sewa']); ?></td>
                <td><img src="adminn/img/fotobus/<?php echo $column['gambar']; ?>" width="100px"> </td>
                <td>
                    <a href="hapusbus.php?&id=<?php echo $column['id_bus']; ?>" onclick="return confirm('Hapus data')"><i class="fas fa-trash-alt bg-danger p-1 ml-1 text-white rounded" data-toggle="toltip" title="Hapus"></i></a>
                    <a href="updatebus.php?&id=<?php echo $column['id_bus']; ?>"><i class="fas fa-edit bg-success p-1 ml-1 text-white rounded" data-toggle="tooltip" title="Edit"></i></a>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
//modal
$(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>
</body>
</html>