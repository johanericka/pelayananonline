<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid = $_SESSION['userid'];
global $userid;
$role = $_SESSION['role'];
if ($role != 'dosen') {
    header("location:../deauth.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Surat Tugas</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- cari data user -->
                            <?php
                            $quser = mysqli_query($conn, "SELECT * FROM pengguna WHERE user='$userid'");
                            $duser = mysqli_fetch_array($quser);
                            $nim = $duser['nim'];
                            $nama = $duser['nama'];
                            date_default_timezone_set("Asia/Jakarta");
                            ?>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Formulir Pengajuan Surat Tugas</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="penelitiandinas-simpan.php" method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= $nama; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control form-control-user" name="nim" id="nim" value="<?= $nim; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control form-control-user" name="jabatan" id="jabatan" value="Dosen" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Pangkat / Gol. Ruang</label>
                                            <select class="browser-default custom-select" name="pangkat" id="pangkat">
                                                <option value="Asisten Ahli - III/a">Asisten Ahli - III/a</option>
                                                <option value="Asisten Ahli - III/b" selected>Asisten Ahli - III/b</option>
                                                <option value="Lektor - III/c">Lektor - III/c</option>
                                                <option value="Lektor - III/d">Lektor - III/d</option>
                                                <option value="Lektor Kepala - IV/a">Lektor Kepala - IV/a</option>
                                                <option value="Lektor Kepala - IV/b">Lektor Kepala - IV/b</option>
                                                <option value="Lektor Kepala - IV/c">Lektor Kepala - IV/c</option>
                                                <option value="Guru Besar - IV/d">Guru Besar - IV/d</option>
                                                <option value="Guru Besar - IV/e">Guru Besar - IV/e</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tugas dalam rangka untuk</label>
                                            <textarea class="form-control form-control-user" name="tugas" id="tugas" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Tugas</label>
                                            <input type="text" class="form-control form-control-user" name="tempat" id="tempat" required>
                                        </div>
                                        <label>Pelaksanaan Tugas</label>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Tanggal Mulai </label>
                                                <input type="date" class="form-control form-control-user" name="penelitianmulai" id="tglmulai" value="<?= date('Y-m-d'); ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Tanggal Selesai </label>
                                                <input type="date" class="form-control form-control-user" name="penelitianselesai" id="tglselesai" value="<?= date('Y-m-d'); ?>" required>
                                            </div>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-success btn-user btn-block"> <i class="fas fa-file-upload"></i><b> Upload Lampiran</b></button>
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

</body>

</html>