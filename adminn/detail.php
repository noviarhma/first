<body>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama P.O</th>
                <th scope="col">Email</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1;
            $id=$_GET['id'];
            $ambil = $koneksi->query("SELECT * FROM daftar_po JOIN daftar_bus 
                ON daftar_bus.id_anggota= daftar_po.id_anggota WHERE daftar_bus.id_bus = '$id'");?>
                <?php while($column=$ambil->fetch_assoc()) { ?> 
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $column['nama_perusahaan']; ?></td>
                <td><?php echo $column['email']; ?></td>
                <td><?php echo $column['no_telpon']; ?></td>
                <td><?php echo $column['alamat_anggota']; ?></td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
</body>
</html>