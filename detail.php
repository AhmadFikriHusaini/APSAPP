<?php
include "header.php";
include "koneksi.php";
function checkFav($id_user, $id_buku, $koneksi)
{
    $data[] = $id_user;
    $data[] = $id_buku;
    $query = 'SELECT * FROM favorite WHERE Id_user =? AND Id_buku=?';
    $check = $koneksi->prepare($query);
    $check->execute($data);
    $isi = $check->fetch();
    if ($isi == 0){
        echo '<script>console.log("unfav")</script>';
        echo '<button id="' . $id_user . '" class="fav btn btn-outline-warning float-end" user_data="' . $id_user .'" buku_data="' . $id_buku . '" aksi="favorite"><i class="fa-regular fa-star"></i></button>';
    } else {
        echo '<script>console.log("fav")</script>';
        echo '<button id="' . $id_user . '" class="fav btn btn-warning float-end" user_data="' . $id_user .'" buku_data="' . $id_buku . '" aksi="unfavorite"><i class="fa-regular fa-star"></i></button>';
    }
}
$id_user = $_SESSION['id'];
$id_buku = $_GET['id'];
$query = 'SELECT * FROM buku WHERE Id_buku =?';
$select = $koneksi->prepare($query);
$select->execute(array($id_buku));
$value = $select->fetch();
?>
<div class="container">
    <div class="card py-5 px-3">
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid" src=" uploads/cover/<?php echo $value['Cover_buku']; ?>" width="300px">
            </div>
            <div class="col-md-7">
                <h2 class="text-dark"><b><?php echo $value['Judul'] . " (" . $value['Tahun_terbit'] . ")"; ?></b></h2>
                <h5 class="text-primary"><b><?php echo $value['Penulis']; ?></b></h5>
                <p class="text-secondary mt-n2"><?php echo $value['Penerbit']; ?></p>
                <strong>Deskripsi :</strong>
                <p style="text-align: justify;"><?php echo $value['deskripsi']; ?></p>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Kategori:</strong>
                        <?php
                            $cat = $koneksi->prepare("SELECT kategori.nama_kategori as kategori FROM kategori, buku WHERE kategori.id_kategori = buku.Id_kategori AND buku.Id_buku=?;");
                            $cat->execute(array($id_buku));
                            $dt = $cat->fetchAll();
                            foreach ($dt as $v) { ?>
                        <p class="bg-secondary text-white text-center rounded-pill"><?php echo $v['kategori']; ?></p>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <?php checkFav($id_user, $id_buku, $koneksi); ?>
                <!-- <button class="btn btn-outline-warning float-end"><i class="fa-regular fa-star"></i></button> -->
            </div>
            <!-- <div class="col-md-12">
                <a href="uploads/book/Contoh Proposal Proyek.pdf#toolbar=0" target="_blank"
                    rel="noopener noreferrer">Contoh Proposal Proyek.pdf</a>
            </div> -->
            <?php if ($value['file_buku'] != '') { ?>
            <div class="col-md-12 mt-5 text-center">
                <embed src="uploads/book/<?php echo $value['file_buku'] ?>#toolbar=0" type="" width="100%"
                    height="1000">
            </div>
            <?php }; ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
