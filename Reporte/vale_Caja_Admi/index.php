<?php
include('extra.php');

require 'cn.php';
$consulta = "SELECT * FROM archivo";
$resultado = $mysqli -> query($consulta);


$pdf = new PDF('L','mm','letter', true);
$pdf -> SetMargins(15,10,15,10);
$pdf->AliasNbPages();
$pdf->AddPage();



$pdf->SetFont('Arial','',72);
$pdf -> Cell(250, 140, 'N° de caja: 50',0, 1, 'C');

$pdf->SetFont('Arial','',40);
$pdf -> Cell(250, 2, 'Administrativo/Fondo',0, 1, 'C');
$pdf->Ln(10);



//$pdf->AddPage();
$pdf->Output('I', 'Reporte.pdf');
?>