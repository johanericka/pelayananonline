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
$qsurat = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE no='$nodata'");
$dsurat = mysqli_fetch_array($qsurat);
$nama = $dsurat['nama'];
$nim = $dsurat['nim'];
$prodi = $dsurat['prodi'];
$jenjang = $dsurat['jenjang'];
$nohp = $dsurat['nohp'];
$email = $dsurat['email'];
$semester = $dsurat['semester'];
$tahunakademik = $dsurat['tahunakademik'];
$keperluan = $dsurat['keperluan'];
$judulpenelitian = $dsurat['judul'];
$tujuansurat = $dsurat['namainstansi'];
$alamatsurat = $dsurat['alamatinstansi'];
$tempatpenelitian = $dsurat['tempatpenelitian'];
$lokasipenelitian = $dsurat['lokasipenelitian'];
$tglmulai = $dsurat['tglmulai'];
$tglselesai = $dsurat['tglselesai'];
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
			<td><?= tgl_indo($tglverifikasi); ?></td>
			<td>&nbsp;</td>
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
			<td>Hal</td>
			<td>: <b>Izin Penelitian</b></td>
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
<table table style="width:90%; margin-left:auto;margin-right:auto;" cellspacing="0" border="0">
	<tbody>
		<tr>
			<td> </td>
			<td colspan="4"><b><i>Assalamu'alaikum Wr. Wb.</i></b></td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td colspan="4">Dengan hormat, dalam rangka menyelesaikan tugas akhir berupa penyusunan <?= $keperluan; ?> mahasiswa Fakultas Ilmu Tarbiyah dan Keguruan (FITK) Universitas Islam Negeri Maulana Malik Ibrahim Malang, kami mohon dengan hormat agar mahasiswa berikut : </td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td>Nama</td>
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
			<td colspan="3">: <?= $prodi; ?></td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td>Semester</td>
			<td colspan="3">: <?= $semester; ?> Tahun Akademik <?= $tahunakademik; ?></td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td>Judul <?= $keperluan; ?></td>
			<td colspan="3">: <?= $judulpenelitian; ?></td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td>Lama Penelitian</td>
			<td colspan="3">: <?= tgl_indo($tglmulai); ?> sampai dengan <?= tgl_indo($tglselesai); ?> </td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td colspan="4">diberi izin untuk melakukan penelitian di <?= $tempatpenelitian; ?> <?= $lokasipenelitian; ?></td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td colspan="4">Demikian, atas perkenan dan kerjasama Bapak/Ibu yang baik disampaikan terima kasih. </td>
			<td>
			</td>
		</tr>
		<tr>
			<td> </td>
			<td colspan="4"><b><i>Wassalamu'alaikum Wr. Wb.</i></b></td>
			<td> </td>
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
			<td style="text-align:left"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td style="text-align:center"><?= $jabatan; ?></td>
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
				<td style="text-align:center">
					<img src="<?= $ttd; ?>" width="250px" />
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
			<td style="text-align:center"><u><?php echo $nama; ?></u></td>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td style="text-align:center">NIP. <?php echo $nip; ?></td>
			<td> </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="4">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="4">Tembusan:</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="4">1. Ketua Jurusan <?= $prodi; ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="4">2. Arsip</td>
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