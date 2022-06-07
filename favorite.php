<?php 
include "header.php";
include "koneksi.php";
?>
<div class="row">
    <div class="col mt-3 mx-4">
        <div class="text-start">
            <strong class="mx-2 text-uppercase" style="color: black;"><b>Favorite</b></strong>
        </div>
    </div>
</div>
<div class="container-fluid text-center my-3">
    <div class="row mx-auto">
        <?php
        $id = $_SESSION['id'];
        $query = $koneksi->prepare("SELECT f.Id_buku as id, b.Judul AS judul, b.Penulis AS penulis, b.Penerbit AS penerbit, k.nama_kategori as kategori, b.Tahun_terbit AS terbit, b.Cover_buku as cover FROM favorite AS f INNER JOIN buku AS b ON f.Id_buku=b.Id_buku INNER JOIN user AS u ON f.id_user = u.Id_user INNER JOIN kategori AS k ON b.Id_kategori = k.id_kategori WHERE f.Id_user = ?;");
        $query->execute(array($id));
        $data = $query->fetchAll();
        if ($data == false) {
            ?>
        <script>
        console.log("belum ada data")
        </script>
        <div class="col my-5 py-5">
            <h1>Belum ada data favorite</h1>
        </div>

        <?php } else {

        } foreach ($data as $value) {
        ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100 border-0">
                <div class="row p-2">
                    <div class="col-md-3">
                        <img class="img-fluid" src="uploads/cover/<?php echo $value['cover']; ?>">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="float-start text-start">
                                    <b><a href="detail.php?id=<?php echo $value['id']; ?>"
                                            style="text-decoration: none; color: black;"><?php echo $value['judul'] . " (" . $value['terbit'] . ")"; ?></a></b>
                                </h5>
                            </div>
                            <div class="col-12">
                                <strong
                                    class="float-start text-start text-primary mt-n1"><?php echo $value['penulis']; ?></strong>
                            </div>
                            <div class="col-12">
                                <p class="float-start text-start text-secondary mt-n1"><?php echo $value['penerbit']; ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 mt-2">
                                        <p class="bg-secondary text-white text-center rounded-pill">
                                            <?php echo $value['kategori']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }; ?>
    </div>
</div>

<?php include "footer.php"; ?>