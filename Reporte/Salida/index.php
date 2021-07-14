<?php
function pdfSalida($tabla,$id_tbl){
include('extra.php');

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
$pdf->MultiCell(0, 6, 'Por este conducto entrego el siguiente material, a '.$_POST['recibe'].'
del área '.$_POST['area'].'.',0,'',false);
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
    
$pdf->SetFont('Arial','I',12);
$pdf->SetFillColor($rgb[0],$rgb[1],$rgb[2]);
}
$pdf->SetTextColor(254,254,254);
$pdf -> Cell(30, 10, 'Código',1, 0, 'C', 1);
$pdf -> Cell(60, 10, 'Nombre',1, 0, 'C', 1);
$pdf -> Cell(70, 10, 'Observación',1, 0, 'C', 1);
$pdf -> Cell(30, 10, 'Cantidad',1, 1, 'C', 1);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);

$conexion=ConectarBD();
    if(!$conexion){
        print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
        }
        $i=$x=0;
        foreach($_POST as $var=> $valor){                
            if($valor==0){
                print_mensaje('Debes seleccionar un elemento...','index.php');
                return;
            }
            if(substr($var,0,5)=='n-sld'){
                $sel[$i]= $valor;
                $i++;
            }
            if(substr($var,0,5)=='c-sld'){
                $cant[$x]=$valor;
                $x++;
            }
                 
        }
        $c=0;
foreach($sel as $val){
    $consulta = "SELECT * FROM ".$tabla." WHERE ".$id_tbl." = ".$val;
    $resultado=mysqli_query($conexion, $consulta);

    foreach($resultado as $item){
    $pdf->Row(Array(
        $item['codigo'],
        $item['nombre'],
        $item['color'].' '.$item['marca'],
        $cant[$c],
    ));
    }
    $c+=1;
}

$saved = "SELECT * FROM formato WHERE id_formato= 0";
$res=mysqli_query($conexion, $saved);
if($res->num_rows>0){
    $fila=$res->fetch_assoc();
$pdf ->Ln(10);
$pdf -> Cell(190, 10, 'Autorizó', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf->SetFont('Arial','',10);
    $linea='___________________________________';//35
    $pdf -> Cell(190, 10, $linea, 0, 1, 'C', 0);
    $pdf -> Cell(190, 10, $fila['autorizo'], 0, 0, 'C', 0);
    $pdf ->Ln(12);
    $pdf->SetFont('Arial','b',10);
    $pdf -> Cell(70, 10, 'Elaboró y Entregó', 0, 0, 'C', 0);
    $pdf -> Cell(150, 10, 'Vo.Bo.:', 0, 1, 'C', 0);
    $pdf ->Ln(8);
    $pdf->SetFont('Arial','',10);
    $pdf -> Cell(70, 10, $linea, 0, 0, 'C', 0);
    $pdf -> Cell(150, 10, $linea, 0, 1, 'C', 0);
    $pdf -> Cell(70, 10, $_SESSION['usuario'], 0, 0, 'C', 0);
    $pdf -> Cell(150, 10,$fila['vobo'] , 0, 0, 'C', 0);
}
    $pdf ->Ln(6);
    $pdf -> Cell(70, 10, 'Responsable del Área de Almacén', 0, 0, 'C', 0);
    
    
    $pdf -> Cell(150, 10, 'Jefe del Departamento Administrativo COEPRIS', 0, 0, 'C', 0);
    $pdf ->Ln(12);
    $pdf->SetFont('Arial','b',10);
    $pdf -> Cell(190, 10, 'Recibe:', 0, 1, 'C', 0);
    $pdf->SetFont('Arial','',10);
    $pdf ->Ln(8);

    $pdf -> Cell(190, 10, $linea, 0, 1, 'C', 0);
    $pdf -> Cell(190, 10, $_POST['recibe'], 0, 0, 'C', 0);
//$pdf->AddPage();
$pdf->Output('I', 'Reporte.pdf');
}
?>