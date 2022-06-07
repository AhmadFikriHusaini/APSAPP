<?php include "header.php"; include "koneksi.php"; ?>
<div class="container-fluid">

    <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'petugas') { ?>

    <div class="row">
        <?php if ($_SESSION['akses'] == 'admin') { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="mb-1">
                                <a href="pengguna.php" class="text-xs font-weight-bold text-primary text-uppercase"
                                    style="text-decoration: none;">Pengguna</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }; ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="mb-1">
                                <a href="buku.php" class="text-xs font-weight-bold text-uppercase text-success"
                                    style="text-decoration: none;">Buku</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }; ?>
    <?php if ($_SESSION['akses'] == 'anggota') { ?>
    <div class="container-fluid text-center my-3">
        <div class="row mx-auto my-auto">
            <div class="d-flex flex-row mx-3 mb-3">
                <div>
                    <form class="d-flex" action="" method="POST">
                        <input class="form-control me-2" type="text" placeholder="cari...." name="key">
                        <button class="btn btn-primary mx-1" type="submit" name="submit"><span
                                class="fa fa-search"></span></button>
                    </form>
                </div>
            </div>
            </form>
            <?php
            if (isset($_POST['submit']) && $_POST['key'] != '') {
                $key = '%' . $_POST['key'] . '%';

                $query = 'SELECT * FROM buku, kategori WHERE buku.Id_kategori = kategori.id_kategori AND (buku.Judul LIKE :judul OR buku.Penulis LIKE :penulis OR buku.Penerbit LIKE :penerbit OR buku.Tahun_terbit LIKE :terbit OR kategori.nama_kategori LIKE :kategori);';
                $search = $koneksi->prepare($query);
                $search->bindParam(':judul', $key);
                $search->bindParam(':penulis', $key);
                $search->bindParam(':penerbit', $key);
                $search->bindParam(':terbit', $key);
                $search->bindParam(':kategori', $key);
                $search->execute();
                foreach ($search as $value) {
            ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0">
                    <div class="row p-2">
                        <div class="col-md-3">
                            <img class="img-fluid" src="uploads/cover/<?php echo $value['Cover_buku']; ?>">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="float-start text-start">
                                        <b><a href="detail.php?id=<?php echo $value['Id_buku']; ?>"
                                                style="text-decoration: none; color: black;"><?php echo $value['Judul'] . " (" . $value['Tahun_terbit'] . ")"; ?></a></b>
                                    </h5>
                                </div>
                                <div class="col-12">
                                    <strong
                                        class="float-start text-start text-primary mt-n1"><?php echo $value['Penulis']; ?></strong>
                                </div>
                                <div class="col-12">
                                    <p class="float-start text-start text-secondary mt-n1">
                                        <?php echo $value['Penerbit']; ?>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 mt-2">
                                            <p class="bg-secondary text-white text-center rounded-pill">
                                                <?php echo $value['nama_kategori']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }; 
        } else if(isset($_POST['submit']) && $_POST['key'] == '') { echo "<script>window.location='index.php';</script>"; } else { ?>
            <?php 

            $query = $koneksi->prepare('SELECT * FROM buku, kategori Where buku.Id_kategori = kategori.id_kategori GROUP BY kategori.id_kategori;');
            $query->execute();
            $kate = $query->fetchAll();
            foreach ($kate as $k) {
        
        ?>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col mt-3">
                        <div class="text-start">
                            <strong class="mx-2 text-uppercase"
                                style="color: black;"><b><?php echo $k['nama_kategori']; ?></b></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="<?php echo $k['nama_kategori']; ?>" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="false">
                <div class="carousel-inner" role="listbox">
                    <?php
                        $query = $koneksi->prepare("SELECT * FROM buku INNER JOIN kategori ON buku.Id_kategori = kategori.id_kategori WHERE kategori.id_kategori = ?");
                        $query->execute(array($k['id_kategori']));
                        $data = $query->fetchAll();
                        $cc = 0;
                        foreach ($data as $carousel) {
                            $cc++;
                    ?>
                    <div class="carousel-item <?php if ($cc == 1) { echo 'active'; };?>">
                        <div class="col-sm">
                            <div class="card h-100 border-0">
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <img class="img-fluid"
                                            src="uploads/cover/<?php echo $carousel['Cover_buku'] ?>">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="float-start text-start">
                                                    <b><a href="detail.php?id=<?php echo $carousel['Id_buku']; ?>"
                                                            style="text-decoration: none; color: black;"><?php echo $carousel['Judul']; ?></a></b>
                                                </h5>
                                            </div>
                                            <div class="col-12">
                                                <strong
                                                    class="float-start text-start text-primary mt-n1"><?php echo $carousel['Penulis']; ?></strong>
                                            </div>
                                            <div class="col-12">
                                                <p class="float-start text-start text-secondary mt-n1">
                                                    <?php echo $carousel['Penerbit'];; ?></p>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-6 mt-2">
                                                        <p class="bg-secondary text-white text-center rounded-pill">
                                                            <?php echo $carousel['nama_kategori']; ?></p>
                                                    </div>
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
                <a class="carousel-control-prev" href="#<?php echo $k['nama_kategori']; ?>" role="button"
                    data-bs-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="carousel-control-next" href="#<?php echo $k['nama_kategori']; ?>" role="button"
                    data-bs-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <?php }; }; ?>
        </div>
    </div>
    <?php }; ?>
    <?php include "footer.php"; ?>