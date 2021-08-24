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

                        <!-- Total Surat Diajukan -->
                        <?php
                        if ($role == 'adminfakultas') {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratdiajukan = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid'");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE verifikator='$userid'");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE verifikator='$userid'");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi WHERE verifikator='$userid'");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey WHERE verifikator='$userid'");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid'");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid'");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratdiajukan = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Surat Diajukan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalsuratdiajukan; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Surat Menunggu Persetujuan -->
                        <?php
                        if ($role == 'adminfakultas') {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikasi=0");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE verifikasi=0");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE verifikasi=0");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi WHERE verifikasi=0");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey WHERE verifikasi=0");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikasi=0");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikasi=0");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratmenunggu = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid' AND verifikasi=0");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE verifikator='$userid' AND verifikasi=0");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE verifikator='$userid' AND verifikasi=0");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi WHERE verifikator='$userid' AND verifikasi=0");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey WHERE verifikator='$userid' AND verifikasi=0");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid' AND verifikasi=0");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid' AND verifikasi=0");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratmenunggu = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Menunggu Persetujuan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalsuratmenunggu; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Surat Disetujui -->
                        <?php
                        if ($role == 'adminfakultas') {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikasi=1");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE verifikasi=1");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE verifikasi=1");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi WHERE verifikasi=1");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey WHERE verifikasi=1");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikasi=1");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikasi=1");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratdisetujui = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid' AND verifikasi=1");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE verifikator='$userid' AND verifikasi=1");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE verifikator='$userid' AND verifikasi=1");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi WHERE verifikator='$userid' AND verifikasi=1");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey WHERE verifikator='$userid' AND verifikasi=1");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid' AND verifikasi=1");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid' AND verifikasi=1");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratdisetujui = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Disetujui
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $totalsuratdisetujui; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-mail-bulk fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Surat Ditolak -->
                        <?php
                        if ($role == 'adminfakultas') {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikasi=2");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE verifikasi=2");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE verifikasi=2");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi WHERE verifikasi=2");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey WHERE verifikasi=2");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikasi=2");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikasi=2");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratditolak = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid' AND verifikasi=2");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qobservasikelompok = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE verifikator='$userid' AND verifikasi=2");
                            $jobservasikelompok = mysqli_num_rows($qobservasikelompok);
                            $qpenelitiandinas = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE verifikator='$userid' AND verifikasi=2");
                            $jpenelitiandinas = mysqli_num_rows($qpenelitiandinas);
                            $qpenelitianinstansi = mysqli_query($conn, "SELECT * FROM penelitianinstansi WHERE verifikator='$userid' AND verifikasi=2");
                            $jpenelitianinstansi = mysqli_num_rows($qpenelitianinstansi);
                            $qpenelitiansurvey = mysqli_query($conn, "SELECT * FROM penelitiansurvey WHERE verifikator='$userid' AND verifikasi=2");
                            $jpenelitiansurvey = mysqli_num_rows($qpenelitiansurvey);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid' AND verifikasi=2");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid' AND verifikasi=2");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $totalsuratditolak = $jobservasiindividu + $jobservasikelompok + $jpenelitiandinas + $jpenelitianinstansi + $jpenelitiansurvey + $jtranskripnilai + $jvalidasi;
                        }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Surat Ditolak</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalsuratditolak; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Surat</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="30%">Program Studi</th>
                                                    <th width="30%">Surat</th>
                                                    <th>Nama</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- observasi individu -->
                                                <?php
                                                $no = 1;
                                                if ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM observasi WHERE verifikator='$userid' ORDER BY verifikasi";
                                                } else {
                                                    $query = "SELECT * FROM observasi ORDER BY verifikasi";
                                                };

                                                $qobservasi = mysqli_query($conn, $query);
                                                while ($dobservasi = mysqli_fetch_array($qobservasi)) {
                                                    $nodata = $dobservasi['no'];
                                                    $nama = $dobservasi['nama'];
                                                    $prodi = $dobservasi['prodi'];
                                                    $surat = 'Observasi Individu';
                                                    $tglpengajuan = $dobservasi['tglpengajuan'];
                                                    $verifikasi = $dobservasi['verifikasi'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $surat; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($verifikasi == 0) {
                                                                        ?>
                                                                <a class="btn btn-warning btn-sm" href="observasiindividu-tampil.php?nodata=<?= $nodata; ?>">Menunggu Validasi</a>
                                                            <?php
                                                                        } elseif ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="../mahasiswa/observasiindividu-cetak.php?nodata=<?= $nodata; ?>"><i class="fas fa-print"></i></a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" href="observasiindividu-tampil.php?nodata=<?= $nodata; ?>">Ditolak</a>
                                                            <?php
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- observasi kelompok -->
                                                <?php
                                                if ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM observasikelompok WHERE verifikator='$userid' ORDER BY verifikasi";
                                                } else {
                                                    $query = "SELECT * FROM observasikelompok ORDER BY verifikasi";
                                                };
                                                $qobservasikelompok = mysqli_query($conn, $query);
                                                while ($dobservasikelompok = mysqli_fetch_array($qobservasikelompok)) {
                                                    $nodata = $dobservasikelompok['no'];
                                                    $nama = $dobservasikelompok['nama'];
                                                    $prodi = $dobservasikelompok['prodi'];
                                                    $surat = 'Observasi Kelompok';
                                                    $tglpengajuan = $dobservasikelompok['tglpengajuan'];
                                                    $verifikasi = $dobservasikelompok['verifikasi'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $surat; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($verifikasi == 0) {
                                                                        ?>
                                                                <a class="btn btn-warning btn-sm" href="observasikelompok-tampil.php?nodata=<?= $nodata; ?>">Menunggu Validasi</a>
                                                            <?php
                                                                        } elseif ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="../mahasiswa/observasikelompok-cetak.php?nodata=<?= $nodata; ?>"><i class="fas fa-print"></i></a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" href="observasikelompok-tampil.php?nodata=<?= $nodata; ?>">Ditolak</a>
                                                            <?php
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- penelitian dinas -->
                                                <?php
                                                if ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM penelitiandinas WHERE verifikator='$userid' ORDER BY verifikasi";
                                                } else {
                                                    $query = "SELECT * FROM penelitiandinas ORDER BY verifikasi";
                                                }
                                                $qpenelitiandinas = mysqli_query($conn, $query);
                                                while ($dpenelitiandinas = mysqli_fetch_array($qpenelitiandinas)) {
                                                    $nodata = $dpenelitiandinas['no'];
                                                    $nama = $dpenelitiandinas['nama'];
                                                    $prodi = $dpenelitiandinas['prodi'];
                                                    $surat = 'Penelitian Dinas';
                                                    $tglpengajuan = $dpenelitiandinas['tglpengajuan'];
                                                    $verifikasi = $dpenelitiandinas['verifikasi'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $surat; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($verifikasi == 0) {
                                                                        ?>
                                                                <a class="btn btn-warning btn-sm" href="penelitiandinas-tampil.php?nodata=<?= $nodata; ?>">Menunggu Validasi</a>
                                                            <?php
                                                                        } elseif ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="../mahasiswa/penelitiandinas-cetak.php?nodata=<?= $nodata; ?>"><i class="fas fa-print"></i></a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" href="penelitiandinas-tampil.php?nodata=<?= $nodata; ?>">Ditolak</a>
                                                            <?php
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- penelitian instansi -->
                                                <?php
                                                if ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM penelitianinstansi WHERE verifikator='$userid' ORDER BY verifikasi";
                                                } else {
                                                    $query = "SELECT * FROM penelitianinstansi ORDER BY verifikasi";
                                                }

                                                $qpenelitianinstansi = mysqli_query($conn, $query);
                                                while ($dpenelitianinstansi = mysqli_fetch_array($qpenelitianinstansi)) {
                                                    $nodata = $dpenelitianinstansi['no'];
                                                    $nama = $dpenelitianinstansi['nama'];
                                                    $prodi = $dpenelitianinstansi['prodi'];
                                                    $surat = 'Penelitian Instansi';
                                                    $tglpengajuan = $dpenelitianinstansi['tglpengajuan'];
                                                    $verifikasi = $dpenelitianinstansi['verifikasi'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $surat; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($verifikasi == 0) {
                                                                        ?>
                                                                <a class="btn btn-warning btn-sm" href="penelitianinstansi-tampil.php?nodata=<?= $nodata; ?>">Menunggu Validasi</a>
                                                            <?php
                                                                        } elseif ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="../mahasiswa/penelitianinstansi-cetak.php?nodata=<?= $nodata; ?>"><i class="fas fa-print"></i></a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" href="penelitianinstansi-tampil.php?nodata=<?= $nodata; ?>">Ditolak</a>
                                                            <?php
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- penelitian survey -->
                                                <?php
                                                if ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM penelitiansurvey WHERE verifikator='$userid' ORDER BY verifikasi";
                                                } else {
                                                    $query = "SELECT * FROM penelitiansurvey ORDER BY verifikasi";
                                                }
                                                $qpenelitiansurvey = mysqli_query($conn, $query);
                                                while ($dpenelitiansurvey = mysqli_fetch_array($qpenelitiansurvey)) {
                                                    $nodata = $dpenelitiansurvey['no'];
                                                    $nama = $dpenelitiansurvey['nama'];
                                                    $prodi = $dpenelitiansurvey['prodi'];
                                                    $surat = 'Penelitian Survey';
                                                    $tglpengajuan = $dpenelitiansurvey['tglpengajuan'];
                                                    $verifikasi = $dpenelitiansurvey['verifikasi'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $surat; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($verifikasi == 0) {
                                                                        ?>
                                                                <a class="btn btn-warning btn-sm" href="penelitiansurvey-tampil.php?nodata=<?= $nodata; ?>">Menunggu Validasi</a>
                                                            <?php
                                                                        } elseif ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="../mahasiswa/penelitiansurvey-cetak.php?nodata=<?= $nodata; ?>"><i class="fas fa-print"></i></a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" href="penelitiansurvey-tampil.php?nodata=<?= $nodata; ?>">Ditolak</a>
                                                            <?php
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- transkrip nilai -->
                                                <?php
                                                if ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM transkripnilai WHERE verifikator='$userid' ORDER BY verifikasi";
                                                } else {
                                                    $query = "SELECT * FROM transkripnilai ORDER BY verifikasi";
                                                }
                                                $qtranskripnilai = mysqli_query($conn, $query);
                                                while ($dtranskripnilai = mysqli_fetch_array($qtranskripnilai)) {
                                                    $nodata = $dtranskripnilai['no'];
                                                    $nama = $dtranskripnilai['nama'];
                                                    $prodi = $dtranskripnilai['prodi'];
                                                    $surat = 'Transkrip Nilai Sementara';
                                                    $tglpengajuan = $dtranskripnilai['tglpengajuan'];
                                                    $verifikasi = $dtranskripnilai['verifikasi'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $surat; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($verifikasi == 0) {
                                                                        ?>
                                                                <a class="btn btn-warning btn-sm" href="transkripnilai-tampil.php?nodata=<?= $nodata; ?>">Menunggu Validasi</a>
                                                            <?php
                                                                        } elseif ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="../mahasiswa/transkripnilai-cetak.php?nodata=<?= $nodata; ?>"><i class="fas fa-print"></i></a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" href="transkripnilai-tampil.php?nodata=<?= $nodata; ?>">Ditolak</a>
                                                            <?php
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- validasi -->
                                                <?php
                                                if ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM validasi WHERE verifikator='$userid' ORDER BY verifikasi";
                                                } else {
                                                    $query = "SELECT * FROM validasi ORDER BY verifikasi";
                                                }
                                                $qvalidasi = mysqli_query($conn, $query);
                                                while ($dvalidasi = mysqli_fetch_array($qvalidasi)) {
                                                    $nodata = $dvalidasi['no'];
                                                    $nama = $dvalidasi['nama'];
                                                    $prodi = $dvalidasi['prodi'];
                                                    $surat = 'Permohonan Validasi';
                                                    $tglpengajuan = $dvalidasi['tglpengajuan'];
                                                    $verifikasi = $dvalidasi['verifikasi'];
                                                ?>
                                                    <tr>
                                                        <td width="5%"><?= $no; ?></td>
                                                        <td width="25%"><?= $prodi; ?></td>
                                                        <td width="20%"><?= $surat; ?></td>
                                                        <td width="20%"><?= $nama; ?></td>
                                                        <td width="15%"><?php
                                                                        if ($verifikasi == 0) {
                                                                        ?>
                                                                <a class="btn btn-warning btn-sm" href="validator-tampil.php?nodata=<?= $nodata; ?>">Menunggu Validasi</a>
                                                            <?php
                                                                        } elseif ($verifikasi == 1) {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="../mahasiswa/validator-cetak.php?nodata=<?= $nodata; ?>"><i class="fas fa-print"></i></a>
                                                            <?php
                                                                        } else {
                                                            ?>
                                                                <a class="btn btn-danger btn-sm" href="validator-tampil.php?nodata=<?= $nodata; ?>">Ditolak</a>
                                                            <?php
                                                                        }
                                                            ?>
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