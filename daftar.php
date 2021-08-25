<!DOCTYPE html>
<html lang="en">
<?php
require 'config.php';
require 'assets/myfunc.php';
?>

<head>

    <meta charset="utf-8">
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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body">
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="p-5">
                    <div class="text-center">
                        <img src="img/kop.jpg" width="300px"></img>
                        <h1 class="h4 text-gray-900 mb-4">Daftar Akun Pengguna</h1>
                    </div>
                    <?php
                    if (isset($_GET['pesan'])) {
                        $pesan = $_GET['pesan'];
                        if ($pesan == 'passsalah') {
                    ?>
                            <div class="alert alert-danger alert-dismissible">
                                <strong>ERROR!</strong> Password tidak sama.
                            </div>
                        <?php
                        } elseif ($pesan == 'hitungsalah') {
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <strong>ERROR!</strong> hasil perhitungan salah.
                            </div>
                    <?php
                        }
                    };
                    ?>
                    <form class="user" action="daftar-simpan.php" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>NIM / NIP / NIDT</label>
                            <input type="number" class="form-control" name="nim" id="nim" placeholder="NIM / NIP / NIDT" required>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <label>Program Studi</label>
                            <select class="browser-default custom-select" name="prodi" id="prodi">
                                <?php
                                $qprodi = mysqli_query($conn, "SELECT DISTINCT namaprodi FROM prodi");
                                while ($dprodi = mysqli_fetch_array($qprodi)) {
                                    $prodi = $dprodi[0];
                                ?>
                                    <option value="<?= $prodi; ?>"><?= $prodi; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>No. HP Aktif</label>
                                <input type="number" class="form-control" name="nohp" id="nohp" placeholder="No. HP Aktif" required>
                            </div>
                            <div class="col-sm-6">
                                <label>E-Mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" class="form-control" name="userid" id="userid" placeholder="User ID untuk masuk ke sistem ini" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Ulangi Password</label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $angka1 = rand(1, 9);
                            $angka2 = rand(1, 9);
                            $kunci = $angka1 + $angka2;
                            ?>
                            <label>Berapakah hasil dari <b><?= huruf($angka1); ?> ditambah <?= huruf($angka2); ?></b> (angka) ?</label>
                            <input type="number" class="form-control" name="hasil" id="hasil" required>
                        </div>
                        <hr>
                        <input type="hidden" name="kunci" value="<?= $kunci; ?>">
                        <button type="submit" class="btn btn-primary btn-block"> <b>DAFTAR </b></button>
                    </form>
                    <hr>
                    <!--
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                    </div>
                    -->
                    <div class="text-center">
                        <a class="small" href="index.php">Login Disini</a>
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