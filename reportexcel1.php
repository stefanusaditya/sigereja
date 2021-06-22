<?php 
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Nomor');
$sheet->setCellValue('B1', 'Nama Pendaftar');
$sheet->setCellValue('C1', 'Nomor HP');
$sheet->setCellValue('D1', 'Jumlah Anggota');


$query = mysqli_query($koneksi,"select * from sesi_1");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['nama']);
    $sheet->setCellValue('C'.$i, $row['no_hp']);
    $sheet->setCellValue('D'.$i, $row['jumlah']);
    $i++;
}

$styleArray = [
            'borders'=> [
                'allBorders'=> [
                    'borderStyle'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);


$writer = new Xlsx($spreadsheet);
$writer->save('Report Pendaftar Sesi1 .xlsx');
?>