<?php
date_default_timezone_set("asia/singapore");
error_reporting(0);
include "../../koneksi.php";
$jenis = $_GET['jenis'];
$tanggal = $_GET['tanggal'];
$dari = $_GET['dari'];
$sampai = $_GET['sampai'];
ob_start();
if($jenis == "data_buku")
{
	require "../fpdf17/mc_table.php";	
	$laporan=new PDF_MC_Table('L','mm','A4');
	$laporan->AddPage();
	$laporan->SetFont('times','B',12);
	//$laporan->Image('1.jpg',235,6,30);
	$laporan->Cell(0,10,"Toko BUKU",0,1,'C');
	$laporan->SetFont('times','B',10);
	$laporan->Cell(0,10,"LAPORAN DATA BUKU KESELURUHAN",0,1,'C');
	$laporan->Cell(0,10,date("l, F d, Y | h:i:s"),0,1,'L');


	$laporan->setFillColor(210,221,242); ;
	$laporan->Cell(10,10,"NO",1,0,'C',true);
	$laporan->Cell(25,10,"ID BUKU",1,0,'C',true);
	$laporan->Cell(35,10,"KATEGORI",1,0,'C',true);
	$laporan->Cell(50,10,"NAMA BUKU",1,0,'C',true);
	$laporan->Cell(50,10,"PENGARANG",1,0,'C',true);
	$laporan->Cell(25,10,"HARGA",1,0,'C',true);
	$laporan->Cell(25,10,"STOCK",1,0,'C',true);
	$laporan->Cell(55,10,"PENERBIT",1,1,'C',true);
	
	$laporan->SetWidths(array(10,25,35,50,50,25,25,55));
	$laporan->SetFont('Arial','',9);	
	$no=1;
	$sqlQuery = "SELECT * from buku,kategori,penerbit WHERE buku.id_kategori = kategori.id_kategori AND buku.id_penerbit = penerbit.id_penerbit";		
	$data = mysql_query($sqlQuery);
	while($hasil = mysql_fetch_array($data)){
		$laporan->Row(array($no,$hasil['id_buku'],$hasil['kategori'],$hasil['nama_buku'],$hasil['pengarang_buku'],$hasil['harga_buku'],$hasil['stock_buku'],$hasil['nama_penerbit']));
		$no++;
	}
	
	$laporan->SetFont('times','B',10);
	$laporan->Cell(0,10,"Laporan Data Lengkap ",0,1,'');
	
	
	$laporan->Output();
}
?>