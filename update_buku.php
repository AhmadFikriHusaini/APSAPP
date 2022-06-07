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
    $id = $_POST['id'];
    $pdfname = $_FILES['pdf']['name'];
    $pdftemp = $_FILES['pdf']['tmp_name'];
    $pdftype = $_FILES['pdf']['type'];
    $pdfsize = $_FILES['pdf']['size'];
    $filename = $_FILES['cover']['name'];
    $filetemp = $_FILES['cover']['tmp_name'];
    $filetype = $_FILES['cover']['type'];
    $filesize = $_FILES['cover']['size'];

    if ($filename == "" && $pdfname == "") {

        $data[] = $title;
        $data[] = $writer;
        $data[] = $publisher;
        $data[] = $cat;
        $data[] = $release;
        $data[] = $desc;
        $data[] = $id;
        $query = 'UPDATE buku SET Judul=?, Penulis=?, Penerbit=?, Id_kategori=?, Tahun_terbit=?, deskripsi=? WHERE Id_buku =?';
        $update = $koneksi->prepare($query);
        $update->execute($data);
        echo '<script>alert("Berhasil Edit Data");window.location="buku.php"</script>';
        
    } else if ($filename != "" && $pdfname == "") {

        $target_dir = ('uploads/cover/');
        $removeExtension = explode('.', basename($filename));
        $rename = date("m-d-y") . "." . date("h-i-s") . "." .  $title . "." . end($removeExtension);
        $target_file = $target_dir . $rename;

        $cover = 'SELECT Cover_buku FROM buku WHERE Id_buku= ?';
        $proses = $koneksi->prepare($cover);
        $proses->execute(array($id));
        $lama = $proses->fetch();
        if ($filetype == 'image/png' || $filetype == 'image/jpg' || $filetype == 'image/jpeg') {
            $data[] = $title;
            $data[] = $writer;
            $data[] = $publisher;
            $data[] = $cat;
            $data[] = $release;
            $data[] = $rename;
            $data[] = $desc;
            $data[] = $id;
            if (move_uploaded_file($filetemp, $target_file)) {
                unlink('uploads/cover/' . $lama['Cover_buku']);
                $query = 'UPDATE buku SET Judul=?, Penulis=?, Penerbit=?, Id_kategori=?, Tahun_terbit=?, Cover_buku=?, deskripsi=? WHERE Id_buku=?';
                $update = $koneksi->prepare($query);
                $update->execute($data);

                echo '<script>alert("Berhasil edit buku");window.location="buku.php"</script>';
            }
        } else {
            echo '<script>alert("hanya dapat upload file PNG/JPEG/JPG");window.location="update_buku.php?id=' . $id . '"</script>';
        }
    } else if ($filename == "" && $pdfname != "") {
        $target_dir = ('uploads/book/');
        $removeExtension = explode('.', basename($pdfname));
        $rename = date("m-d-y") . "." . date("h-i-s") . "." .  $title . "." . end($removeExtension);
        $target_file = $target_dir . $rename;

        $file = 'SELECT file_buku FROM buku WHERE Id_buku= ?';
        $proses = $koneksi->prepare($file);
        $proses->execute(array($id));
        $lama = $proses->fetch();
        if ($pdftype == 'application/pdf') {
            $data[] = $title;
            $data[] = $writer;
            $data[] = $publisher;
            $data[] = $cat;
            $data[] = $release;
            $data[] = $rename;
            $data[] = $desc;
            $data[] = $id;
            if (move_uploaded_file($pdftemp, $target_file)) {
                unlink('uploads/book/' . $lama['file_buku']);
                $query = 'UPDATE buku SET Judul=?, Penulis=?, Penerbit=?, Id_kategori=?, Tahun_terbit=?, file_buku=?, deskripsi=? WHERE Id_buku=?';
                $update = $koneksi->prepare($query);
                $update->execute($data);

                echo '<script>alert("Berhasil edit buku");window.location="buku.php"</script>';
            }
        } else {
            echo '<script>alert("hanya dapat upload file PDF");window.location="update_buku.php?id=' . $id . '"</script>';
        }
    } else if ($filename != "" && $pdfname != "") {

        $target_dir_pdf = ('uploads/book/');
        $removeExtension_pdf = explode('.', basename($pdfname));
        $rename_pdf = date("m-d-y") . "." . date("h-i-s") . "." .  $title . "." . end($removeExtension_pdf);
        $target_file_pdf = $target_dir_pdf . $rename_pdf;
        $target_dir = ('uploads/cover/');
        $removeExtension = explode('.', basename($filename));
        $rename = date("m-d-y") . "." . date("h-i-s") . "." .  $title . "." . end($removeExtension);
        $target_file = $target_dir . $rename;

        $file = 'SELECT Cover_buku, file_buku FROM buku WHERE Id_buku= ?';
        $proses = $koneksi->prepare($file);
        $proses->execute(array($id));
        $lama = $proses->fetch();

        if (($filetype == 'image/png' || $filetype == 'image/jpg' || $filetype == 'image/jpeg') && ($pdftype == 'application/pdf')) {
            $data[] = $title;
            $data[] = $writer;
            $data[] = $publisher;
            $data[] = $cat;
            $data[] = $release;
            $data[] = $rename;
            $data[] = $rename_pdf;
            $data[] = $desc;
            $data[] = $id;
            if (move_uploaded_file($filetemp, $target_file) && move_uploaded_file($pdftemp, $target_file_pdf)) {
                unlink('uploads/book/'.$lama['file_buku']);
                unlink('uploads/cover/'.$lama['Cover_buku']);
                $query = 'UPDATE buku SET Judul=?, Penulis=?, Penerbit=?, Id_kategori=?, Tahun_terbit=?, Cover_buku=?, file_buku=?, deskripsi=? WHERE Id_buku=?';
                $insert = $koneksi->prepare($query);
                $insert->execute($data);
    
                echo '<script>alert("Berhasil Edit Data");window.location="buku.php"</script>';
            }
        } else {
            echo '<script>alert("hanya dapat upload file PNG/JPEG/JPG dan PDF");window.location="update_buku.php?id=' . $id . '"</script>';
        }

    }
}

