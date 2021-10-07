<?php
include('extra-ind.php');
require '../../login/sesion.php';
require '../conexion.php';
require 'cn.php';

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
$pdf->MultiCell(0, 6, 'Por este conducto se reporta el siguiente material existente al día de '.$hoy.
' En el inventario de '.$_POST['nombre'],'.',0,'',false);
$pdf->Ln(8);


$pdf->SetWidths(Array(40,120,30)); //ancho de celda
$pdf->SetAligns(Array('C','L','C')); // alineacion de contenido
$pdf->SetLineHeight(12); // alto de celda


$conexion=ConectarBD();
if(!$conexion){
    print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
    }
$saved = "SELECT * FROM formato WHERE id_formato= 0";
$res=mysqli_query($conexion, $saved);
if($res->num_rows>0){
    $fila=$res->fetch_assoc();
    $rgb=  explode(',',$fila['color']);
    
$pdf->SetFont('Arial','I',12);
$pdf->SetFillColor($rgb[0],$rgb[1],$rgb[2]);
$pdf->SetTextColor(254,254,254);

$productos= $_POST['n-pdf0'];
foreach($_POST as $var=> $valor){                
    if($valor==0){
        print_mensaje('Debes seleccionar un elemento...','index.php');
        return;
    }
    if(substr($var,0,5)=='n-pdf'){
        $productos=$productos.','.$valor;
    }
}

if($_POST['tabla']=="archivo"){
    $pdf -> Cell(30, 10, 'Fecha',1, 0, 'C', 1);
    $pdf -> Cell(80, 10, 'Nombre',1, 0, 'C', 1);
    $pdf -> Cell(40, 10, 'Tipo',1, 0, 'C', 1);    
    $pdf -> Cell(40, 10, 'Coordinación',1, 1, 'C', 1);    
    
    $pdf->SetWidths(Array(30,80,40,40));
    $pdf->SetFont('Arial','',12);
    $pdf->SetTextColor(0,0,0);
    $consulta = "SELECT * FROM ".$_POST['tabla']." WHERE ".$_POST['id_tbl']." IN (".$productos.")";
    $resultado = $conexion -> query($consulta);
    foreach($resultado as $item){
        $pdf->Row(Array(
            $item['fecha'],
            $item['nombre'],
            $item['tipo'],
            $item['coordinacion']
        ));
}
}else{
$pdf -> Cell(40, 10, 'Código',1, 0, 'C', 1);
$pdf -> Cell(120, 10, 'Nombre',1, 0, 'C', 1);
$pdf -> Cell(30, 10, 'Cantidad',1, 1, 'C', 1);


$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);


            
$consulta = "SELECT * FROM ".$_POST['tabla']." WHERE ".$_POST['id_tbl']." IN (".$productos.")";

$resultado = $mysqli -> query($consulta);

foreach($resultado as $item){
    
    $pdf->Row(Array(
        $item['codigo'],
        $item['nombre'].' '.$item['color'].' '.$item['marca'],
        $item['cantidad'],
    ));
}
}

$pdf ->Ln(12);
$pdf -> Cell(70, 10, 'Elaboro', 0, 0, 'C', 0);
$pdf -> Cell(150, 10, 'Vo. Bo.', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(70, 10, '_____________________________', 0, 0, 'C', 0);
$pdf -> Cell(150, 10, '_____________________________', 0, 1, 'C', 0);

$pdf -> Cell(70, 10, $_SESSION['usuario'], 0, 0, 'C', 0);
$pdf -> Cell(150, 10, $fila['vobo'], 0, 0, 'C', 0);

}
//$pdf->AddPage();
$pdf->Output('I', 'Reporte.pdf');
?>