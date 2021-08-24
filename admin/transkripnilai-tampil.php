<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid = $_SESSION['userid'];
global $userid;
$role = $_SESSION['role'];
if ($role != 'adminprodi') {
    if ($role != 'adminfakultas') {
        header("location:../deauth.php");
    }
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FITK UIN Malang</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require "../assets/sidebar.php";
        include "../assets/myfunc.php";
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
                        <h1 class="h3 mb-0 text-gray-800">Formulir Pengajuan Transkrip Nilai</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- ambil data -->
                            <?php
                            $nosurat = mysqli_real_escape_string($conn, $_GET['nodata']);
                            $qsurat = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE no='$nosurat'");
                            $dsurat = mysqli_fetch_array($qsurat);
                            $nama = $dsurat['nama'];
                            $nim = $dsurat['nim'];
                            $prodi = $dsurat['prodi'];
                            $nohp = $dsurat['nohp'];
                            $email = $dsurat['email'];
                            $jenjang = $dsurat['jenjang'];
                            $keperluan = $dsurat['keperluan'];
                            $website = urldecode($dsurat['website']);
                            $verifikasi = $dsurat['verifikasi'];
                            $keterangan = $dsurat['keterangan'];

                            ?>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Isian Formulir</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        $pesan = $_GET['pesan'];
                                        if (isset($pesan)) {
                                            if ($pesan == 'keterangan') {
                                    ?>
                                                <div class="alert alert-danger alert-dismissible">
                                                    <strong>ERROR!</strong> Keterangan penolakan belum di isi
                                                </div>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <form class="user" action="transkripnilai-setujui.php" method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= $nama; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="text" class="form-control form-control-user" name="nim" id="nim" value="<?= $userid; ?>" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Jurusan</label>
                                                <input type="text" class="form-control form-control-user" name="prodi" id="prodi" value="<?= $prodi; ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Jenjang</label>
                                                <input type="text" class="form-control form-control-user" name="jenjang" id="jenjang" value="<?= $jenjang; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Keperluan</label>
                                            <input type="text" class="form-control form-control-user" name="keperluan" id="keperluan" value="<?= $keperluan; ?>">
                                        </div>
                                        <?php
                                        if ($keperluan == 'pengajuan Beasiswa') {
                                        ?>
                                            <div class="form-group">
                                                <label>URL Website : </label>
                                                <a href="<?= $website; ?>" target="_blank"><?= $website; ?></a>
                                                <br />
                                                <small style="color:blue"><i>Klik URL Website diatas untuk mengakses website tersebut</i></small>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($verifikasi == 2) {
                                        ?>
                                            <div class="form-group">
                                                <label>Alasan Penolakan</label>
                                                <textarea class="form-control form-control-user" name="tolak" id="tolak" rows="4"><?= $keterangan; ?>
                                            </textarea>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <hr>
                                        <input type="hidden" name="nosurat" value="<?= $nosurat; ?>">
                                        <input type="hidden" name="nohp" value="<?= $nohp; ?>">
                                        <input type="hidden" name="email" value="<?= $email; ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-primary btn-user btn-block">
                                                    <i class="fas fa-thumbs-up"></i><b> SETUJUI</b>
                                                </button>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="#" class="btn btn-danger btn-user btn-block" data-toggle="modal" data-target="#tolakModal">
                                                    <i class="fas fa-times-circle"></i><b> TOLAK</b>
                                                </a>
                                            </div>
                                            <?php
                                            $nowa = hp($nohp);
                                            ?>
                                            <div class="col-sm-3">
                                                <a href="https://api.whatsapp.com/send?phone=<?= $nowa; ?>" class="btn btn-success btn-user btn-block">
                                                    <i class="fas fa-paper-plane"></i><b> Kirim WhatsAp</b>
                                                </a>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="mailto:<?= $email; ?>" class="btn btn-info btn-user btn-block">
                                                    <i class="fas fa-envelope"></i><b> Kirim eMail</b>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
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

    <!-- Tolak Modal-->
    <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan Surat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="transkripnilai-tolak.php" method="POST">
                    <div class="modal-body">
                        Tuliskan Alasan penolakan disini : <br />
                        <textarea class="form-control form-control-user" name="keterangan" id="keterangan" rows="4"></textarea>
                        <input type="hidden" name="nosurat" value="<?= $nosurat; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-angle-double-left"></i> Batal</button>
                        <button class="btn btn-danger" type="submit"> <i class="fas fa-times-circle"></i><b> TOLAK</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>