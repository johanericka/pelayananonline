<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid = $_SESSION['userid'];

global $userid;
$role = $_SESSION['role'];
if ($role != 'mahasiswa') {
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
                        <h1 class="h3 mb-0 text-gray-800">Formulir Pengajuan Surat Validator</h1>
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
                            $prodi = $duser['prodi'];
                            $nohp = $duser['nohp'];
                            $email = $duser['email'];

                            //cari jenjang
                            $qjenjang = mysqli_query($conn, "SELECT DISTINCT(jenjang) FROM prodi WHERE namaprodi='$prodi'");
                            $djenjang = mysqli_fetch_array($qjenjang);
                            $jenjang = $djenjang['jenjang'];

                            ?>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Keperluan Uji Instrumen Skripsi / Tesis / Desertasi</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="validator-simpan.php" method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= $nama; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="text" class="form-control form-control-user" name="nim" id="nim" value="<?= $nim; ?>" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Program Studi</label>
                                                <input type="text" class="form-control form-control-user" name="prodi" id="prodi" value="<?= $prodi; ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Jenjang</label>
                                                <input type="text" class="form-control form-control-user" name="jenjang" id="jenjang" value="<?= $jenjang; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Keperluan Validasi</label>
                                            <input type="text" class="form-control form-control-user" name="validasi" id="validasi" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul </label>
                                            <input type="text" class="form-control form-control-user" name="judul" id="judul" required>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            if ($jenjang == 'S1') {
                                            ?>
                                                <label>Dosen Pembimbing</label>
                                                <input type="text" class="form-control form-control-user" name="dosen1" id="dosen1" required>
                                            <?php
                                            } else {
                                            ?>
                                                <label>Dosen Pembimbing 1</label>
                                                <input type="text" class="form-control form-control-user" name="dosen1" id="dosen1" required>
                                                <label>Dosen Pembimbing 2</label>
                                                <input type="text" class="form-control form-control-user" name="dosen2" id="dosen2" required>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Validator</label>
                                            <input type="text" class="form-control form-control-user" name="validator" id="validator" required>
                                        </div>
                                        <hr>
                                        <br />
                                        <?php
                                        if ($jenjang == 'S1') {
                                        ?>
                                            <input type="hidden" class="form-control form-control-user" name="keperluan" id="keperluan" value="Skripsi" readonly>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($jenjang == 'S2') {
                                        ?>
                                            <input type="hidden" class="form-control form-control-user" name="keperluan" id="keperluan" value="Tesis" readonly>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($jenjang == 'S3') {
                                        ?>
                                            <input type="hidden" class="form-control form-control-user" name="keperluan" id="keperluan" value="Desertasi" readonly>
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" class="form-control form-control-user" name="nohp" id="nohp" value="<?= $nohp; ?>" readonly>
                                        <input type="hidden" class="form-control form-control-user" name="email" id="email" value="<?= $email; ?>" readonly>
                                        <button type="submit" onclick="return confirm('Dengan ini saya menyatakan bahwa data tersebut adalah benar')" class="btn btn-success btn-user btn-block"> <i class="fas fa-file-upload"></i><b> Ajukan Surat</b></button>
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