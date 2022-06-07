<?php
include "header.php";
include "koneksi.php";

if ($_SESSION['akses'] == 'anggota') {
    echo '<script>window.location="index.php"</script>';
}

if (isset($_POST['submit'])) {

    $title = $_POST['judul'];
    $writer = $_POST['penulis'];
    $publisher = $_POST['penerbit'];
    $cat = $_POST['kategori'];
    $release = $_POST['tahun'];
    $desc = $_POST['deskripsi'];
    $pdfname = $_FILES['pdf']['name'];
    $pdftemp = $_FILES['pdf']['tmp_name'];
    $pdftype = $_FILES['pdf']['type'];
    $pdfsize = $_FILES['pdf']['size'];
    $target_dir_pdf = ('uploads/book/');
    $removeExtension_pdf = explode('.', basename($pdfname));
    $rename_pdf = date("m-d-y") . "." . date("h-i-s") . "." .  $title . "." . end($removeExtension_pdf);
    $target_file_pdf = $target_dir_pdf . $rename_pdf;
    $filename = $_FILES['cover']['name'];
    $filetemp = $_FILES['cover']['tmp_name'];
    $filetype = $_FILES['cover']['type'];
    $filesize = $_FILES['cover']['size'];
    $target_dir = ('uploads/cover/');
    $removeExtension = explode('.', basename($filename));
    $rename = date("m-d-y") . "." . date("h-i-s") . "." .  $title . "." . end($removeExtension);
    $target_file = $target_dir . $rename;

    $data[] = $title;
    $data[] = $writer;
    $data[] = $publisher;
    $data[] = $cat;
    $data[] = $release;
    $data[] = $rename;
    $data[] = $rename_pdf;
    $data[] = $desc;

    if (($filetype == 'image/png' || $filetype == 'image/jpg' || $filetype == 'image/jpeg') && ($pdftype == 'application/pdf')) {
        if (move_uploaded_file($filetemp, $target_file) && move_uploaded_file($pdftemp, $target_file_pdf)) {
            $query = 'INSERT INTO buku (Judul, Penulis, Penerbit, Id_kategori, Tahun_terbit, Cover_buku, file_buku, deskripsi) VALUE (?,?,?,?,?,?,?,?)';
            $insert = $koneksi->prepare($query);
            $insert->execute($data);

            echo '<script>alert("Berhasil Tambah Data");window.location="buku.php"</script>';
        }
    } else {
        echo '<script>alert("hanya dapat upload file PNG/JPEG/JPG dan PDF");window.location="insert_buku.php"</script>';
    }
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Insert Data Buku</h4>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul buku</label>
                    <input type="text" value="" class="form-control" name="judul" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" value="" class="form-control" name="penulis" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" value="" class="form-control" name="penerbit" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" style="height: 100px" required></textarea>
                </div>
                <div class="form-group">
                    <label>Cover buku</label>
                    <input class="form-control" type="file" id="cover" name="cover" required>
                </div>
                <div class="form-group">
                    <label>File buku</label>
                    <input class="form-control" type="file" id="pdf" name="pdf" required>
                </div>
                <div class="form-group">
                    <label>Tahun terbit</label>
                    <select class="form-control" name="tahun" id="" required>
                        <?php for ($i = 1990; $i <= 2025; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" id="" required>
                        <?php 
                        $query = $koneksi->prepare("SELECT * FROM kategori");
                        $query->execute();
                        $data = $query->fetchAll();
                        foreach ($data as $value) {
                        ?>
                        <option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?>
                        </option>
                        <?php }; ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-success" name="Insert"><i class="fa fa-plus"> </i>
                    Insert</button>
            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>