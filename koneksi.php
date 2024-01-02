<?php
$user = "admin";
$pass = "admin";
try {
    $koneksi = new PDO('mysql:host=db;dbname=openbook', $user, $pass);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    die("koneksi gagal" . $th->getMessage());
};