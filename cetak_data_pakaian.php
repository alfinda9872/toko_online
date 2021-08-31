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
$pdf->Cell(250,7,'DATA PENJUALAN PAKAIAN ',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',11);
$pdf->setFillColor(222,222,222);
$pdf->CELL(6,6,'NO',1,0,'L',1);
$pdf->CELL(40,6,'PAKAIAN',1,0,'L',1);
$pdf->CELL(20,6,'BAHAN',1,0,'L',1);
$pdf->CELL(20,6,'UKURAN',1,0,'L',1);
$pdf->CELL(30,6,'HARGA',1,0,'L',1);
$pdf->CELL(20,6,'STOK',1,0,'L',1);
$pdf->CELL(20,6,'KONDISI',1,0,'L',1);
$pdf->CELL(20,6,'JENIS',1,0,'L',1);
$pdf->CELL(30,6,'MERK',1,0,'L',1);
$pdf->CELL(35,6,'TANGGAL',1,0,'L',1);
$pdf->CELL(35,6,'PENJUAL',1,1,'L',1);
 
$pdf->SetFont('Arial','',10);
session_start(); 
include 'koneksi.php';
function rupiah($angka)
          {
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
          }
$no=1;
$queen = "SELECT tb_pakaian.nama_bahan , tb_pakaian.bahan, tb_pakaian.ukuran, tb_pakaian.harga, tb_pakaian.stok, tb_pakaian.kondisi, tb_jenis_pakaian.jenis, tb_pakaian.tanggal, tb_pengguna.nama, tb_pakaian.merk from tb_pakaian join tb_jenis_pakaian on tb_pakaian.kode_jenis=tb_jenis_pakaian.kode_jenis join tb_pengguna on tb_pengguna.id_pengguna=tb_pakaian.id_pengguna order by tb_pakaian.kode_pakaian desc";
  $sarah = mysqli_query($koneksi,$queen);
while ($row = mysqli_fetch_array($sarah)){
    $pdf->Cell(6,6,$no,1,0);
    $pdf->Cell(40,6,$row['nama_bahan'],1,0);
    $pdf->Cell(20,6,$row['bahan'],1,0);
    $pdf->Cell(20,6,$row['ukuran'],1,0);
    $pdf->Cell(30,6,rupiah($row['harga']),1,0);
    $pdf->Cell(20,6,$row['stok'],1,0);
    $pdf->Cell(20,6,$row['kondisi'],1,0);
    $pdf->Cell(20,6,$row['jenis'],1,0);
    $pdf->Cell(30,6,$row['merk'],1,0);
    $pdf->Cell(35,6,$row['tanggal'],1,0);
    $pdf->Cell(35,6,$row['nama'],1,1); 
    $no++;
}
 
$pdf->Output('DATA PAKAIAN.pdf','D');
?>