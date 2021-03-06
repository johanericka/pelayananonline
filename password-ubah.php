<?php
session_start();
require('config.php');
require('assets/myfunc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pelayanan Online</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-warning">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <img src="img/kop.jpg" width="300px"></img>
                                <h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                            </div>
                            <?php
                            if (isset($_GET['pesan'])) {
                                $pesan = $_GET['pesan'];
                                $token = $_GET['token'];
                                if (isset($pesan)) {
                                    if ($pesan == 'pass') {
                            ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <strong>ERROR!</strong> kedua Password tidak sama.
                                        </div>
                                    <?php
                                    } elseif ($pesan == 'kunci') {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <strong>ERROR!</strong> perhitungan salah
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <form class="user" action="password-update.php" method="POST">
                                <label>Password Baru</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password1" required>
                                </div>
                                <label>Ulangi Password Baru</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password2" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                    $angka1 = rand(1, 5);
                                    $angka2 = rand(1, 5);
                                    $kunci = $angka1 + $angka2;
                                    ?>
                                    <label>Berapakah <b><u><?= huruf($angka1); ?> + <?= huruf($angka2); ?></u></b> (angka) ?</label>
                                    <input type="number" class="form-control" name="hasil" required>
                                    <input type="hidden" name="kunci" value="<?= $kunci; ?>">
                                </div>
                                <input type="hidden" name="token" value="<?= $token; ?>">
                                <button type="submit" class="btn btn-primary btn-block" value="RESET">UBAH PASSWORD</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="daftar.php">Daftar Akun baru</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Sudah mendaftar ? Login disini!</a>
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