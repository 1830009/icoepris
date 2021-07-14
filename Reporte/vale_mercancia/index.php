<?php
require '../../login/sesion.php';
include('extra.php');
require '../conexion.php';
$conexion=ConectarBD();
    if(!$conexion){
        print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
    }
$consulta = "SELECT * FROM proyecto_federal";
$resultado = $conexion -> query($consulta);


$pdf = new PDF('P','mm','letter', true);
$pdf -> SetMargins(15,10,15,10);
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial','',12);
date_default_timezone_set('America/Monterrey');
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
setlocale(LC_ALL,"es_ES");
$hoy = strftime("%d de ". $meses[date('n')-1]." del %Y");
$pdf->Cell(190,5,'Cd. Victoria Tamaulipas, a '. $hoy,0,1,'R');
$pdf->Ln(8);


$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0, 6, 'Por este conducto entrego el siguiente material, '.$_SESSION['usuario'].' Responsable de la Coordinación de Cd. Victoria.',0,'',false);
$pdf->Ln(8);


$pdf->SetWidths(Array(30,60,70,30)); //ancho de celda
$pdf->SetAligns(Array('C','L','L','C')); // alineacion de contenido
$pdf->SetLineHeight(5); // alto de celda


$pdf->SetFont('Arial','I',14);
$pdf->SetFillColor(0,0,254);
$pdf->SetTextColor(254,254,254);
$pdf -> Cell(30, 10, 'Código',1, 0, 'C', 1);
$pdf -> Cell(60, 10, 'Nombre',1, 0, 'C', 1);
$pdf -> Cell(70, 10, 'Observación',1, 0, 'C', 1);
$pdf -> Cell(30, 10, 'Cantidad',1, 1, 'C', 1);


$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
foreach($resultado as $item){
    $pdf->Row(Array(
        $item['codigo'],
        $item['nombre'],
        $item['observacion'],
        $item['cantidad'],
    ));
}


$pdf ->Ln(10);
$pdf -> Cell(190, 10, 'Autorizó ', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(190, 10, '_____________________________', 0, 1, 'C', 0);
$pdf -> Cell(190, 10, 'Nombre y Firma', 0, 0, 'C', 0);

$pdf ->Ln(12);
$pdf -> Cell(70, 10, 'Elaboró y Entregó', 0, 0, 'C', 0);
$pdf -> Cell(170, 10, 'Vo. Bo.', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(70, 10, '_____________________________', 0, 0, 'C', 0);
$pdf -> Cell(170, 10, '_____________________________', 0, 1, 'C', 0);

$pdf -> Cell(70, 10, 'Nombre y Firma', 0, 0, 'C', 0);
$pdf -> Cell(170, 10, 'Nombre y Firma', 0, 0, 'C', 0);

$pdf ->Ln(12);
$pdf -> Cell(190, 10, 'Recibe', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(190, 10, '_____________________________', 0, 1, 'C', 0);
$pdf -> Cell(190, 10, 'Nombre y Firma', 0, 0, 'C', 0);


//$pdf->AddPage();
$pdf->Output('I', 'Reporte_Inventario_'.fecha().'.pdf');
?>