$id = $_GET['id'];
$query = 'SELECT * FROM buku WHERE Id_buku =?';
$select = $koneksi->prepare($query);
$select->execute(array($id));
$value = $select->fetch();

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Data Buku</h4>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul buku</label>
                    <input type="text" value="<?php echo $value['Judul'] ?>" class="form-control" name="judul"
                        maxlength="50" required>
                </div>
                <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" value="<?php echo $value['Penulis'] ?>" class="form-control" name="penulis"
                        maxlength="50" required>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" value="<?php echo $value['Penerbit'] ?>" class="form-control" name="penerbit"
                        maxlength="50" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" style="height: 100px"
                        required><?php echo $value['deskripsi']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="mb-1">Cover Lama</label>
                    <br>
                    <?php if ($value['Cover_buku'] != "") { ?>
                    <img src="uploads/cover/<?php echo $value['Cover_buku']; ?>" width="200px" height="300px" alt=""
                        srcset="">
                    <?php } ?>
                    <br>
                    <label class="mt-2">Cover baru</label>
                    <input class="form-control" type="file" id="cover" name="cover">
                </div>
                <div class="form-group">
                    <label class="mt-2">File buku baru</label>
                    <input class="form-control" type="file" id="pdf" name="pdf">
                    <?php if ($value['file_buku'] != '') { ?>
                    <p><strong>File lama : </strong><?php echo $value['file_buku']; }; ?></p>
                </div>
                <div class=" form-group">
                    <label>Tahun terbit</label>
                    <select class="form-control" name="tahun" id="" required>
                        <?php for ($i = 1990; $i <= 2025; $i++) { ?>
                        <option value="<?php echo $i; ?>" <?php if ($value['Tahun_terbit'] == $i) {
                                                                    echo "selected";
                                                                } ?>>
                            <?php echo $i; ?></option>
                        <?php }; ?>
                    </select>
                </div>
                <div class=" form-group">
                    <label>Tahun terbit</label>
                    <select class="form-control" name="kategori" id="" required>
                        <?php
                        $q = $koneksi->prepare("SELECT * FROM kategori");
                        $q->execute();
                        $d = $q->fetchAll();
                        foreach ($d as $v) {
                        ?>
                        <option value="<?php echo $v['id_kategori']; ?>" <?php if ($value['Id_kategori'] == $v['id_kategori']) {
                                                                    echo "selected";
                                                                } ?>>
                            <?php echo $v['nama_kategori']; ?></option>
                        <?php }; ?>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $value['Id_buku']; ?>">
                <button type="submit" name="submit" class="btn btn-success" name="Insert"><i class="fa fa-plus"> </i>
                    Insert</button>
            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>