<?php
include "koneksi.php";
session_start();
if (isset($_POST['submit'])) {
    if ($_SESSION['cap'] == $_POST['captcha']) {
        $sukses = 0;
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);

        $data[] = $user;
        $data[] = $pass;
        $data[] = $user;
        $data[] = $pass;

        $query = 'SELECT * FROM user WHERE Email=? AND Password=? OR Username=? AND Password=?';
        $select = $koneksi->prepare($query);
        $select->execute($data);
        $ambil = $select->fetch();

        $count = $select->rowCount();

        $cookie_user;

        if ($count == 1) {

            $agent = $_SERVER['HTTP_USER_AGENT'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $sukses = 1;
            if ($sukses == 1) {
                $carry[] = $ambil['Username'];
                $carry[] = $ip;
                $carry[] = $agent;

                $query = 'INSERT INTO log_user (nama_user, Ip, Access_from) VALUE (?,?,?)';
                $insert = $koneksi->prepare($query);
                $insert->execute($carry);
                $sukses = 0;
            };
            $_SESSION['waktu'] = time();
            $_SESSION['username'] = $ambil['Username'];
            $_SESSION['id'] = $ambil['id_user'];
            $_SESSION['akses'] = $ambil['Hak_Akses'];
            setcookie("last_in", $user);
            setcookie("username", 'null', time() + 3600);
            if (isset($_POST['remember'])) {
                setcookie("username", $ambil['Username'], time() + 3600);
                setcookie("akses", $ambil['Hak_Akses'], time() + 3600);
            };
            header("location: index.php");
        } else {
            echo '<script>alert("Gagal Login");window.location="login.php"</script>';
        }
    } else {
        echo "<script type='text/javascript'>alert('captcha yang dimasukan salah');window.location='login.php'</script>";
    }
}