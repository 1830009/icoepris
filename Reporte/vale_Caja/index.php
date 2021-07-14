<?php
include('extra.php');

require 'cn.php';

$pdf = new PDF('L','mm','letter', true);
$pdf -> SetMargins(15,10,15,10);
$pdf->AliasNbPages();
$pdf->AddPage();

$conexion=ConectarBD();
		if(!$conexion){
			print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
			}
			$saved = 'SELECT * FROM archivo WHERE id_archivo= "'.$_GET['x'].'"';
			$res=mysqli_query($conexion, $saved);
			if($res->num_rows>0){
				$fila=$res->fetch_assoc();
                $save = 'SELECT * FROM checklist WHERE id_check= "'.$fila['checklist'].'"';
			    $res2=mysqli_query($conexion, $save);

$pdf->SetFont('Arial','',12);
$pdf -> Cell(150, 10, 'BOLETAS DE INGRESOS: DE LAS COORDINACIONES COMO SU ESTATUS',0, 0, 'C');
$pdf->SetFont('Arial','',22);
$pdf -> Cell(100, 10, 'N°: '.$fila['id_archivo'],0, 1, 'C');
$pdf->Ln(10);

$pdf->SetWidths(Array(35,90,35,35,55)); //ancho de celda
$pdf->SetAligns(Array('C','L','C','C','C')); // alineacion de contenido
$pdf->SetLineHeight(8); // alto de celda


$pdf->SetFont('Arial','I',12);
$pdf->SetFillColor(0,0,254);
$pdf->SetTextColor(254,254,254);
$pdf -> Cell(12, 10, 'N',1, 0, 'C', 1);
$pdf -> Cell(40, 10, 'COORDINACIÓN',1, 0, 'C', 1);
$pdf -> Cell(25, 10, 'BOLETAS',1, 0, 'C', 1);
$pdf -> Cell(25, 10, 'COTEJO',1, 0, 'C', 1);
$pdf -> Cell(30, 10, 'S/SISTEMA',1, 0, 'C', 1);
$pdf -> Cell(30, 10, 'ARCHIVADO',1, 0, 'C', 1);
$pdf -> Cell(25, 10, 'DISCO/R',1, 0, 'C', 1);
$pdf -> Cell(30, 10, 'FOLIOS/DOC',1, 0, 'C', 1);
$pdf -> Cell(35, 10, 'RELACIONADO',1, 1, 'C', 1);

$ancho=[25,25,30,30,25,30,35];

                if($res2->num_rows>0){
                    $c=$res2->fetch_assoc();

                    $coord=["CD. VICTORIA","TAMPICO","MATAMOROS","REYNOSA","NUEVO LAREDO","MANTE","SAN FERNANDO",
                    "JAUMAVE","MIGUEL ALEMAN","VALLE HERMOSO","PADILLA","ALTAMIRA","SANIDAD INTERNA"];     
                               
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
    $bol=array();
    $bol[0]=explode(',',$c['boleta']);
    $bol[1]=explode(',',$c['cotejo']);
    $bol[2]=explode(',',$c['sistema']);
    $bol[3]=explode(',',$c['archivado']);
    $bol[4]=explode(',',$c['disco']);
    $bol[5]=explode(',',$c['folio']);
    $bol[6]=explode(',',$c['relacionado']);
    $bo=array();
    for($i=0;$i<7;$i++){
        $bo[$i]=[0,0,0,0,0,0,0,0,0,0,0,0,0];
        for($j=0;$j<13;$j++){
            if(isset($bol[$i][$j])){
                $a= $bol[$i][$j]!=0 ? $bol[$i][$j]-1 : 0;
                $bo[$i][$a]=$bol[$i][$j];
            }
            else{
                break;
            }
    }
}

    foreach($coord as $j=> $v){
    $pdf -> Cell(12, 8, $j+1,1, 0, 'C', 0);
    $pdf -> Cell(40, 8, $v,1, 0, 'C', 0);    
    for($i=0;$i<7;$i++){
        if(isset($bo[$i][$j])){
            if($bo[$i][$j]!=0){
            $chek='X';
        }else{
            $chek='';
        }
    }
    else{
        $chek='';
    }
        if($i==6)
            $pdf -> Cell($ancho[$i], 8, $chek,1, 1, 'C', 0);        
        else
            $pdf -> Cell($ancho[$i], 8, $chek,1, 0, 'C', 0);
        }
    
}
            
    }
}

//$pdf->AddPage();
$pdf->Output('I', 'Reporte.pdf');
?>