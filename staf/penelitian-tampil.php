<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../config.php';
$userid = $_SESSION['userid'];
$nosurat = mysqli_real_escape_string($conn, $_GET['nodata']);
global $userid;
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
                        <h1 class="h3 mb-0 text-gray-800">Formulir Pengajuan Surat Ijin Penelitian</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
														<!-- ambil data -->
                            <?php

                            $qsurat = mysqli_query($conn, "SELECT * FROM penelitian WHERE no='$nosurat'");
                            $dsurat = mysqli_fetch_array($qsurat);
                            $nama = $dsurat['nama'];
                            $nim = $dsurat['nim'];
                            $prodi = $dsurat['prodi'];
                            $jenjang = $dsurat['jenjang'];
                            $nohp = $dsurat['nohp'];
                            $email = $dsurat['email'];
                            $semester = $dsurat['semester'];
                            $tahunakademik = $dsurat['tahunakademik'];
                            $judulpenelitian = $dsurat['judulpenelitian'];
                            $tujuansurat = $dsurat['tujuansurat'];
                            $alamatsurat = $dsurat['alamatsurat'];
                            ?>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Isi Formulir</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="penelitian-setujui.php" method="POST">
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
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>No. HP Aktif</label>
                                                <input type="number" class="form-control form-control-user" name="nohp" id="nohp" value="<?= $nohp; ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>E-Mail</label>
                                                <input type="email" class="form-control form-control-user" name="email" id="email" value="<?= $email; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Semester</label>
																								<input type="number" class="form-control form-control-user" name="semester" id="semester" value="<?= $semester; ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
																								<label>Tahun Akademik</label>
																								<input type="number" class="form-control form-control-user" name="tahunakademik" id="tahunakademik" value="<?= $tahunakademik; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Skripsi / Penelitian</label>
                                            <input type="text" class="form-control form-control-user" name="judulpenelitian" id="judulpenelitian" value="<?= $judulpenelitian; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Tujuan Surat</label>
                                            <input type="text" class="form-control form-control-user" name="tujuansurat" id="tujuansurat" value="<?= $tujuansurat; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Tujuan</label>
                                            <textarea class="form-control form-control-user" name="alamatsurat" id="alamatsurat" rows="4" required><?= $alamatsurat; ?></textarea>
                                        </div>
                                        <br />
                                        <input type="hidden" name="jenissurat" value="Izin Observasi">
                                        <input type="hidden" name="nosurat" value="<?= $nosurat; ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <button type="submit" class="btn btn-success btn-user btn-block">
                                                    <i class="fas fa-thumbs-up"></i><b> SETUJUI</b>
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-danger btn-user btn-block" data-toggle="modal" data-target="#tolakModal">
                                                    <i class="fas fa-times-circle"></i><b> TOLAK</b>
                                                </a>
                                            </div>
                                        </div>
                                        <hr>
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
		
		<!-- Logout Modal-->
    <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan Surat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="penelitian-tolak.php" method="POST">
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