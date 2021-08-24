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
                        <h1 class="h3 mb-0 text-gray-800">Verifikator Surat</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Set Verifikator Surat</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="surat-simpan.php" method="POST">
                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <select class="browser-default custom-select" name="prodi" id="prodi">
                                                <?php
                                                $qprodi = mysqli_query($conn, "SELECT DISTINCT (namaprodi) FROM prodi ORDER BY namaprodi DESC");
                                                while ($dprodi = mysqli_fetch_array($qprodi)) {
                                                    $noprodi = $dprodi['no'];
                                                    $namaprodi = $dprodi['namaprodi'];
                                                ?>
                                                    <option value="<?= $namaprodi; ?>"><?= $namaprodi; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Surat</label>
                                            <select class="browser-default custom-select" name="namasurat" id="namasurat">
                                                <?php
                                                $qnamasurat = mysqli_query($conn, "SELECT * FROM jenissurat ORDER BY namasurat");
                                                while ($datasurat = mysqli_fetch_array($qnamasurat)) {
                                                    $no = $datasurat['no'];
                                                    $namasurat = $datasurat['namasurat'];
                                                ?>
                                                    <option value="<?= $namasurat; ?>"><?= $namasurat; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Verifikator</label>
                                            <select class="browser-default custom-select" name="verifikator" id="verifikator">
                                                <?php
                                                $qstaff = mysqli_query($conn, "SELECT * FROM staff ORDER BY nama");
                                                while ($datastaff = mysqli_fetch_array($qstaff)) {
                                                    $username = $datastaff['username'];
                                                    $nama = $datastaff['nama'];
                                                ?>
                                                    <option value="<?= $username; ?>"><?= $nama; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-success btn-user btn-block"> <i class="fas fa-save"></i><b> SIMPAN</b></button>
                                        <hr>
                                    </form>
                                    <br />

                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Jenis Surat</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Program Studi</th>
                                                            <th>Nama Surat</th>
                                                            <th>Verifikator</th>
                                                            <th>Hapus</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Program Studi</th>
                                                            <th>Nama Surat</th>
                                                            <th>Verifikator</th>
                                                            <th>Hapus</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $qverifikasi = mysqli_query($conn, "SELECT * FROM verifikasi ORDER BY prodi, namasurat");
                                                        while ($dataverifikasi = mysqli_fetch_array($qverifikasi)) {
                                                            $nodata = $dataverifikasi['no'];
                                                            $prodi = $dataverifikasi['prodi'];
                                                            $namasurat = $dataverifikasi['namasurat'];
                                                            $verifikator = $dataverifikasi['verifikator'];
                                                        ?>

                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?= $prodi; ?></td>
                                                                <td><?= $namasurat; ?></td>
                                                                <td><?= $verifikator; ?></td>
                                                                <td><a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus <?php echo $namasurat ?> ?')" href="surat-hapus.php?nodata=<?php echo $nodata; ?>">
                                                                        <i class="fas fa-ban"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $no++;
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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