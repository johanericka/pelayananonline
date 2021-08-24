<html>

<script>
    window.print();
</script>

<!-- connect to db -->
<?php require_once('../config.php'); ?>
<!-- ./db -->

<?php
//get data observasi
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$qsurat = mysqli_query($conn, "SELECT * FROM transkripnilai WHERE no='$nodata'");
$dsurat = mysqli_fetch_array($qsurat);
$nama = $dsurat['nama'];
$nim = $dsurat['nim'];
$prodi = $dsurat['prodi'];
$jenjang = $dsurat['jenjang'];
$keperluan = $dsurat['keperluan'];
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
            <td colspan="6">&nbsp;</td>
        </tr>
    </tbody>
</table>

<!-- isi surat -->
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td> </td>
            <td colspan="4" style="text-align:center">
                <h2><b>FORMULIR PENGAJUAN TRANSKRIP NILAI </b></h2>
            </td>
            <td> </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">Yang bertanda tangan di bawah ini : </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
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
            <td>Jurusan</td>
            <td colspan="3">: <?= $jenjang; ?> - <?= $prodi; ?></td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">Bermaksud mengajukan permohonan cetak transkip nilai sementara untuk keperluan <?= $keperluan; ?>.</td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:justify">Demikian permohonan ini, atas perhatian dan pelayanan yang baik disampaikan terima kasih. </td>
        </tr>
    </tbody>
</table>
<!-- table bawah -->
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:center">Malang, <?= tgl_indo($tglverifikasi); ?><br />Mahasiswa,</td>
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
            <td>&nbsp;</td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:center"><u><?php echo $nama; ?></u></td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:center">NIM. <?php echo $nim; ?></td>
            <td> </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="4">&nbsp;</td>
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