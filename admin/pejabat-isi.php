<!DOCTYPE html>
<html lang="en">
<?php
require('../config.php');
session_start();
$userid = $_SESSION['userid'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$prodi = $_SESSION['prodi'];
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
                        <h1 class="h3 mb-0 text-gray-800">Pejabat Fakultas</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Set Pejabat Fakultas</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="pejabat-simpan.php" method="POST">
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="browser-default custom-select" name="jabatan" id="jabatan">
                                                <option value="Dekan" selected>Dekan</option>
                                                <option value="Wakil Dekan Akademik">Wakil Dekan Bidang Akademik</option>
                                                <option value="Wakil Dekan AUPK">Wakil Dekan Bidang AUPK</option>
                                                <option value="Wakil Dekan Kemahasiswaan & Kerja Sama">Wakil Dekan Bidang Kemahasiswaan & Kerja Sama</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pejabat (beserta gelar)</label>
                                            <input type="text" class="form-control form-user" name="pejabat" id="pejabat" required>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="number" class="form-control form-user" name="nip" id="nip" required>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-success btn-user btn-block"> <i class="fas fa-save"></i><b> Simpan Perubahan Data</b></button>
                                        <hr>
                                    </form>
                                    <br />
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pejabat Fakultas</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No.</th>
                                                    <th width="25%">Jabatan</th>
                                                    <th width="25%">Pejabat</th>
                                                    <th>NIP</th>
                                                    <th>Tanda Tangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $qpejabat = mysqli_query($conn, "SELECT * FROM pejabat ORDER BY jabatan");
                                                while ($dpejabat = mysqli_fetch_array($qpejabat)) {
                                                    $nodata = $dpejabat['no'];
                                                    $jabatan = $dpejabat['jabatan'];
                                                    $nama = $dpejabat['nama'];
                                                    $nip = $dpejabat['nip'];
                                                    $ttd = $dpejabat['ttd'];
                                                ?>

                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $jabatan; ?></td>
                                                        <td><?= $nama; ?></td>
                                                        <td><?= $nip; ?></td>
                                                        <td><?php
                                                            if (empty($ttd)) {
                                                            ?>
                                                                <div class="form-group">
                                                                    <label>Upload File Tanda Tangan</label>
                                                                    <input type="file" class="form-control form-user" name="ttd" id="ttd">
                                                                    <input type="submit" class="btn btn-primary btn-user btn-block btn-sm" name="submit" value="Upload" />
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <img src="<?= $ttd; ?>" width="200px"></img>
                                                            <?php
                                                            };
                                                            ?>

                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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