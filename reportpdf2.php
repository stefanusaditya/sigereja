<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf ();
$query = mysqli_query($koneksi,"select * from sesi_2");
$html = '<hr><center><h3>Daftar Pendaftar Ibadah Sesi I</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th style="text-align:center;">Nomor</th>
<th style="text-align:center;">Nama Pendaftar</th>
<th style="text-align:center;">No HP</th>
<th style="text-align:center;">Jumlah Anggota</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['nama']."</td>
    <td>".$row['no_hp']."</td>
    <td>".$row['jumlah']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_jemaatpendaftarsesi_1.pdf');
?>