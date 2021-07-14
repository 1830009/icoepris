<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('img/logo.png',20,8,33);
        $this->Image('img/esc.png',175,5,20);
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
        $this->Image('img/coepris.png',120,273,90);
    }
}

$pdf = new PDF();
$pdf->SetLeftMargin(30);
$pdf->SetTopMargin(25);
$pdf->SetRightMargin(30);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',12);
$pdf->Cell(130);
date_default_timezone_set('America/Monterrey');
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
setlocale(LC_ALL,"es_ES");
$hoy = strftime("%d de ". $meses[date('n')-1]." del %Y");
$pdf->Cell(30,10,'Cd. Victoria Tamaulipas, a '. $hoy,0,1,'R');
$pdf->Ln(8);

$pdf->SetFont('Arial','B',20);
$pdf->Cell(60);
$pdf->Cell(30,10,'Reporte de productos',0,0,'C');
$pdf->Ln(20);

$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0, 6, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae quisquam veniam temporibus est. Nam possimus vitae magni, fuga quaerat deleniti quasi libero aut et voluptatum aliquid recusandae itaque cum placeat.',0,'',false);
$pdf->SetLeftMargin(10);
$pdf->Ln();
// Iniciar la construcción de la Tabla
//Encabezados

$pdf->SetFont('Arial','B',12);

$pdf -> Cell(10, 10, 'ID',1, 0, 'C', 0);
$pdf -> Cell(50, 10, 'Nombre',1, 0, 'C', 0);
$pdf -> Cell(20, 10, 'Cantidad',1, 0, 'C', 0);
$pdf -> Cell(20, 10, 'Unidad',1, 0, 'C', 0);
$pdf -> Cell(40, 10, 'Marcas',1, 0, 'C', 0);
$pdf -> Cell(50, 10, 'Descripcion',1, 0, 'C', 0);

require '../bd/conectar.php';
$mysqli = ConectarBD();
$consulta = "SELECT * FROM proyecto_federal";
$resultado = $mysqli -> query($consulta);

$pdf->SetFont('Arial','',11);
while($row = $resultado -> fetch_assoc()){
    $pdf->Ln(10);
    $pdf -> Cell(10, 10, $row['id_federal'],1, 0, 'C', 0);
    $pdf -> Cell(50, 10, $row['nombre'],1, 0, 'C', 0);
    $pdf -> Cell(20, 10, $row['cantidad'],1, 0, 'C', 0);
    $pdf -> Cell(20, 10, $row['unidad'],1, 0, 'C', 0);
    $pdf -> Cell(40, 10, $row['marca'],1, 0, 'C', 0);
    $pdf -> Cell(50, 10, $row['descripcion'],1, 0, 'C', 0);
}

$pdf->SetLeftMargin(30);
$pdf ->Ln(30);
$pdf -> Cell(70, 10, 'Recibio', 0, 0, 'C', 0);
$pdf -> Cell(90, 10, 'Entrego', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(70, 10, '_____________________________', 0, 0, 'C', 0);
$pdf -> Cell(90, 10, '_____________________________', 0, 1, 'C', 0);

$pdf -> Cell(70, 10, 'Nombre y Firma', 0, 0, 'C', 0);
$pdf -> Cell(90, 10, 'Nombre y Firma', 0, 0, 'C', 0);

$pdf ->Ln(20);
$pdf -> Cell(150, 10, 'Autorizo', 0, 1, 'C', 0);
$pdf ->Ln(8);
$pdf -> Cell(150, 10, '_____________________________', 0, 1, 'C', 0);
$pdf -> Cell(150, 10, 'Nombre y Firma', 0, 0, 'C', 0);

//$pdf->AddPage();
$pdf->Output('I', 'Reporte.pdf');
?>