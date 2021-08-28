<?php
session_start();
$userid = $_SESSION['userid'];
$prodi = $_SESSION['prodi'];
global $userid;
$role = $_SESSION['role'];
if ($role != 'adminprodi') {
    if ($role != 'adminfakultas') {
        header("location:../deauth.php");
    }
}
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

                        <!-- Total Surat Diajukan -->
                        <?php
                        if ($role == 'adminfakultas') {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket");
                            $jsuket = mysqli_num_rows($qsuket);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratdiajukan = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jsuket + $jrekomendasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid'");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE verifikator='$userid'");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid'");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid'");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE verifikator='$userid'");
                            $jsuket = mysqli_num_rows($qsuket);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE verifikator='$userid'");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratdiajukan = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jsuket + $jrekomendasi;
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
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE verifikasi=0");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikasi=0");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikasi=0");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE verifikasi=0");
                            $jsuket = mysqli_num_rows($qsuket);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE verifikasi=0");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratmenunggu = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jsuket + $jrekomendasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid' AND verifikasi=0");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE verifikator='$userid' AND verifikasi=0");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid' AND verifikasi=0");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid' AND verifikasi=0");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE verifikator='$userid' AND verifikasi=0");
                            $jsuket = mysqli_num_rows($qvalidasi);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE verifikator='$userid' AND verifikasi=0");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratmenunggu = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jrekomendasi;
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
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE verifikasi=1");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikasi=1");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikasi=1");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE verifikasi=1");
                            $jsuket = mysqli_num_rows($qsuket);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE verifikasi=1");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratdisetujui = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jsuket + $jrekomendasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid' AND verifikasi=1");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE verifikator='$userid' AND verifikasi=1");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid' AND verifikasi=1");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid' AND verifikasi=1");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE verifikator='$userid' AND verifikasi=1");
                            $jsuket = mysqli_num_rows($qsuket);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE verifikator='$userid' AND verifikasi=1");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratdisetujui = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jsuket + $jrekomendasi;
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
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE verifikasi=2");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikasi=2");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikasi=2");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE verifikasi=2");
                            $jsuket = mysqli_num_rows($qsuket);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE verifikasi=2");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratditolak = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jsuket + $jrekomendasi;
                        } else {
                            $qobservasiindividu = mysqli_query($conn, "SELECT * FROM observasi WHERE verifikator='$userid' AND verifikasi=2");
                            $jobservasiindividu = mysqli_num_rows($qobservasiindividu);
                            $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE verifikator='$userid' AND verifikasi=2");
                            $jpenelitian = mysqli_num_rows($qpenelitian);
                            $qtranskripnilai = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE verifikator='$userid' AND verifikasi=2");
                            $jtranskripnilai = mysqli_num_rows($qtranskripnilai);
                            $qvalidasi = mysqli_query($conn, "SELECT * FROM validasi WHERE verifikator='$userid' AND verifikasi=2");
                            $jvalidasi = mysqli_num_rows($qvalidasi);
                            $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE verifikator='$userid' AND verifikasi=2");
                            $jsuket = mysqli_num_rows($qsuket);
                            $qrekomendasi = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE verifikator='$userid' AND verifikasi=2");
                            $jrekomendasi = mysqli_num_rows($qrekomendasi);
                            $totalsuratditolak = $jobservasiindividu + $jpenelitian + $jtranskripnilai + $jvalidasi + $jsuket + $jrekomendasi;
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
                                    <h6 class="m-0 font-weight-bold text-primary">Surat Menunggu Persetujuan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Program Studi</th>
                                                    <th>Nama</th>
                                                    <th>Surat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                ?>

                                                <!-- Izin Observasi -->
                                                <?php
                                                if ($role == 'adminfakultas') {
                                                    $query = "SELECT * FROM observasi WHERE verifikasi=0 ORDER BY prodi";
                                                } elseif ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM observasi WHERE verifikator = '$userid' AND verifikasi=0 ORDER BY prodi";
                                                }
                                                $qobservasi = mysqli_query($conn, $query);
                                                while ($dobservasi = mysqli_fetch_array($qobservasi)) {
                                                    $nodata = $dobservasi['nodata'];
                                                    $prodi = $dobservasi['prodi'];
                                                    $nama = $dobservasi['nama'];
                                                    $nim = $dobservasi['nim'];
                                                    $keterangan = $dobservasi['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $prodi; ?></td>
                                                        <td><?= $nama; ?></td>

                                                        <td>Surat Izin Observasi</td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="observasiindividu-tampil.php?nodata=<?= $nodata; ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- Izin Penelitian-->
                                                <?php
                                                if ($role == 'adminfakultas') {
                                                    $query = "SELECT * FROM penelitian WHERE verifikasi=0 ORDER BY prodi";
                                                } elseif ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM penelitian WHERE verifikator = '$userid' AND verifikasi=0 ORDER BY prodi";
                                                }
                                                $qpenelitian = mysqli_query($conn, $query);
                                                while ($dpenelitian = mysqli_fetch_array($qpenelitian)) {
                                                    $nodata = $dpenelitian['nodata'];
                                                    $prodi = $dpenelitian['prodi'];
                                                    $nama = $dpenelitian['nama'];
                                                    $nim = $dpenelitian['nim'];
                                                    $keterangan = $dpenelitian['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $prodi; ?></td>
                                                        <td><?= $nama; ?></td>

                                                        <td>Surat Izin Penelitian</td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="penelitian-tampil.php?nodata=<?= $nodata; ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- Validator-->
                                                <?php
                                                if ($role == 'adminfakultas') {
                                                    $query = "SELECT * FROM validasi WHERE verifikasi=0 ORDER BY prodi";
                                                } elseif ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM validasi WHERE verifikator = '$userid' AND verifikasi=0 ORDER BY prodi";
                                                }
                                                $qpenelitian = mysqli_query($conn, $query);
                                                while ($dpenelitian = mysqli_fetch_array($qpenelitian)) {
                                                    $nodata = $dpenelitian['no'];
                                                    $prodi = $dpenelitian['prodi'];
                                                    $nama = $dpenelitian['nama'];
                                                    $nim = $dpenelitian['nim'];
                                                    $keterangan = $dpenelitian['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $prodi; ?></td>
                                                        <td><?= $nama; ?></td>

                                                        <td>Permohonan Validator</td>
                                                        <td>
                                                            <a class="btn btn-success btn-sm" href="validator-tampil.php?nodata=<?= $nodata; ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- Transkrip Nilai-->
                                                <?php
                                                if ($role == 'adminfakultas') {
                                                    $query = "SELECT * FROM transkripnilai WHERE verifikasi=0 ORDER BY prodi";
                                                } elseif ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM transkripnilai WHERE verifikator = '$userid' AND verifikasi=0 ORDER BY prodi";
                                                }
                                                $qpenelitian = mysqli_query($conn, $query);
                                                while ($dpenelitian = mysqli_fetch_array($qpenelitian)) {
                                                    $nodata = $dpenelitian['no'];
                                                    $prodi = $dpenelitian['prodi'];
                                                    $nama = $dpenelitian['nama'];
                                                    $nim = $dpenelitian['nim'];
                                                    $keterangan = $dpenelitian['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $prodi; ?></td>
                                                        <td><?= $nama; ?></td>

                                                        <td>Permohonan Transkrip Nilai Sementara</td>
                                                        <td>
                                                            <a class="btn btn-success btn-sm" href="transkripnilai-tampil.php?nodata=<?= $nodata; ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- Surat Keterangan-->
                                                <?php
                                                if ($role == 'adminfakultas') {
                                                    $query = "SELECT * FROM suket WHERE verifikasi=0 ORDER BY prodi";
                                                } elseif ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM suket WHERE verifikator = '$userid' AND verifikasi=0 ORDER BY prodi";
                                                }
                                                $qsuket = mysqli_query($conn, $query);
                                                while ($dsuket = mysqli_fetch_array($qsuket)) {
                                                    $nodata = $dsuket['nodata'];
                                                    $prodi = $dsuket['prodi'];
                                                    $nama = $dsuket['nama'];
                                                    $nim = $dsuket['nim'];
                                                    $keterangan = $dsuket['keterangan'];
                                                    $jenissurat = $dsuket['jenissurat'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $prodi; ?></td>
                                                        <td><?= $nama; ?></td>

                                                        <td>Surat Keterangan <?= $jenissurat; ?></td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="suket-tampil.php?nodata=<?= $nodata; ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $no++;
                                                }
                                                ?>

                                                <!-- Surat Rekomendasi-->
                                                <?php
                                                if ($role == 'adminfakultas') {
                                                    $query = "SELECT * FROM rekomendasi WHERE verifikasi=0 ORDER BY prodi";
                                                } elseif ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM rekomendasi WHERE verifikator = '$userid' AND verifikasi=0 ORDER BY prodi";
                                                }
                                                $qsuket = mysqli_query($conn, $query);
                                                while ($dsuket = mysqli_fetch_array($qsuket)) {
                                                    $nodata = $dsuket['nodata'];
                                                    $prodi = $dsuket['prodi'];
                                                    $nama = $dsuket['nama'];
                                                    $nim = $dsuket['nim'];
                                                    $keterangan = $dsuket['keterangan'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $prodi; ?></td>
                                                        <td><?= $nama; ?></td>

                                                        <td>Surat Keterangan Rekomendasi</td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="rekomendasi-tampil.php?nodata=<?= $nodata; ?>">
                                                                <i class="far fa-eye"></i>
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


                    <!-- pengguna menunggu verifikasi -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengguna Menunggu Verifikasi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIM / NIP / NIDT</th>
                                                    <th>Program Studi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                ?>

                                                <!-- Pengguna menunggu verifikasi -->
                                                <?php
                                                if ($role == 'adminfakultas') {
                                                    $query = "SELECT * FROM pengguna WHERE status=0 ORDER BY nama";
                                                } elseif ($role == 'adminprodi') {
                                                    $query = "SELECT * FROM pengguna WHERE prodi='$prodi' AND status=0 ORDER BY nama";
                                                }
                                                $qpengguna = mysqli_query($conn, $query);
                                                while ($dpengguna = mysqli_fetch_array($qpengguna)) {
                                                    $nodata = $dpengguna['no'];
                                                    $nama = $dpengguna['nama'];
                                                    $nim = $dpengguna['nim'];
                                                    $prodi = $dpengguna['prodi'];

                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $nama; ?></td>
                                                        <td><?= $prodi; ?></td>
                                                        <td><?php
                                                            if ($role == 'adminfakultas') {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="user-edit.php?nodata=<?= $nodata; ?>">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            <?php
                                                            } elseif ($role == 'adminprodi') {
                                                            ?>
                                                                <a class="btn btn-success btn-sm" href="user-edit2.php?nodata=<?= $nodata; ?>">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
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

</body>

</html>