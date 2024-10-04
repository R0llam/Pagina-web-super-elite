<?php

require_once ('fpdf\fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}

include("database2.php");
$conexion=conexion();
$sql3=$SQL="SELECT * FROM precio_b";
$query=mysqli_query($conexion,$sql3);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(20);
// Arial bold 15
$pdf->SetFont('Arial','B',18);

// Movernos a la derecha
$pdf->Cell(60);

// Título
$pdf->Cell(70,10,utf8_decode('Historial del Dólar'),0,0,'C');
// Salto de línea

$pdf->Ln(17);
$pdf->SetFont('Arial','B',10);
$pdf->SetX(12);
$pdf->Cell(93,10,'Precio',1,0,'C',0);
$pdf->Cell(93,10,utf8_decode("Fecha de Modificación"),1,0,'C',0,);
$pdf->SetFont('Arial','',9);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$query->fetch_assoc()) {

    $pdf->Ln(10);
    $pdf->SetX(12);
    $pdf->Cell(93,10,$row['Precio_B'],1,0,'C',0);
    $pdf->Cell(93,10,$row['Fecha_de_modificacion'],1,0,'C',0);
} 


	$pdf->Output();
?>
