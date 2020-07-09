<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
     <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" /> 
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    
    <h2>Data Bus</h2>
    <!-- Table -->
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
                <?php $ambil=$koneksi->query("SELECT * FROM daftar_bus"); ?>
                    <?php while($column =$ambil->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $column['nama_merkbus']; ?></td>
                    <td><?php echo $column['category']; ?></td>
                    <td><?php echo $column['tujuan']; ?></td>
                    <td><?php echo $column['durasi']; ?></td>
                    <td><?php echo $column['fasilitas']; ?></td>
                    <td>Rp. <?php echo number_format($column['harga_sewa']); ?></td>
                    <td><img src="img/fotobus/<?php echo $column['gambar']; ?>" width="100px"> </td>
                    <td>
                        <a href="index.php?halaman=detail&id=<?php echo $column['id_bus']; ?>" class="btn btn-info">Detail</a>
                        <a href="index.php?halaman=hapusbus&id=<?php echo $column['id_bus']; ?>" onclick="return confirm('Hapus data')"><i class="fas fa-trash-alt bg-danger p-1 ml-1 text-white rounded" data-toggle="toltip" title="Hapus"></i></a>
                        <a href="index.php?halaman=updatebus&id=<?php echo $column['id_bus']; ?>"><i class="fas fa-edit bg-success p-1 ml-1 text-white rounded" data-toggle="tooltip" title="Edit"></i></a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </table>

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