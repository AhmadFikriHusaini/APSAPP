<?php
include "header.php";
include "koneksi.php";
if ($_SESSION['akses'] != 'admin') {
    echo '<script>window.location="index.php"</script>';
}
?>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="d-flex mb-1 justify-content-end">
                <div>
                    <a href="insert_pengguna.php" class="btn btn-success"><span class="fa fa-plus"></span></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-md" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>username</th>
                            <th>password</th>
                            <th>hak akses</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody id="mytable">
                        <?php
                            $query = $koneksi->prepare("SELECT * FROM user");
                            $query->execute();
                            $data = $query->fetchAll();
                            $no = 1;
                            foreach ($data as $value) {
                            ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $value['Email'] ?></td>
                            <td><?php echo $value['Username'] ?></td>
                            <td><?php echo $value['Password'] ?></td>
                            <td><?php echo $value['Hak_Akses'] ?></td>
                            <td class="">
                                <div class="row justify-content-center">
                                    <div class="col-md-3 p-1">
                                        <a href="update_pengguna.php?id=<?php echo $value['id_user']; ?>"
                                            class="btn btn-warning">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    </div>
                                    <div class="col-md-3 p-1"><a href="#" class="btn btn-danger confirm2"
                                            data-id="<?php echo $value['id_user']; ?>"
                                            data-email="<?php echo $value['Email']; ?>">
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