<?php
require '../config.php';
session_start();
$role = $_SESSION['role'];
if ($role != 'adminfakultas') {
    header("location:../deauth.php");
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

<body class="bg-gradient-warning">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body">
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="p-5">
                    <div class="text-center">
                        <img src="../img/kop.jpg" width="300px"></img>
                        <h1 class="h4 text-gray-900 mb-4">Daftar Akun Pengguna</h1>
                    </div>
                    <?php
                    $nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
                    $quser = mysqli_query($conn, "SELECT * FROM pengguna WHERE no='$nodata'");
                    $duser = mysqli_fetch_array($quser);
                    $nama = $duser['nama'];
                    $nim = $duser['nim'];
                    $nohp = $duser['nohp'];
                    $email = $duser['email'];
                    $prodi = $duser['prodi'];
                    $username = $duser['user'];
                    $password = $duser['plaintext'];
                    $role = $duser['role'];
                    $status = $duser['status'];
                    ?>
                    <form class="user" action="user-update.php" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>NIM / NIP / NIDT</label>
                            <input type="number" class="form-control" name="nim" id="nim" value="<?= $nim; ?>" required>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <label>Program Studi</label>
                            <select class="browser-default custom-select" name="prodi" id="prodi">
                                <option value="<?= $prodi; ?>" selected><?= $prodi; ?></option>
                                <?php
                                $qprodi2 = mysqli_query($conn, "SELECT DISTINCT namaprodi FROM prodi");
                                while ($dprodi2 = mysqli_fetch_array($qprodi2)) {
                                    $prodi2 = $dprodi2[0];
                                ?>
                                    <option value="<?= $prodi2; ?>"><?= $prodi2; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>No. HP Aktif</label>
                                <input type="number" class="form-control " name="nohp" id="nohp" value="<?= $nohp; ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label>E-Mail</label>
                                <input type="email" class="form-control " name="email" id="email" value="<?= $email; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" class="form-control " name="userid" id="userid" value="<?= $username; ?>" required>
                            <?php

                            if (isset($_GET['pesan']) == 'passsalah') {
                            ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <strong>ERROR!</strong> Password tidak sama.
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Password</label>
                                <input type="password" class="form-control " name="password" id="password" value="<?= $password; ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Ulangi Password</label>
                                <input type="password" class="form-control " name="password2" id="password2" value="<?= $password; ?>" required>
                            </div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <label>Hak Akses</label>
                            <select class="browser-default custom-select" name="role" id="role">
                                <?php
                                if ($role == 'adminprodi') {
                                ?>
                                    <option value="dosen">Dosen</option>
                                    <option value="adminprodi" selected>Admin Program Studi</option>
                                    <option value="adminfakultas">Admin Fakultas</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                <?php
                                } elseif ($role == 'adminfakultas') {
                                ?>
                                    <option value="dosen">Dosen</option>
                                    <option value="adminprodi">Admin Program Studi</option>
                                    <option value="adminfakultas">Admin Fakultas</option>
                                    <option value="mahasiswa" selected>Mahasiswa</option>
                                <?php
                                } elseif ($role == 'dosen') {
                                ?>
                                    <option value="dosen" selected>Dosen</option>
                                    <option value="adminprodi">Admin Program Studi</option>
                                    <option value="adminfakultas">Admin Fakultas</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                <?php
                                } else {
                                ?>
                                    <option value="adminfakultas">Admin Fakultas</option>
                                    <option value="mahasiswa" selected>Mahasiswa</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <label>Status User</label>
                            <select class="browser-default custom-select" name="status" id="status">
                                <?php
                                if ($status == 0) {
                                ?>
                                    <option value="0" selected>Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                <?php
                                } else {
                                ?>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1" selected>Aktif</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="nodata" value="<?= $nodata; ?>" />
                        <hr>
                        <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-primary btn-block"> <b>Update Data </b></button>
                        <hr>
                    </form>
                    <a href="dashboard.php"> <b>Kembali </b></a>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>