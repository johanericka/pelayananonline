<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid = $_SESSION['userid'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$prodi = $_SESSION['prodi'];
$jenjang = $_SESSION['jenjang'];
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
                        <h1 class="h3 mb-0 text-gray-800">Formulir Pengajuan PKL</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- cari data user -->
                            <?php
                            $quser = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$userid'");
                            $duser = mysqli_fetch_array($quser);
                            $nama = $duser['nama'];
                            $nim = $duser['nim'];
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
                                    <h6 class="m-0 font-weight-bold text-primary">Isi Formulir</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="daftar-simpan.php" method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= $nama; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="text" class="form-control form-control-user" name="nim" id="nim" value="<?= $userid; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <input type="text" class="form-control form-control-user" name="prodi" id="prodi" value="<?= $prodi . ' - ' . $jenjang; ?>" readonly>
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
                                        <div class="form-group">
                                            <label>Nama Instansi Tujuan</label>
                                            <input type="text" class="form-control form-control-user" name="tujuansurat" id="tujuansurat" placeholder="Nama Instansi Tujuan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Tujuan</label>
                                            <textarea class="form-control form-control-user" name="alamatsurat" id="alamatsurat" rows="4" required>
                                            </textarea>
                                        </div>
                                        <label>Tempat PKL</label>
                                        <div class="form-group">
                                            <label>Nama Instansi</label>
                                            <input type="text" class="form-control form-control-user" name="namainstansi" id="namainstansi" placeholder="Nama Tempat Observasi" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control form-control-user" name="alamatinstansi" id="alamatinstansi" rows="4" required>
                                            </textarea>
                                        </div>
                                        <label>Lama PKL</label>
                                        <?php
                                        $tglmulai = date('Y-m-d');
                                        $tglselesai = date('Y-m-d', strtotime('+3 month', strtotime($tglmulai)));
                                        ?>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Tanggal Mulai PKL</label>
                                                <input type="date" class="form-control form-control-user" name="observasimulai" id="observasimulai" value="<?= $tglmulai; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Tanggal Selesai PKL</label>
                                                <input type="date" class="form-control form-control-user" name="observasiselesai" id="observasiselesai" value="<?= $tglselesai; ?>" required>
                                            </div>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-success btn-user btn-block"> <i class="fas fa-file-upload"></i><b> Ajukan Surat</b></button>
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