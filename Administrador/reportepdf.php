<?php
require('../fpdf/fpdf.php');
require('config.php');

// Crear connection
$conexion = new mysqli($servidor, $nombreusuario, $password, $dbnombre);
date_default_timezone_set("America/Bogota");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Image('../imagenes/logo.png',10,10,-150);
$pdf->Ln(10);
$pdf->Cell(90,20,'Fecha: '.date('d/m/Y H:i:s').'',0);
$pdf->Ln(10);
$pdf->Cell(100,20,utf8_decode('Inventario - PC Electronics'));
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,10,'ID');
$pdf->Cell(35,10,'CODIGO DE BARRAS');
$pdf->Cell(20,10,'NOMBRE');
$pdf->Cell(25,10,'FECHA COMPRA');
$pdf->Cell(20,10,'VALORNETO');
$pdf->Cell(20,10,'GANANCIA');
$pdf->Cell(20,10,'CANTIDAD');
$pdf->Cell(20,10,'PROVEEDOR');
$pdf->Cell(20,10,'ORIGEN');

$pdf->Ln(0);

$pdf->SetFont('Arial','',8);

$query_select = 'SELECT * FROM productos';
$result = mysqli_query($conexion,$query_select);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($reg = mysqli_fetch_assoc($result)) {
    	
$pdf->Cell(10,20, $reg['id'], 0);

$pdf->Cell(35,20, utf8_decode($reg['codigobarras']), 0);
$pdf->Cell(20,20, utf8_decode($reg['nombre']), 0);
$pdf->Cell(25,20, utf8_decode($reg['fechaalta']), 0);
$pdf->Cell(20,20, utf8_decode($reg['valorneto']),0, 0, 'C');
$pdf->Cell(20,20, utf8_decode($reg['ganancia']).'%', 0, 0, 'C');
$pdf->Cell(20,20, utf8_decode($reg['cantidad']), 0, 0, 'C');
$pdf->Cell(20,20, utf8_decode($reg['proveedor']), 0);
$pdf->Cell(20,20, utf8_decode($reg['origen']), 0);

$pdf->Ln(5);

}
}

$pdf->Output();
mysqli_close($conexion);
?>
