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
$qsurat = mysqli_query($conn, "SELECT * FROM validasi WHERE no='$nodata'");
$dsurat = mysqli_fetch_array($qsurat);
$nama = $dsurat['nama'];
$nim = $dsurat['nim'];
$prodi = $dsurat['prodi'];
$jenjang = $dsurat['jenjang'];
$keperluan = $dsurat['keperluan'];
$validasi = $dsurat['validasi'];
$judul = $dsurat['judul'];
$dosen1 = $dsurat['dosen1'];
$dosen2 = $dsurat['dosen2'];
$validator = $dsurat['validator'];
$keterangan = $dsurat['keterangan'];
$tglverifikasi = date('Y-m-d', strtotime($dsurat['tglverifikasi']));
$verifikasi = $dsurat['verifikasi'];

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
            <td>Lampiran</td>
            <td>: -</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Hal</td>
            <td>: Validasi
                <?= $validasi; ?>
            </td>
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
            <td colspan="2">Yth. Bapak / Ibu <?= $validator; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>

            <td colspan="2">di Tempat</td>
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
            <td colspan="6" style="text-align:justify">Sehubungan dengan proses penyusunan <?= $keperluan; ?> mahasiswa berikut: </td>
        </tr>
        <tr>
            <td width="5%"> </td>
            <td width="20%">Nama</td>
            <td colspan="3">: <?= $nama; ?></td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td>NIM</td>
            <td colspan="3">: <?= $nim; ?></td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td>Program Studi</td>
            <td colspan="3">: <?= $jenjang; ?> <?= $prodi; ?></td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td>Judul <?= $keperluan; ?></td>
            <td colspan="3" style="text-align:justify">: <?= $judul; ?></td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td>Validasi</td>
            <td colspan="3">: <?= $validasi; ?></td>
            <td> </td>
        </tr>

        <?php
        if ($jenjang == 'S1') {
        ?>
            <tr>
                <td> </td>
                <td>Dosen Pembimbing</td>
                <td colspan="3">: <?= $dosen1; ?> </td>
                <td> </td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td> </td>
                <td>Dosen Pembimbing 1</td>
                <td colspan="3">: <?= $dosen1; ?> </td>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
                <td>Dosen Pembimbing 2</td>
                <td colspan="3">: <?= $dosen2; ?> </td>
                <td> </td>
            </tr>
        <?php
        }
        ?>


        <tr>
            <td colspan="6" style="text-align:justify">maka dimohon Bapak/Ibu berkenan menjadi validator
                <? $keperluan; ?> tersebut. Adapun segala hal berkaitan dengan apresiasi terhadap kegiatan validasi sebagaimana dimaksud sepenuhnya menjadi tanggung jawab mahasiswa bersangkutan.
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">Demikian Permohonan ini disampaikan, atas perkenan dan kerjasamanya yang baik disampaikan terima kasih.</td>
        </tr>
        <tr>
            <td colspan="6"><b><i>Wassalamu'alaikum Wr. Wb.</i></b></td>
        </tr>
    </tbody>
</table>
<!-- cari data penandatangan -->
<?php
$qpejabat = mysqli_query($conn, "SELECT * FROM jenissurat WHERE namasurat='Validator Skripsi'");
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
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
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
                <td style="text-align:left">
                    <div class="container">
                        <div class="jabatan">a.n. Dekan <br /><?= $jabatan; ?>,</div>
                        <img src="<?= $ttd;  ?>" alt="ttd" style="width:300px;">
                        <div class="nama"><?php echo $nama; ?></div>
                    </div>
                </td>
            <?php
            }
            ?>
            <td> </td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">Tembusan:</td>
        </tr>
        <tr>
            <td colspan="6">1. Ketua Jurusan <?= $prodi; ?>;</td>
        </tr>
        <tr>
            <td colspan="6">2. Arsip.</td>
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