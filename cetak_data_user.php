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
$pdf->Cell(250,7,'DATA AKUN USER ',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',11);
$pdf->setFillColor(222,222,222);
$pdf->CELL(6,6,'NO',1,0,'L',1);
$pdf->CELL(30,6,'USERNAME',1,0,'L',1);
$pdf->CELL(35,6,'NAMA',1,0,'L',1);
$pdf->CELL(10,6,'JK',1,0,'L',1);
$pdf->CELL(30,6,'TGL_LAHIR',1,0,'L',1);
$pdf->CELL(40,6,'EMAIL',1,0,'L',1);
$pdf->CELL(50,6,'ALAMAT',1,0,'L',1);
$pdf->CELL(30,6,'NO_HP',1,0,'L',1);
$pdf->CELL(25,6,'KODE_POS',1,0,'L',1);
$pdf->CELL(20,6,'STATUS',1,1,'L',1);
 
$pdf->SetFont('Arial','',10);

include 'koneksi.php';

$no=1;
$queen = "SELECT * FROM tb_pengguna order by nama asc";
$sarah = mysqli_query($koneksi,$queen);
while ($row = mysqli_fetch_array($sarah)){
    $pdf->Cell(6,6,$no,1,0);
    $pdf->Cell(30,6,$row['username'],1,0);
    $pdf->Cell(35,6,$row['nama'],1,0);
    $pdf->Cell(10,6,$row['jk'],1,0);
    $pdf->Cell(30,6,$row['tgl_lahir'],1,0);
    $pdf->Cell(40,6,$row['email'],1,0);
    $pdf->Cell(50,6,$row['alamat'],1,0);
    $pdf->Cell(30,6,$row['no_hp'],1,0);
    $pdf->Cell(25,6,$row['kode_pos'],1,0);
    $pdf->Cell(20,6,$row['status'],1,1);
    $no++;
}
 
$pdf->Output('DATA AKUN USER.pdf','D');
?>