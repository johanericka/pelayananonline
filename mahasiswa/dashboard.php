<?php
session_start();
$userid = $_SESSION['userid'];
$nim = $_SESSION['nim'];
$role = $_SESSION['role'];
if ($role != 'mahasiswa') {
    header("location:../deauth.php");
}
global $userid;
require('../config.php');
require('../assets/myfunc.php');
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
                                    <h6 class="m-0 font-weight-bold text-primary">Surat Diajukan</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Izin Observasi -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%" class="text-center">No</th>
                                                    <th width="45%" class="text-center">Surat</th>
                                                    <th class="text-center">Status</th>
                                                    <th width="5%" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                ?>
                                                <!-- observasi individu -->
                                                <?php
                                                $qobservasi = mysqli_query($conn, "SELECT * FROM observasi WHERE nim='$nim'");
                                                while ($dobservasi = mysqli_fetch_array($qobservasi)) {
                                                    $nodata = $dobservasi['nodata'];
                                                    $verifikasi = $dobservasi['verifikasi'];
                                                    $keterangan = $dobservasi['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td>Izin Observasi</td>
                                                        <td><?php
                                                            if ($verifikasi == 0) {
                                                                echo "Menunggu verifikasi surat ";
                                                            } elseif ($verifikasi == 1) {
                                                                echo "Telah di setujui";
                                                            } else {
                                                                echo "Ditolak dengan alasan <b> " . $keterangan . "</b>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-primary btn-sm" href="observasiindividu-cetak.php?nodata=<?= $nodata; ?>" target="_blank">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($verifikasi == 2 or $verifikasi == 0) {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data Surat Izin Observasi ?')" href="observasiindividu-hapus.php?nodata=<?= $nodata; ?>&nim=<?= $nim; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                                <!-- /observasi individu -->

                                                <!-- penelitian -->
                                                <?php
                                                $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE nim='$nim'");
                                                while ($dpenelitian = mysqli_fetch_array($qpenelitian)) {
                                                    $nodata = $dpenelitian['nodata'];
                                                    $verifikasi = $dpenelitian['verifikasi'];
                                                    $verifikator = $dpenelitian['verifikator'];
                                                    $keterangan = $dpenelitian['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td>Izin Penelitian</td>
                                                        <td><?php
                                                            if ($verifikasi == 0) {
                                                                echo "Menunggu verifikasi surat";
                                                            } elseif ($verifikasi == 1) {
                                                                echo "Telah disetujui";
                                                            } else {
                                                                echo "Ditolak dengan alasan <b>" . $keterangan . "</b>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-primary btn-sm" href="penelitian-cetak.php?nodata=<?= $nodata; ?>" target="_blank">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($verifikasi == 2 or $verifikasi == 0) {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data Surat Izin Penelitian  ?')" href="penelitian-hapus.php?nodata=<?= $nodata; ?>&nim=<?= $nim; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                                <!-- /penelitian -->

                                                <!-- dispensasi -->
                                                <?php
                                                $qpenelitian = mysqli_query($conn, "SELECT * FROM dispensasi WHERE nim='$nim'");
                                                while ($dpenelitian = mysqli_fetch_array($qpenelitian)) {
                                                    $nodata = $dpenelitian['nodata'];
                                                    $verifikasi = $dpenelitian['verifikasi'];
                                                    $verifikator = $dpenelitian['verifikator'];
                                                    $keterangan = $dpenelitian['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td>Dispensasi Kegiatan</td>
                                                        <td><?php
                                                            if ($verifikasi == 0) {
                                                                echo "Menunggu verifikasi surat";
                                                            } elseif ($verifikasi == 1) {
                                                                echo "Telah disetujui";
                                                            } else {
                                                                echo "Ditolak dengan alasan <b>" . $keterangan . "</b>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-primary btn-sm" href="dispensasi-cetak.php?nodata=<?= $nodata; ?>" target="_blank">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($verifikasi == 2 or $verifikasi == 0) {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data Surat Dispensasi Kegiatan  ?')" href="dispensasi-hapus.php?nodata=<?= $nodata; ?>&nim=<?= $nim; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                                <!-- /dispensasi -->

                                                <!-- Surat Keterangan-->
                                                <?php
                                                $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE nim='$nim'");
                                                while ($dsuket = mysqli_fetch_array($qsuket)) {
                                                    $nodata = $dsuket['nodata'];
                                                    $verifikasi = $dsuket['verifikasi'];
                                                    $verifikator = $dsuket['verifikator'];
                                                    $keterangan = $dsuket['keterangan'];
                                                    $jenissurat = $dsuket['jenissurat'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td>Keterangan <?= $jenissurat; ?></td>
                                                        <td><?php
                                                            if ($verifikasi == 0) {
                                                                echo "Menunggu verifikasi surat";
                                                            } elseif ($verifikasi == 1) {
                                                                echo "Telah disetujui";
                                                            } else {
                                                                echo "Ditolak dengan alasan <b>" . $keterangan . "</b>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-primary btn-sm" href="suket-cetak.php?nodata=<?= $nodata; ?>" target="_blank">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            <?php
                                                            } elseif ($verifikasi == 2 or $verifikasi == 0) {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus Permohonan Surat Keterangan ?')" href="suket-hapus.php?nodata=<?= $nodata; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                                <!-- /Surat Keterangan-->

                                                <!-- Surat Rekomendasi-->
                                                <?php
                                                $qsuket = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE nim='$nim'");
                                                while ($dsuket = mysqli_fetch_array($qsuket)) {
                                                    $nodata = $dsuket['nodata'];
                                                    $verifikasi = $dsuket['verifikasi'];
                                                    $verifikator = $dsuket['verifikator'];
                                                    $keterangan = $dsuket['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td>Keterangan Rekomendasi</td>
                                                        <td><?php
                                                            if ($verifikasi == 0) {
                                                                echo "Menunggu verifikasi surat";
                                                            } elseif ($verifikasi == 1) {
                                                                echo "Telah disetujui";
                                                            } else {
                                                                echo "Ditolak dengan alasan <b>" . $keterangan . "</b>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-primary btn-sm" href="rekomendasi-cetak.php?nodata=<?= $nodata; ?>" target="_blank">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            <?php
                                                            } elseif ($verifikasi == 2 or $verifikasi == 0) {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus Permohonan Surat Rekomendasi ?')" href="rekomendasi-hapus.php?nodata=<?= $nodata; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                                <!-- /Surat Rekomendasi-->
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

</body>

</html>