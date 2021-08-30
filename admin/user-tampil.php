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

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Program Studi</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>No. HP</th>
                                                    <th width="5%">Status</th>
                                                    <th width="5%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $quser = mysqli_query($conn, "SELECT * FROM pengguna ORDER BY status, prodi, nama");
                                                while ($duser = mysqli_fetch_array($quser)) {
                                                    $nodata = $duser['no'];
                                                    $prodi = $duser['prodi'];
                                                    $nama = $duser['nama'];
                                                    $email = $duser['email'];
                                                    $nohp = $duser['nohp'];
                                                    $role = $duser['role'];
                                                    $status = $duser['status'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="20%"><?= $email; ?></td>
                                                        <td width="10%"><?= $nohp; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($status == 1) {
                                                                        ?>
                                                                <a class="btn btn-success btn-sm" onclick="return confirm('Edit data <?php echo $nama ?> ?')" href="user-edit.php?nodata=<?= $nodata; ?>">Aktif</a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-warning btn-sm" onclick="return confirm('Edit data <?php echo $nama ?> ?')" href="user-edit.php?nodata=<?= $nodata; ?>">Non-Aktif</a>
                                                            <?php
                                                                        }
                                                            ?>
                                                        </td>
                                                        <td width="5%">
                                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data <?php echo $nama ?> ?')" href="user-hapus.php?nodata=<?= $nodata; ?>">
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
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>