<html>

<script>
    window.print();
</script>

<link rel="stylesheet" href="../assets/style.css">

<!-- connect to db -->
<?php require_once('../config.php'); ?>
<!-- ./db -->

<?php
//get data observasi
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$datasurat = mysqli_query($conn, "SELECT * FROM observasikelompok WHERE no='$nodata'");
$rowsurat = mysqli_fetch_array($datasurat);
$nim = $rowsurat['pengusul'];
$tglverifikasi = date('Y-m-d', strtotime($rowsurat['tglverifikasi']));
$keterangan = $rowsurat['keterangan'];
$kepada = $rowsurat['kepada'];
$alamat = $rowsurat['alamat'];
$matakuliah = $rowsurat['matakuliah'];
$prodi = $rowsurat['prodi'];
$jenjang = $rowsurat['jenjang'];
$verifikasi = $rowsurat['verifikasi'];
$keperluan = $rowsurat['keperluan'];

$tgl = date('Ymd');
$jam = date('His');

//buat qrcode
include "../assets/phpqrcode/qrlib.php";
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link;
$codeContents = $actual_link;
$namafile = $nim . "_" . $tgl . "_" . $jam;
QRcode::png($codeContents, "../qrcode/$namafile.png", QR_ECLEVEL_L, 4, 4);
?>


<table table style="width:80%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td colspan="6" align="center"><img src="../assets/kopsurat.png" /></td>
        </tr>
    </tbody>
</table>
<!-- header surat -->
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Nomor</td>
            <td>: <?= $keterangan; ?></td>
            <td>&nbsp;</td>
            <td colspan="2" style="text-align:right" width="20%"><?= tgl_indo($tglverifikasi); ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Sifat</td>
            <td>: Penting</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Lampiran</td>
            <td>: -</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Perihal</td>
            <td>: Izin Observasi Kelompok</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2">Kepada</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2">Yth. <?= $kepada; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>

            <td colspan="2">di</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2"><?= $alamat; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
    </tbody>
</table>

<!-- isi surat -->
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td colspan="6" style="text-align:justify"><b><i>Assalamu'alaikum Wr. Wb.</i></b></td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">Dengan hormat, dalam rangka menyelesaikan <?= $keperluan; ?> <?= $matakuliah; ?> pada Jurusan <?= $jenjang; ?> <?= ucwords($prodi); ?> Fakultas Ilmu Tarbiyah dan Keguruan Universitas Islam Negeri Maulana Malik Ibrahim Malang, kami mengharap dengan hormat agar mahasiswa berikut: </td>
        </tr>
        <tr>
            <td width="5%"> </td>
            <td>
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0" border="1">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $qanggota = mysqli_query($conn, "SELECT * FROM observasikelompok_anggota WHERE pengusul='$nim'");
                    while ($danggota = mysqli_fetch_array($qanggota)) {
                        $nama = $danggota['nama'];
                        $nim = $danggota['nim'];
                    ?>
                        <tbody>
                            <td><?= $no; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $nim; ?></td>
                        </tbody>
                    <?php
                        $no++;
                    };
                    ?>
                </table>
            </td>
            <td width="5%"> </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">diberikan izin untuk melakukan observasi di lembaga/instansi yang menjadi wewenang Bapak/Ibu.</td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">Demikian, atas perkenan dan kerjasama yang baik disampaikan terima kasih. </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify"><b><i>Wassalamu'alaikum Wr. Wb.</i></b></td>
        </tr>
    </tbody>
</table>
<!-- cari data penandatangan -->
<?php
$qpejabat = mysqli_query($conn, "SELECT * FROM jenissurat WHERE namasurat='Izin Penelitian Dinas'");
$dpejabat = mysqli_fetch_array($qpejabat);
$pejabat = $dpejabat['pejabat'];

//cari tandatangan pejabat
$qttd = mysqli_query($conn, "SELECT * FROM pejabat WHERE jab='$pejabat'");
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
                <td style="text-align:justify">
                    <div class="container">
                        <div style="text-align:justify" class="jabatan">a.n. Dekan <br /><?= $jabatan; ?>,</div>
                        <img src="<?= $ttd;  ?>" alt="ttd" style="width:300px;">
                        <div style="text-align:justify" class="nama"><?= $nama; ?></div>
                    </div>
                </td>
            <?php
            }
            ?>
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
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td> </td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="4">Tembusan:</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="4">1. Ketua Jurusan <?= $prodi; ?>;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="4">2. Arsip.</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>

</html>