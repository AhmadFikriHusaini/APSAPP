<?php
include "koneksi.php";
session_start();
if (isset($_SESSION['waktu'])) {
    header('location: index.php');
}
$rand1 = rand(1, 9);
$rand2 = rand(1, 9);
$operator = array('*', '+');
$randoperator = $operator[rand(0, 1)];
switch ($randoperator) {
    case "+":
        $math = $rand1 + $rand2;
        $_SESSION['cap'] = $math;
        break;
    case "*":
        $math = $rand1 * $rand2;
        $_SESSION['cap'] = $math;
        break;
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

    <title>Open Book</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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

                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                            </div>
                            <form class="user" method="post" action="proses.php">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id=""
                                        value="<?php
                                                                                                                    if (!empty($_COOKIE['last_in'])) {
                                                                                                                        echo $_COOKIE['last_in'];
                                                                                                                    } ?>" placeholder="masukan username atau email!" name="user"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id=""
                                        placeholder="Password" name="pass" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text mr-2"
                                            id=""><?php echo $rand1 . " " . $randoperator . " " . $rand2; ?></span>
                                        <input type="number" name="captcha" class="form-control form-control-user"
                                            placeholder="captcha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck"
                                            name="remember">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit"
                                    name="submit">Login</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Lupa Password?</a>
                            </div>
                            <!-- <div class="text-center">
                                        <a class="small" href="register.html">Belum Punya Akun?, Sign Up!</a>
                                    </div> -->
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