<!DOCTYPE html>
<?php
session_start();
include 'koneksi.php';
$ambil=$koneksi->query("SELECT * FROM daftar_po WHERE id_anggota='$_GET[id]'");
$column= $ambil->fetch_assoc();

?>
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
                <li><a href="halamanuser.php" style="margin-right:20px">Beranda</a></li>
                <li><a href="logout.php" style="margin-left:20px">Logout<i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h2 style="margin-top:50px;">Update Data P.O</h2>
    <form method="post" enctype="multipart/form-data" style="margin:20px; width : 80%;">
        <div class="form-group">
            <label for="">Nama Perusahaan / P.O</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $column['nama_perusahaan']; ?>">
        </div>
        <div class="form-group">
            <label for="">email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $column['email']; ?>">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $column['password_user']; ?>">
        </div>
        <div class="form-group">
            <label for="">No Telpon</label>
            <input type="text" class="form-control" name="notlp" value="<?php echo $column['no_telpon']; ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" rows="10"><?php echo $column['alamat_anggota']; ?></textarea>
        </div>
        <button name="update" type="submit" class="btn btn-primary">Save</button>
    </form>
    <?php
    if (isset($_POST['update']))
    {
        $koneksi->query("UPDATE daftar_po SET nama_perusahaan='$_POST[nama]',email='$_POST[email]',
        password_user='$_POST[password]',no_telpon='$_POST[notlp]',alamat_anggota='$_POST[alamat]' WHERE id_anggota='$_GET[id]'");
        
        echo "<script>alert('Data PO telah diubah');</script>";
        echo "<script>location='halamanuser.php'</script>";
    }
    ?>
</div>
</body>
</html>