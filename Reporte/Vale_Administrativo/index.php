<?php
include('extra.php');
require '../../login/sesion.php';
require 'cn.php';
require '../conexion.php';
$consulta = "SELECT * FROM archivo WHERE id_archivo=".$_GET['x'];
$resultado = $mysqli -> query($consulta);


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
$pdf->MultiCell(0, 6, 'Por este conducto, se reporta la eistencia del siguiente elemento almacenado en el área de admnistrativos.',0,'',false);
$pdf->Ln(8);


$pdf->SetWidths(Array(30,60,70,30)); //ancho de celda
$pdf->SetAligns(Array('C','L','L','C')); // alineacion de contenido
$pdf->SetLineHeight(5); // alto de celda

$conexion=ConectarBD();
    if(!$conexion){
        print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
        }
$saved = "SELECT * FROM formato WHERE id_formato= 0";
$res=mysqli_query($conexion, $saved);
if($res->num_rows>0){
    $fila=$res->fetch_assoc();
    $rgb=  explode(',',$fila['color']);
$pdf->SetFont('Arial','I',14);
$pdf->SetFillColor($rgb[0],$rgb[1],$rgb[2]);
$pdf->SetFont('Arial','I',14);

$pdf->SetTextColor(254,254,254);
$pdf -> Cell(190, 10, 'Nombre',1, 1, 'C', 1);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
foreach($resultado as $item){
    $pdf->Row(Array(
        $item['nombre'],
    ));
}

$pdf->Ln(7);

$pdf->SetFont('Arial','I',14);
$pdf->SetFillColor($rgb[0],$rgb[1],$rgb[2]);
$pdf->SetTextColor(254,254,254);
$pdf -> Cell(95, 10, 'Fecha',1, 0, 'C', 1);
$pdf -> Cell(95, 10, 'Categoría',1, 1, 'C', 1);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
foreach($resultado as $item){
    $pdf->Row(Array(
        $item['fecha'],
        $item['categoria'],
    ));
}
$pdf->Ln(7);

$pdf->SetTextColor(254,254,254);
$pdf -> Cell(190, 10, 'Coordinación',1, 1, 'C', 1);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
foreach($resultado as $item){
    $pdf->Row(Array(
        $item['coordinacion'],
    ));
}
$pdf->Ln(7);

$pdf->SetFont('Arial','I',14);
$pdf->SetFillColor($rgb[0],$rgb[1],$rgb[2]);
$pdf->SetTextColor(254,254,254);
$pdf -> Cell(190, 10, 'Observación',1, 1, 'C', 1);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
foreach($resultado as $item){
    $pdf->Row(Array(
        $item['observacion'],
    ));
}
$pdf->SetFont('Arial','',10);
$pdf ->Ln(8);
$pdf -> Cell(190, 10, 'Autorizó', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(190, 10, '_____________________________', 0, 1, 'C', 0);
$pdf -> Cell(190, 10,$fila['autorizo'] , 0, 0, 'C', 0);

$pdf ->Ln(12);
$pdf -> Cell(70, 10, 'Entregó', 0, 0, 'C', 0);
$pdf -> Cell(170, 10, 'Vo. Bo.', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(70, 10, '_____________________________', 0, 0, 'C', 0);
$pdf -> Cell(170, 10, '_____________________________', 0, 1, 'C', 0);

$pdf -> Cell(70, 10, $_SESSION['usuario'], 0, 0, 'C', 0);
$pdf -> Cell(170, 10, $fila['vobo'], 0, 0, 'C', 0);

}

//$pdf->AddPage();
$pdf->Output('I', 'Reporte.pdf');
?>