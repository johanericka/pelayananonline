<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../config.php';
include '../assets/myfunc.php';

$userid = $_SESSION['userid'];
$nosurat = mysqli_real_escape_string($conn, $_GET['nodata']);
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
                            <!-- ambil data -->
                            <?php

                            $qsurat = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE no='$nosurat'");
                            $dsurat = mysqli_fetch_array($qsurat);
                            $pengusul = $dsurat['pengusul'];
                            $nama = $dsurat['nama'];
                            $keperluan = $dsurat['keperluan'];
                            $matakuliah = $dsurat['matakuliah'];
                            $prodi = $dsurat['prodi'];
                            $nohp = $dsurat['nohp'];
                            $email = $dsurat['email'];
                            $jenjang = $dsurat['jenjang'];
                            $kepada = $dsurat['kepada'];
                            $alamat = $dsurat['alamat'];
                            $tglmulai = $dsurat['tglmulai'];
                            $tglselesai = $dsurat['tglselesai'];
                            $verifikasi = $dsurat['verifikasi'];
                            $keterangan = $dsurat['keterangan'];
                            ?>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Isi Formulir</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="observasikelompok-setujui.php">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Nama</label>
                                                <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= $nama; ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>NIM</label>
                                                <input type="text" class="form-control form-control-user" name="pengusul" id="pengusul" value="<?= $pengusul; ?>" readonly>
                                            </div>
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
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Keperluan</label>
                                                <select class="browser-default custom-select" name="keperluan" id="keperluan">
                                                    <?php
                                                    if ($keperluan == 'PKL') {
                                                    ?>
                                                        <option value="Tugas Mata Kuliah">Tugas Mata Kuliah</option>
                                                        <option value="PKL" selected>PKL</option>
                                                        <option value="Magang">Magang</option>
                                                    <?php
                                                    } elseif ($keperluan == "Magang") {
                                                    ?>
                                                        <option value="Tugas Mata Kuliah">Tugas Mata Kuliah</option>
                                                        <option value="PKL">PKL</option>
                                                        <option value="Magang" selected>Magang</option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="Tugas Mata Kuliah" selected>Tugas Mata Kuliah</option>
                                                        <option value="PKL">PKL</option>
                                                        <option value="Magang">Magang</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Judul</label>
                                                <input type="text" class="form-control form-control-user" name="matakuliah" id="matakuliah" value="<?= $matakuliah; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tujuan Surat</label>
                                            <input type="text" class="form-control form-control-user" name="kepada" id="kepada" value="<?= $kepada; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control form-control-user" name="alamat" id="alamat" rows="4"><?= $alamat; ?></textarea>
                                        </div>
                                        <h5>Anggota</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center" width="5%">No</th>
                                                        <th style="text-align:center">Nama</th>
                                                        <th style="text-align:center">NIM</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                $no = 1;

                                                $qanggota = mysqli_query($conn, "SELECT * FROM observasikelompok_anggota WHERE pengusul='$pengusul'");
                                                while ($danggota = mysqli_fetch_array($qanggota)) {
                                                    $namaanggota = $danggota['nama'];
                                                    $nimanggota = $danggota['nim'];
                                                ?>
                                                    <tbody>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $namaanggota; ?></td>
                                                        <td><?= $nimanggota; ?></td>
                                                    </tbody>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Tanggal Mulai Observasi</label>
                                                <input type="date" class="form-control form-control-user" name="tglmulai" id="tglmulai" value="<?= $tglmulai; ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Tanggal Selesai Observasi</label>
                                                <input type="date" class="form-control form-control-user" name="tglselesai" id="tglselesai" value="<?= $tglselesai; ?>">
                                            </div>
                                        </div>
                                        <?php
                                        if ($verifikasi == 2) {
                                        ?>
                                            <div class="form-group">
                                                <label>Alasan Penolakan</label>
                                                <textarea class="form-control form-control-user" name="tolak" id="tolak" rows="4" readonly><?= $keterangan; ?></textarea>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <hr />
                                        <input type="hidden" name="jenissurat" value="Izin Observasi">
                                        <input type="hidden" name="nosurat" value="<?= $nosurat; ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-primary btn-user btn-block">
                                                    <i class="fas fa-thumbs-up"></i><b> SETUJUI</b>
                                                </button>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="#" class="btn btn-danger btn-user btn-block" data-toggle="modal" data-target="#tolakModal">
                                                    <i class="fas fa-times-circle"></i><b> TOLAK</b>
                                                </a>
                                            </div>
                                            <?php
                                            $nowa = hp($nohp);
                                            ?>
                                            <div class="col-sm-3">
                                                <a href="https://api.whatsapp.com/send?phone=<?= $nowa; ?>" class="btn btn-success btn-user btn-block">
                                                    <i class="fas fa-paper-plane"></i><b> Kirim WhatsAp</b>
                                                </a>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="mailto:<?= $email; ?>" class="btn btn-info btn-user btn-block">
                                                    <i class="fas fa-envelope"></i><b> Kirim eMail</b>
                                                </a>
                                            </div>
                                        </div>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan Surat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="observasikelompok-tolak.php" method="POST">
                    <div class="modal-body">
                        Tuliskan Alasan penolakan disini : <br />
                        <textarea class="form-control form-control-user" name="keterangan" id="keterangan" rows="4"></textarea>
                        <input type="hidden" name="nosurat" value="<?= $nosurat; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-angle-double-left"></i> Batal</button>
                        <button class="btn btn-danger" type="submit"> <i class="fas fa-times-circle"></i><b> TOLAK</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>