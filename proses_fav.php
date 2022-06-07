<?php
include "koneksi.php";

$aksi = $_GET['aksi'];
$id_user = $_GET['id_user'];
$id_buku = $_GET['id_buku'];
$data[] = $id_user;
$data[] = $id_buku;
if ($aksi == "favorite") {
    $query = 'INSERT INTO favorite (Id_user, Id_buku) VALUE (?,?)';
            $insert = $koneksi->prepare($query);
            $insert->execute($data);
} else {
    $sql = "DELETE FROM favorite WHERE Id_user= ? AND Id_buku= ?";
    $row = $koneksi->prepare($sql);
    $row->execute($data);
}
?>