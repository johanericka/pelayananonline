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
$datasurat = mysqli_query($conn, "SELECT * FROM observasi WHERE no='$nodata'");
$rowsurat = mysqli_fetch_array($datasurat);
$keterangan = $rowsurat['keterangan'];
$nim = $rowsurat['nim'];
$nama = $rowsurat['nama'];
$nohp = $rowsurat['nohp'];
$email = $rowsurat['email'];
$prodi = $rowsurat['prodi'];
$semester = $rowsurat['semester'];
$tahunakademik = $rowsurat['tahunakademik'];
$keperluan = $rowsurat['keperluan'];
$namamk = $rowsurat['namamk'];
$dosen = $rowsurat['dosen'];
$namainstansi = $rowsurat['namainstansi'];
$alamatinstansi = $rowsurat['alamatinstansi'];
$tempatobservasi = $rowsurat['tempatobservasi'];
$alamatobservasi = $rowsurat['alamatobservasi'];
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
			<td>: Izin Observasi Individu</td>
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
			<td colspan="6" style="text-align:justify"><b><i>Assalamu'alaikum Wr. Wb.</i></b></td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:justify">Dengan hormat, dalam rangka menyelesaikan <?= $keperluan; ?> <?= $namamk; ?> pada Jurusan <?= ucwords($prodi); ?> Fakultas Ilmu Tarbiyah dan Keguruan Universitas Islam Negeri Maulana Malik Ibrahim Malang, kami mengharap dengan hormat agar mahasiswa berikut: </td>
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
			<td>Semester</td>
			<td colspan="4">: <?= $semester; ?> Tahun Akademik <?= $tahunakademik; ?></td>
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
				<td>
					<div class="container">
						<div class="jabatan">a.n. Dekan <br /><?= $jabatan; ?>,</div>
						<img src="<?= $ttd;  ?>" alt="ttd" style="width:300px;">
						<div class="nama"><?php echo $nama; ?></div>
					</div>
				</td>
			<?php
			};
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