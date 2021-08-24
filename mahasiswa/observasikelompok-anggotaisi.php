<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid = $_SESSION['userid'];
$jenjang = $_SESSION['jenjang'];
$prodi = $_SESSION['prodi'];
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
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Isi Anggota Observasi</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="observasikelompok-anggotasimpan.php" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Nama</label>
                                                <input type="text" class="form-control form-control-user" name="nama" id="nama" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>NIM</label>
                                                <input type="number" class="form-control form-control-user" name="nim" id="nim" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="pengusul" id="pengusul" value="<?= $userid; ?>"></input>
                                        <button type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-user"></i> Tambahkan Anggota</button>
                                    </form>
                                    <br />

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="10%">No</th>
                                                    <th>Nama</th>
                                                    <th>NIM</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $qanggota = mysqli_query($conn, "SELECT * FROM observasikelompok_anggota WHERE pengusul='$userid'");
                                            while ($danggota = mysqli_fetch_array($qanggota)) {
                                                $nama = $danggota['nama'];
                                                $nim = $danggota['nim'];
                                            ?>
                                                <tbody>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $nama; ?></td>
                                                    <td><?= $nim; ?></td>
                                                    <td><a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data <?= $nama; ?> ?')" href="observasikelompok-anggotahapus.php?nodata=<?= $no; ?>&iduser=<?= $userid; ?>">
                                                            <i class="fas fa-ban"></i>
                                                        </a>
                                                    </td>
                                                </tbody>
                                            <?php
                                                $no++;
                                            };
                                            ?>
                                        </table>
                                    </div>
                                    <a href="dashboard.php" onclick="return confirm('Dengan ini saya menyatakan bahwa data tersebut adalah benar')" class="btn btn-success btn-user btn-block"><i class="fas fa-file-upload"></i> Ajukan Surat Izin</a>
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