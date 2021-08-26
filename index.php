<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php
    require 'assets/myfunc.php';
    ?>
</head>

<body class="bg-gradient-warning">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block"></div>
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="img/kop.jpg" width="300px"></img>
                                    <h1 class="h4 text-gray-900 mb-4">Pelayanan Online</h1>
                                </div>
                                <?php
                                if (isset($_GET['pesan'])) {
                                    $pesan = $_GET['pesan'];
                                    if (isset($pesan)) {
                                        if ($pesan == 'gagal') {
                                ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <strong>ERROR!</strong> User ID / Password salah.
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'notactive') {
                                        ?>
                                            <div class="alert alert-warning alert-dismissible">
                                                <strong>ERROR!</strong> Akun belum aktif. <br />
                                                Tunggu Admin mengaktifkan akun anda.
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'success') {
                                        ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <strong>BERHASIL!!</strong> Pendaftaran Akun berhasil.<br />
                                                Tunggu Admin untuk mengaktifkan akun anda
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'exist') {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <strong>ERROR!!</strong> Pengguna telah terdaftar<br />
                                                Klik <a href="forgot-password.html"> Lupa Password </a> apabila anda lupa password anda
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'hitungsalah') {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <strong>ERROR!</strong> hasil perhitungan salah.
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'noaccess') {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <strong>ERROR!</strong> Anda tidak berhak mengakses halaman ini!!
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'emailsukses') {
                                        ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <strong>BERHASIL!!</strong> Silahkan cek email anda.
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'emailgagal') {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <strong>GAGAL!!</strong> NIM / eMail tidak ditemukan / salah!!
                                            </div>
                                        <?php
                                        } elseif ($pesan == 'updatepassok') {
                                        ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <strong>Perubahan Password berhasil</strong> <br />
                                                Silahkan login dengan password baru anda
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                <form class="user" method="POST" action="auth.php">
                                    <div class="form-group">
                                        <label>User ID</label>
                                        <input type="text" class="form-control" name="userid" id="userid" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $angka1 = rand(1, 5);
                                        $angka2 = rand(1, 5);
                                        $kunci = $angka1 + $angka2;
                                        ?>
                                        <label>Berapakah <b><u><?= huruf($angka1); ?> ditambah <?= huruf($angka2); ?></u></b> (angka) ?</label>
                                        <input type="number" class="form-control" name="hasil" id="hasil" required>
                                    </div>
                                    <hr />
                                    <input type="hidden" name="kunci" value="<?= $kunci; ?>">
                                    <button type="submit" class="btn btn-primary btn-block"> <b>MASUK</b></button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="daftar.php">
                                        <h5><b>DAFTAR PENGGUNA BARU KLIK DISINI</b></h5>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="password-lupa.php">Lupa Password?</a>
                                </div>
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