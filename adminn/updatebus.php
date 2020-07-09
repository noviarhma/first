<h2>Update Bus</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM daftar_bus WHERE id_bus='$_GET[id]'");
$column= $ambil->fetch_assoc();

?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Merk Bus</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $column['nama_merkbus']; ?>">
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="category" value="<?php echo $column['category']; ?>">
            <option value="Van / Micro Bus">Van / Micro Bus</option>
            <option value="Big bus">Big bus</option>
            <option value="Medium bus">Medium bus</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tujuan</label>
        <input type="text" class="form-control" name="tujuan" value="<?php echo $column['tujuan']; ?>">
    </div>
    <div class="form-group">
        <label for="">Durasi Sewa</label>
        <input type="text" class="form-control" name="durasi" value="<?php echo $column['durasi']; ?>">
    </div>
    <div class="form-group">
        <label for="">Fasilitas</label>
        <textarea class="form-control" name="fasilitas" rows="10"><?php echo $column['fasilitas']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="">Harga Sewa</label>
        <input type="text" class="form-control" name="harga_sewa" value="<?php echo $column['harga_sewa']; ?>">
    </div>
    <div class="form-group">
        <img src="img/fotobus/<?php echo $column['gambar'] ?>" width="200px;">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-group">
        <label for="">id_anggota</label>
        <input type="text" class="form-control" name="id_anggota" value="<?php echo $column['id_anggota']; ?>">
    </div>
    <button name="update" type="submit" class="btn btn-primary">Save</button>
</form>
<?php 
if (isset($_POST['update']))
{
    $nama = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    if (!empty($lokasi))
    {
        move_uploaded_file($lokasi,"img/fotobus/".$nama);

        $koneksi->query("UPDATE daftar_bus SET nama_merkbus='$_POST[nama]',category='$_POST[category]',
        tujuan='$_POST[tujuan]',durasi='$_POST[durasi]',fasilitas='$_POST[fasilitas]',harga_sewa='$_POST[harga_sewa]',
        gambar='$nama' WHERE id_bus='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE daftar_bus SET nama_merkbus='$_POST[nama]',category='$_POST[category]',
        tujuan='$_POST[tujuan]',durasi='$_POST[durasi]',fasilitas='$_POST[fasilitas]',harga_sewa='$_POST[harga_sewa]' WHERE id_bus='$_GET[id]'");
    }
    echo "<script>alert('Data Bus telah diubah');</script>";
    echo "<script>location='index.php?halaman=bus'</script>";
}
?>

