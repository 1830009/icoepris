<?php
    error_reporting(0);
    require '../../login/sesion.php';
    include('extra.php');
    require '../conexion.php';
    $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
        }
    $consulta = "SELECT * FROM ".$_GET['x']." WHERE oculto=0";
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
    $pdf->MultiCell(0, 6, 'Por este conducto se muestra el Inventario total existente a la fecha en que se emite este reporte.',0,'',false);
    $pdf->Ln(8);


    $pdf->SetWidths(Array(40,120,30)); //ancho de celda
    $pdf->SetAligns(Array('C','L','C')); // alineacion de contenido
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
    $pdf->SetTextColor(254,254,254);
    
    if($_GET['x']=="archivo"){
        $pdf -> Cell(30, 10, 'Fecha',1, 0, 'C', 1);
        $pdf -> Cell(80, 10, 'Nombre',1, 0, 'C', 1);
        $pdf -> Cell(40, 10, 'Tipo',1, 0, 'C', 1);    
        $pdf -> Cell(40, 10, 'Coordinación',1, 1, 'C', 1);    
        
        $pdf->SetWidths(Array(30,80,40,40));
        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
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
    $resultado = $conexion -> query($consulta);
    foreach($resultado as $item){
        $pdf->Row(Array(
            $item['codigo'],
            $item['nombre'].' '.$item['color'].' '.$item['marca'],
            $item['cantidad'],
        ));
    }

}
    $pdf ->Ln(12);
    $pdf -> Cell(70, 10, 'Elaboró y Entregó', 0, 0, 'C', 0);
    $pdf -> Cell(170, 10, 'Vo. Bo.', 0, 1, 'C', 0);
    $pdf ->Ln(8);
    $pdf -> Cell(70, 10, '_____________________________', 0, 0, 'C', 0);
    $pdf -> Cell(170, 10, '_____________________________', 0, 1, 'C', 0);

    $pdf -> Cell(70, 10, $_SESSION['usuario'], 0, 0, 'C', 0);
    $pdf -> Cell(150, 10, $fila['vobo'], 0, 0, 'C', 0);

    $pdf ->Ln(12);
    }

    //$pdf->AddPage();
    $pdf->Output('I', 'Reporte_Inventario_'.fecha().'.pdf');
?>