<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF();
// membuat halaman baru
$pdf->AddPage('L');
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(25, 25); 
// mencetak string 
$pdf->Cell(220,7,'SISTEM TOKO PAKAIAN ONLINE',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(250,7,'DATA SALDO ',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',11);
$pdf->setFillColor(222,222,222);
$pdf->CELL(6,6,'NO',1,0,'L',1);
$pdf->CELL(25,6,'KODE SALDO',1,0,'L',1);
$pdf->CELL(25,6,'JUMLAH',1,1,'L',1);

 
$pdf->SetFont('Arial','',10);

include 'koneksi.php';

$no=1;
$queen = "SELECT * FROM tb_saldo order by kode_saldo asc";
$sarah = mysqli_query($koneksi,$queen);
while ($row = mysqli_fetch_array($sarah)){
    $pdf->Cell(6,6,$no,1,0);
    $pdf->Cell(25,6,$row['kode_saldo'],1,0);
    $pdf->Cell(25,6,$row['jumlah'],1,0);
    $no++;
}
 
$pdf->Output('DATA SALDO.pdf','D');
?>