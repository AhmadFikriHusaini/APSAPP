<?php
include('koneksi.php');
$id = $_GET['id'];
$cover = 'SELECT Cover_buku, file_buku FROM buku WHERE Id_buku= ?';
$proses = $koneksi->prepare($cover);
$proses->execute(array($id));
$data = $proses->fetch();
$sql = "DELETE FROM buku WHERE Id_buku= ?";
$row = $koneksi->prepare($sql);
$row->execute(array($id));
unlink('uploads/book/' . $data['file_buku']);
unlink('uploads/cover/' . $data['Cover_buku']);
echo '<script>window.location="buku.php"</script>';