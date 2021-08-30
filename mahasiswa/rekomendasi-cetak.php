<html>

<script>
    window.print();
</script>

<link rel="stylesheet" href="../assets/style.css">

<!-- connect to db -->
<?php
require('../config.php');
require('../assets/myfunc.php');
?>
<!-- ./db -->

<?php
//get data observasi
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$qsuket = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE nodata='$nodata'");
$rowsurat = mysqli_fetch_array($qsuket);
$keterangan = $rowsurat['keterangan'];
$nim = $rowsurat['nim'];
$nama = stripslashes($rowsurat['nama']);
$notelepon = $rowsurat['notelepon'];
$email = $rowsurat['email'];
$prodi = $rowsurat['prodi'];
$jenissurat = 'Surat Rekomendasi';
$keperluan = $rowsurat['keperluan'];
$verifikator = $rowsurat['verifikator'];
$verifikasi = $rowsurat['verifikasi'];
$tglverifikasi = $rowsurat['tglverifikasi'];

$tgl = date('Ymd');
$jam = date('His');
//buat qrcode
include "../assets/phpqrcode/qrlib.php";
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link;
$codeContents = $actual_link;
$namafile = $nim . "-" . "rekomendasi" . "-" . $nodata;
QRcode::png($codeContents, "../qrcode/$namafile.png", QR_ECLEVEL_L, 4, 4);
?>


<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td colspan="6" align="center"><img src="../assets/kop-humaniora.png" width="100%"></td>
        </tr>
    </tbody>
</table>
<!-- header surat -->
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6" align="center">
                <h3><u>SURAT KETERANGAN REKOMENDASI</u></h3>
            </td>
        </tr>
        <tr>
            <td colspan="6" align="center">
                Nomor : <?= $keterangan; ?>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>

<!-- isi surat -->
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td colspan="6" style="text-align:justify">Dekan Fakultas Humaniora Universitas Islam Negeri Maulana Malik Ibrahim Malang menerangkan dengan sebenarnya bahwa : </td>
        </tr>
        <tr>
            <td width="5%"> </td>
            <td width="20%">Nama</td>
            <td colspan="4">: <?= $nama; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td>NIM</td>
            <td colspan="4">: <?= $nim; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td>Program Studi</td>
            <td colspan="4">: <?= $prodi; ?></td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">yang bersangkutan benar - benar tercatat sebagai mahasiswa aktif dan memiliki motivasi sangat tinggi di Program Studi <?= $prodi; ?> Fakultas Humaniora Universitas Islam Negeri Maulana Malik Ibrahim Malang, dan kami rekomendasikan yang bersangkutan untuk <?= $keperluan; ?></td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">Demikian Surat Rekomendasi ini, agar dipergunakan sebagaimana mestinya.</td>
        </tr>
    </tbody>
</table>
<!-- cari data penandatangan -->
<?php
//cari tandatangan pejabat
$qttd = mysqli_query($conn, "SELECT * FROM pejabat WHERE nip='$verifikator'");
$dttd = mysqli_fetch_array($qttd);
$nama = $dttd['nama'];
$jabatan = $dttd['jabatan'];
$nip = $dttd['nip'];
$ttd = $dttd['ttd'];
?>
<!-- table bawah -->
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td> </td>
            <td colspan="4">&nbsp;</td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td style="text-align:left">
                <small><i>Scan QRCode ini </i></small>
                <br />
                <img src="../qrcode/<?php echo $namafile; ?>.png" width="70" />
                <br />
                <small><i>untuk verifikasi</i></small>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <?php
            if ($verifikasi == 1) {
            ?>
                <td>
                    <div class="container">
                        <div>Malang, <?= tgl_indo($tglverifikasi); ?></div>
                        <img src="<?= $ttd;  ?>" alt="ttd" style="width:200px;">
                        <div class="nama"><?= $nama; ?></div>
                    </div>
                </td>
            <?php
            };
            ?>
            <td> </td>
        </tr>
    </tbody>
</table>

</html>