<!-- DOMPDF -->
<?php
require_once '../assets/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

//$nodata = $_GET['nodata'];
$html = file_get_contents("observasiindividu-cetak.php?nodata=1");
$dompdf->load_html($html);
// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Menjadikan HTML sebagai PDF
$dompdf->render();
// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("codexworld", array("Attachment" => 1));
?>