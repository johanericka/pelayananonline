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
$datasurat = mysqli_query($conn, "SELECT * FROM observasi WHERE nodata='$nodata'");
$rowsurat = mysqli_fetch_array($datasurat);
$keterangan = $rowsurat['keterangan'];
$nim = $rowsurat['nim'];
$nama = stripslashes($rowsurat['nama']);
$nohp = $rowsurat['nohp'];
$email = $rowsurat['email'];
$prodi = $rowsurat['prodi'];
$namamk = $rowsurat['namamk'];
$judul = $rowsurat['judul'];
$namainstansi = $rowsurat['namainstansi'];
$alamatinstansi = $rowsurat['alamatinstansi'];
$verifikasi = $rowsurat['verifikasi'];
$tglmulai = date('Y-m-d', strtotime($rowsurat['tglmulai']));
$tglselesai = date('Y-m-d', strtotime($rowsurat['tglselesai']));
$tglverifikasi = date('Y-m-d', strtotime($rowsurat['tglverifikasi']));

$tgl = date('Ymd');
$jam = date('His');
//buat qrcode
include "../assets/phpqrcode/qrlib.php";
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link;
$codeContents = $actual_link;
$namafile = $nim . "-observasi-" . $nodata;
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
			<td>Perihal</td>
			<td>: Izin Observasi</td>
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
			<td colspan="2">Yth. <?= $namainstansi; ?></td>
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
			<td colspan="2"><?= $alamatinstansi; ?></td>
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
			<td colspan="6" style="text-align:justify"><b><i>Assalamu'alaikum wa Rahmatullahi wa Barakatuh</i></b></td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:justify">Dalam rangka menyelesaikan tugas mata kuliah <?= $namamk; ?> Program Studi <?= ucwords($prodi); ?> Fakultas Humaniora Universitas Islam Negeri Maulana Malik Ibrahim Malang, kami mohon diberikan izin untuk melakukan Observasi tentang <?= $judul; ?> di instansi yang Bapak / Ibu pimpin kepada mahasiswa di bawah ini : </td>
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
			<td>Jurusan</td>
			<td colspan="4">: <?= $prodi; ?></td>
		</tr>
		<tr>
			<td> </td>
			<td>Waktu Pelaksanaan</td>
			<td colspan="4">: <?= tgl_indo($tglmulai); ?> sampai dengan <?= tgl_indo($tglselesai); ?></td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:justify">Demikian, atas izin dan kerjasamanya kami sampaikan terima kasih. </td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:justify"><b><i>Wassalamu'alaikum wa Rahmatullahi wa Barakatuh.</i></b></td>
		</tr>
	</tbody>
</table>
<!-- cari data penandatangan -->
<?php
$qpejabat = mysqli_query($conn, "SELECT * FROM jenissurat WHERE namasurat='Izin Observasi'");
$dpejabat = mysqli_fetch_array($qpejabat);
$pejabat = $dpejabat['pejabat'];

//cari tandatangan pejabat
$qttd = mysqli_query($conn, "SELECT * FROM pejabat WHERE jabatan='$pejabat'");
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
						<div class="jabatan"><?= $jabatan; ?>,</div>
						<img src="<?= $ttd;  ?>" alt="ttd" style="width:300px;">
						<div class="nama"><?php echo $nama; ?></div>
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