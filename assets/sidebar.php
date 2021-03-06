<?php

require('../config.php');
$role = $_SESSION['role'];
?>
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
            <!--<i class="fas fa-solar-panel"></i>-->
            <img src="../img/uinlogo.png" width="50px"></img>
        </div>
        <div class="sidebar-brand-text mx-3">Fakultas Humaniora</div>

    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Menu Admin -->
    <?php
    if ($role == 'adminprodi') {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-fw fa-envelope-open"></i>
                <span>Surat</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Surat</h6>
                    <a class="collapse-item" href="daftarsurat-tampil.php">Daftar Surat</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>


    <!-- Menu Admin -->
    <?php
    if ($role == 'adminfakultas') {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>System Admin.</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">System Admin Menu</h6>
                    <a class="collapse-item" href="pejabat-isi.php">Pejabat Fakultas</a>
                    <a class="collapse-item" href="prodi-isi.php">Program Studi</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-fw fa-envelope-open"></i>
                <span>Surat</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Surat</h6>
                    <a class="collapse-item" href="daftarsurat-tampil.php">Daftar Surat</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-fw fa-users"></i>
                <span>Pengguna</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Pengguna</h6>
                    <a class="collapse-item" href="user-tampil.php">Aktivasi Pengguna</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>


    <!-- Menu Mahasiswa -->
    <?php
    if ($role == 'mahasiswa') {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Pengajuan Surat</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengajuan Surat Mahasiswa</h6>
                    <?php
                    $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE nim='$userid' AND statussurat=0");
                    $jsuket = mysqli_num_rows($qsuket);
                    if ($jsuket == 0) {
                    ?>
                        <a class="collapse-item" href="suket-isi.php">Surat Keterangan</a>
                    <?php
                    };
                    ?>
                    <?php
                    $qkegiatan = mysqli_query($conn, "SELECT * FROM dispensasi WHERE nim='$userid' AND statussurat=0");
                    $jkegiatan = mysqli_num_rows($qkegiatan);
                    if ($jsuket == 0) {
                    ?>
                        <a class="collapse-item" href="dispensasi-isi.php">Dispensasi Kegiatan</a>
                    <?php
                    };
                    ?>
                    <?php
                    $qsuket = mysqli_query($conn, "SELECT * FROM suket WHERE nim='$userid' AND statussurat=0");
                    $jsuket = mysqli_num_rows($qsuket);
                    if ($jsuket == 0) {
                    ?>
                        <a class="collapse-item" href="ukt-isi.php">Dispensasi UKT</a>
                    <?php
                    };
                    ?>
                    <?php
                    $qsuket = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE nim='$userid' AND statussurat=0");
                    $jsuket = mysqli_num_rows($qsuket);
                    if ($jsuket == 0) {
                    ?>
                        <a class="collapse-item" href="rekomendasi-isi.php">Surat Rekomendasi</a>
                    <?php
                    };
                    ?>
                    <?php
                    $qobservasi = mysqli_query($conn, "SELECT * FROM observasi WHERE nim='$userid' AND verifikasi=0");
                    $jobservasi = mysqli_num_rows($qobservasi);
                    if ($jobservasi == 0) {
                    ?>
                        <a class="collapse-item" href="observasiindividu-isi.php">Izin Observasi</a>
                    <?php
                    };
                    ?>
                    <?php
                    $qpenelitian = mysqli_query($conn, "SELECT * FROM penelitian WHERE nim='$userid' AND verifikasi=0");
                    $jpenelitian = mysqli_num_rows($qpenelitian);
                    if ($jpenelitian == 0) {
                    ?>
                        <a class="collapse-item" href="penelitian-isi.php">Izin Penelitian</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </li>
    <?php
    }
    ?>

    <!-- Menu Dosen -->
    <?php
    if ($role == 'dosen') {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Pengajuan Surat</span>
            </a>
            <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengajuan Surat Dosen</h6>
                    <a class="collapse-item" href="surattugas-isi.php">Surat Tugas</a>
                    <a class="collapse-item" href="#">Izin WFH</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-question"></i>
            <span>Bantuan / Pertanyaan</span>
        </a>
        <?php
        $qadmin = mysqli_query($conn, "SELECT * FROM pengguna WHERE role='adminfakultas'");
        $dadmin = mysqli_fetch_array($qadmin);
        $notelepon = $dadmin['nohp'];
        $email = $dadmin['email'];
        ?>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="https://wa.me/<?= ($notelepon); ?>" target="_blank">WhatsApp</a>
                <a class="collapse-item" href="mailto:<?= $email; ?>" target="_blank">Email</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <!--<a class="nav-link" href="../deauth.php">
            <i class="fas fa-door-open"></i>
            <span>Keluar</span></a>-->
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Keluar
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>