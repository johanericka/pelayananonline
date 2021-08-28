<html>

<script>
	//window.print();
</script>

<link rel="stylesheet" href="../assets/style.css">

<!-- connect to db -->
<?php
require('../config.php');
require('../assets/myfunc.php');
?>
<!-- ./db -->

<?php
//get data penelitian
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$qsurat = mysqli_query($conn, "SELECT * FROM dispensasi WHERE nodata='$nodata'");
$dsurat = mysqli_fetch_array($qsurat);
$nama = $dsurat['nama'];
$nim = $dsurat['nim'];
$prodi = $dsurat['prodi'];
$kegiatan = $dsurat['kegiatan'];
$tujuansurat = $dsurat['namainstansi'];
$alamatsurat = $dsurat['alamatinstansi'];
$keterangan = $dsurat['keterangan'];
$tglmulai = $dsurat['tglmulai'];
$tglselesai = $dsurat['tglselesai'];
$tglverifikasi = $dsurat['tglverifikasi'];
$verifikasi = $dsurat['verifikasi'];

$tgl = date('Ymd');
$jam = date('His');
//buat qrcode
include "../assets/phpqrcode/qrlib.php";
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link;
$codeContents = $actual_link;
$namafile = $nim . "-dispensasi-" . $nodata;
QRcode::png($codeContents, "../qrcode/$namafile.png", QR_ECLEVEL_L, 4, 4);
?>

<table table style="width:80%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
	<tbody>
		<tr>
			<td colspan="6" align="center"><img src="../assets/kop-humaniora.png" /></td>
		</tr>
	</tbody>
</table>
<!-- header surat -->
<table table style="width:80%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
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
			<td>Hal</td>
			<td>: Permohonan Dispensasi Kegiatan</td>
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
			<td colspan="2">Yth. <?= $tujuansurat; ?></td>
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
			<td colspan="2"><?= $alamatsurat; ?></td>
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
<table table style="width:80%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
	<tbody>
		<tr>
			<td colspan="6" style="text-align:justify"><b><i>Assalamu'alaikum wa Rahmatullahi wa Barakatuh.</i></b></td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:justify">Sehubungan dengan adanya kegiatan <?= $kegiatan; ?>, kami mohon diberikan izin tidak mengikuti kegiatan / dispensasi untuk mahasiswa : </td>
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
			<td colspan="3">: <?= $prodi; ?></td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td>Durasi Izin</td>
			<td colspan="3">: <?= tgl_indo($tglmulai); ?> sampai dengan <?= tgl_indo($tglselesai); ?> </td>
			<td> </td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:justify">Demikian, atas perhatian dan perkenannya kami sampaikan terima kasih. </td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:justify"><b><i>Wassalamu'alaikum wa Rahmatullahi wa Barakatuh.</i></b></td>
		</tr>
	</tbody>
</table>
<!-- cari data penandatangan -->
<?php
$qpejabat = mysqli_query($conn, "SELECT * FROM jenissurat WHERE namasurat='Dispensasi'");
$dpejabat = mysqli_fetch_array($qpejabat);
$pejabat = $dpejabat['pejabat'];

//cari tandatangan pejabat
$qttd = mysqli_query($conn, "SELECT * FROM pejabat WHERE lower(jabatan)='$pejabat'");
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
			<td> </td>
			<td style="text-align:left">
				<small><i>Scan QRCode ini </i></small>
				<br />
				<img src="../qrcode/<?= $namafile; ?>.png" width="70" />
				<br />
				<small><i>untuk verifikasi</i></small>
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			if ($verifikasi == 1) {
			?>
				<td style="text-align:center">
					<div class="container">
						<div class="jabatan">Dekan,</div>
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
			<td> </td>
			<td style="text-align:left"></td>
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
	</tbody>
</table>

</html>