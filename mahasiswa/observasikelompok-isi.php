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
                        <h1 class="h3 mb-0 text-gray-800">Formulir Pengajuan Surat Izin Observasi Kelompok</h1>
                    </div>
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
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Keperluan Tugas Matakuliah / PKL / Magang</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="observasikelompok-simpan.php" method="POST">
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
                                            <select class="browser-default custom-select" name="keperluan" id="keperluan">
                                                <option value="Tugas Mata Kuliah" selected>Tugas Mata Kuliah</option>
                                                <option value="PKL">PKL</option>
                                                <option value="Magang">Magang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control form-control-user" name="namamk" id="namamk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kepada</label>
                                            <input type="text" class="form-control form-control-user" name="kepada" id="kepada" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control form-control-user" name="alamat" id="alamat" rows="4" required></textarea>
                                        </div>
                                        <label>Lama Observasi</label><small style="color:blue"> (maksimal 1 minggu) </style>
                                            <?php
                                            $tglmulai = date('Y-m-d');
                                            $tglselesai = date('Y-m-d', strtotime('+1 week', strtotime($tglmulai)));
                                            ?>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label>Tanggal Mulai Observasi</label>
                                                    <input type="date" class="form-control form-control-user" name="tglmulai" id="tglmulai" value="<?= $tglmulai; ?>" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Tanggal Selesai Observasi</label>
                                                    <input type="date" class="form-control form-control-user" name="tglselesai" id="tglselesai" value="<?= $tglselesai; ?>" required>
                                                </div>
                                            </div>
                                            <br />
                                            <hr>
                                            <input type="hidden" name="pengusul" id="pengusul" value="<?= $userid; ?>"></input>
                                            <input type="hidden" name="nohp" id="nohp" value="<?= $nohp; ?>"></input>
                                            <input type="hidden" name="email" id="email" value="<?= $email; ?>"></input>
                                            <button type="submit" onclick="return confirm('Dengan ini saya menyatakan bahwa data tersebut adalah benar')" class="btn btn-success btn-user btn-block"> <b>Masukkan Anggota </b><i class="fas fa-user"></i></button>
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