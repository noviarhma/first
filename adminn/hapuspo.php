<?php
$ambil = $koneksi->query("SELECT * FROM daftar_po WHERE id_anggota='$_GET[id]'");
$column = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM daftar_po WHERE id_anggota ='$_GET[id]'");

echo "<script>alert('Data PO Terhapus');</script>";
echo "<script>location='index.php?datapo';</script>";
?>