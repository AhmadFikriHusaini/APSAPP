<?php
include "header.php";
include "koneksi.php";
if ($_SESSION['akses'] == 'anggota') {
    echo '<script>window.location="index.php"</script>';
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Buku</h6>
        </div>
        <div class="card-body">
            <div class="d-flex mb-1 justify-content-end">
                <div class="d-flex flex-row">
                    <div>
                        <a href="insert_buku.php" class="btn btn-success"><span class="fa fa-plus"></span></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-md" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>judul buku</th>
                            <th>cover buku</th>
                            <th>penulis</th>
                            <th>penerbit</th>
                            <th>kategori</th>
                            <th>tahun terbit</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody id="mytable">
                        <?php
                            $query = $koneksi->prepare("SELECT * FROM buku, kategori Where buku.Id_kategori = kategori.id_kategori");
                            $query->execute();
                            $data = $query->fetchAll();
                            $no = 1;
                            foreach ($data as $value) {
                            ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $value['Judul'] ?></td>
                            <td class="text-center"><img src="uploads/cover/<?php echo $value['Cover_buku'] ?>"
                                    style="width: 40px;"></td>
                            <td><?php echo $value['Penulis'] ?></td>
                            <td><?php echo $value['Penerbit'] ?></td>
                            <td><?php echo $value['nama_kategori']; ?></td>
                            <td><?php echo $value['Tahun_terbit'] ?></td>
                            <td class="">
                                <div class="row justify-content-center">
                                    <div class="col-md-3 p-2"> <a href="detail.php?id=<?php echo $value['Id_buku']; ?>"
                                            class="btn btn-success"><span class="fa fa-eye"></span></a></div>
                                    <div class="col-md-3 p-2"><a
                                            href="update_buku.php?id=<?php echo $value['Id_buku']; ?>"
                                            class="btn btn-warning">
                                            <span class="fa fa-edit"></span>
                                        </a></div>
                                    <div class="col-md-3 p-2"> <a href="#" class="btn btn-danger confirm"
                                            data-id="<?php echo $value['Id_buku']; ?>"
                                            data-judul="<?php echo $value['Judul']; ?>">
                                            <span class="fa fa-trash"></span>
                                        </a></div>
                                </div>
                            </td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include "footer.php"; ?>