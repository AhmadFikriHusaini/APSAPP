<?php
include "koneksi.php";
setcookie("forgot", null, time() - 3600);
if (isset($_POST['submit'])) {
    $query = 'SELECT Email FROM user WHERE Email= :email';
    $select = $koneksi->prepare($query);
    $select->bindParam(':email', $_POST['email']);
    $select->execute();
    $count = $select->rowCount();

    if ($count == 1) {
        setcookie("forgot", $_POST['email'], time() + 3600);
        header("location: reset-password.php");
    } else {
        echo '<script>alert("email yang anda masukan belum terdaftar!");window.location="forgot-password.php"</script>';
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AHMAD FIKRI HUSAINI</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary py-5">

    <div class="container my-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Lupa Password?</h1>
                                <p class="mb-4">Kami mengerti!, pastikan email yang anda masukan benar untuk
                                    membantu kami menkonfirmasi bahwa ini benar-benar anda!</p>
                            </div>
                            <form class="user" action="" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id=""
                                        placeholder="Masukan Email Address...">
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">Reset
                                    Password</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Sudah Punya Akun?, Log In!</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>