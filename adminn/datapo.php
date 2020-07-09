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
    <h2>Data PO</h2>
    
    <!-- Table -->
       <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama P.O</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Alamat</th>
                    <th colspan="3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $ambil=$koneksi->query("SELECT * FROM daftar_po"); ?>
                <?php while($column = $ambil->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $column['nama_perusahaan']; ?></td>
                    <td><?php echo $column['email']; ?></td>
                    <td><?php echo $column['no_telpon']; ?></td>
                    <td><?php echo $column['alamat_anggota']; ?></td>
                    <td>
                        <a href="index.php?halaman=updatepo&id=<?php echo $column['id_anggota']; ?>"><i class="fas fa-edit bg-success p-1 text-white rounded" data-toggle="toltip" title="Edit"></i></a>
                        <a href="index.php?halaman=hapuspo&id=<?php echo $column['id_anggota']; ?>" onclick="return confirm('Hapus data')"><i class="fas fa-trash-alt bg-danger p-1 text-white rounded" data-toggle="toltip" title="Hapus"></i></a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </table>
</body>
</html>