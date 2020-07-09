<h2>Update Data P.O</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM daftar_po WHERE id_anggota='$_GET[id]'");
$column= $ambil->fetch_assoc();

?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Perusahaan / P.O</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $column['nama_perusahaan']; ?>">
    </div>
    <div class="form-group">
        <label for="">email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $column['email']; ?>">
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
        no_telpon='$_POST[notlp]',alamat_anggota='$_POST[alamat]' WHERE id_anggota='$_GET[id]'");
    
    echo "<script>alert('Data PO telah diubah');</script>";
    echo "<script>location='index.php?halaman=datapo'</script>";
}
?>