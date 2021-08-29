<?php
session_start();
require('../config.php');

$userid = $_SESSION['userid'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$prodi = $_SESSION['prodi'];
global $userid;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pelayanan Online</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require "../assets/sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require "../assets/topbar.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Konfigurasi Email Notifikasi</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Set Email Notifikasi</h6>
                                </div>
                                <?php
                                $qemail = mysqli_query($conn, "SELECT * FROM email");
                                $demail = mysqli_fetch_array($qemail);
                                $host = $demail['host'];
                                $username = $demail['username'];
                                $password = $demail['password'];
                                $smtpsecure = $demail['smtpsecure'];
                                $port = $demail['port'];
                                $from = $demail['from'];
                                $fromname = $demail['fromname'];
                                ?>
                                <div class="card-body">
                                    <form class="user" action="email-update.php" method="POST">
                                        <div class="form-group">
                                            <label>Host</label>
                                            <input type="text" class="form-control" name="host" value="<?= $host; ?>" placeholder="alamat mail server menggunakan protokol tls/ssl" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" value="<?= $username; ?>" placeholder="username email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="username" value="<?= $password; ?>" placeholder="password email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>SMTP Secure</label>
                                            <input type="text" class="form-control" name="username" value="<?= $smtpsecure; ?>" placeholder="ssl/tls" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Port</label>
                                            <input type="number" class="form-control" name="port" value="<?= $port; ?>" placeholder="995/587" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Pengirim (untuk reply)</label>
                                            <input type="text" class="form-control" name="from" value="<?= $from; ?>" placeholder="email yang dituju untuk membalas" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pengirim</label>
                                            <input type="text" class="form-control" name="fromname" value="<?= $fromname; ?>" placeholder="nama pengirim email" required>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-save"></i><b> Simpan Perubahan Data</b></button>
                                        <hr>
                                    </form>
                                    <br />
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi Tambahan</h6>
                                </div>
                                <div class="card-body">
                                    Apabila menggunakan GMail (termasuk email UIN Malang) pastikan mengaktifkan <i>less secure app</i> melalui langkah - langkah berikut ini : <br />
                                    1. Login ke akun gmail anda melalui web-browser (gunakan komputer)<br />
                                    2. Klik link ini <a href="https://myaccount.google.com/lesssecureapps" target="_blank">https://myaccount.google.com/lesssecureapps</a><br />
                                    3. Aktifkan akses ke less secure app (aplikasi ini)<br />
                                    <br />
                                    Informasi tentang protokol yang didukung oleh GMail dapat dilihat <a href="https://developers.google.com/gmail/imap/imap-smtp" target="_blank">disini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require "../assets/footer.php";
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>