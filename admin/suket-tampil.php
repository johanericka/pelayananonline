<?php
session_start();
require('../config.php');
$userid = $_SESSION['userid'];
global $userid;
$role = $_SESSION['role'];
if ($role = 'mahasiswa') {
    //header("location:../deauth.php");
}
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
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
                        <h1 class="h3 mb-0 text-gray-800">Formulir Pengajuan Surat Keterangan</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- cari data user -->
                            <?php
                            $quser = mysqli_query($conn, "SELECT * FROM suket WHERE nodata='$nodata'");
                            $duser = mysqli_fetch_array($quser);
                            $nim = $duser['nim'];
                            $nama = $duser['nama'];
                            $notelepon = $duser['notelepon'];
                            $email = $duser['email'];
                            $prodi = $duser['prodi'];
                            $jenissurat = $duser['jenissurat'];
                            $keperluan = $duser['keperluan'];
                            ?>

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        $pesan = $_GET['pesan'];
                                        if (isset($pesan)) {
                                            if ($pesan == 'beasiswa') {
                                    ?>
                                                <div class="alert alert-danger alert-dismissible">
                                                    <strong>ERROR!</strong> URL Website beasiswa harus di isi.
                                                </div>
                                    <?php
                                            }
                                        }
                                    };
                                    ?>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>NIM</label>
                                        <input type="text" class="form-control" name="nim" value="<?= $nim; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Program Studi</label>
                                        <input type="text" class="form-control" name="prodi" value="<?= $prodi; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" class="form-control" name="notelepon" value="<?= $notelepon; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="<?= $email; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Surat Keterangan</label>
                                        <input type="text" class="form-control" name="jenissurat" value="<?= $jenissurat; ?>" readonly>
                                    </div>
                                    <form class="user" action="suket-setujui.php" method="POST">
                                        <div class="form-group">
                                            <?php
                                            $ukt = substr($jenissurat, strlen($jenissurat) - 3, 3);
                                            if ($ukt == 'UKT') {
                                            ?>
                                                <label>Alasan</label>
                                                <input type="text" class="form-control" name="keperluan" value="<?= $keperluan; ?>" readonly>
                                            <?php
                                            } else {
                                            ?>
                                                <label>Keperluan</label>;
                                                <input type="text" class="form-control" name="keperluan" value="<?= $keperluan; ?>" readonly>
                                                <?php
                                                if ($jenissurat == 'Lulus') {
                                                ?>
                                                    <div class="form-group">
                                                        <label>Tgl. Lulus</label>
                                                        <input type="date" class="form-control" name="tgllulus" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No. SK Yudisium</label>
                                                        <input type="text" class="form-control" name="skyudisium">
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <hr>
                                        <input type="hidden" name="nodata" value="<?= $nodata; ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <button type="submit" onclick="return confirm('Apakah anda MENYETUJUI pengajuan ini ?')" class="btn btn-primary btn-block">
                                                    <i class="fas fa-thumbs-up"></i><b> SETUJUI</b>
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#tolakModal">
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
                <form action="suket-tolak.php" method="POST">
                    <div class="modal-body">
                        Tuliskan Alasan penolakan disini : <br />
                        <textarea class="form-control form-control-user" name="keterangan" id="keterangan" rows="4"></textarea>
                        <input type="hidden" name="nodata" value="<?= $nodata; ?>">
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