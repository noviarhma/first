<?php 
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM daftar_bus WHERE id_bus='$_GET[id]'");
$column = $ambil->fetch_assoc();
$nama = $column['gambar'];
if (file_exists("adminn/img/gambar/$nama"))
{
    unlink("adminn/img/gambar/$nama");
}

$koneksi->query("DELETE FROM daftar_bus WHERE id_bus ='$_GET[id]'");

echo "<script>alert('Data Bus Terhapus');</script>";
echo "<script>location='halamanuser.php';</script>";
?>