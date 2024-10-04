<?php

require_once ('fpdf\fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    //$this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño


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
		$id=$_GET['id'];
		$query=listar_reservas2($conexion,$id);
		$row = mysqli_fetch_assoc($query);
		$referencia=$row ['Referencia'];
		$referencia_C=$row['ID'];
		$total=$row['total'];
		$total2=$row['total2'];
		$query3=listar_pedido($conexion,$referencia);
		$query4=listar_pedido2($conexion,$referencia);
		$query2=listar_U($conexion,$referencia_C);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(63);
$pdf->Cell(70,10,'Detalles de Reserva ',0,0,'C');
$pdf->SetFont('Arial','B',13);
$pdf->Ln(20);
$pdf->Cell(2);
$pdf->Cell(189,10,'Datos del Usuario',1,0,'C',0);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',9);
$pdf->SetX(12);
$pdf->Cell(63,10,'Nombre',1,0,'C',0);
$pdf->Cell(63,10,'Apellido',1,0,'C',0,);
$pdf->Cell(63,10,'Correo',1,0,'C',0,);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row2 = mysqli_fetch_assoc($query2)) {
    $Nombre = $row2 ['Nombre'];
    $Apellido=$row2['Apellido'];
    $Correo=$row2['Correo_Electronico'];
    $pdf->SetFont('Arial','',8);
    $pdf->Ln(10);
    $pdf->SetX(12);
    $pdf->Cell(63,10,utf8_decode($row2['Nombre']),1,0,'C',0);
    $pdf->Cell(63,10,utf8_decode($row2['Apellido']),1,0,'C',0);
    $pdf->Cell(63,10,$row2['Correo_Electronico'],1,0,'C',0);
} 
    $pdf->Ln(18);
    $pdf->SetFont('Arial','B',13);
    $pdf->SetX(10);
    $pdf->Cell(2);
    $pdf->Cell(189,10,'Productos Reservados',1,0,'C',0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',9);
    $pdf->SetX(12);
    $pdf->Cell(52,10,'Nombre',1,0,'C',0);
    $pdf->Cell(25,10,'Cantidad',1,0,'C',0);
    $pdf->Cell(25,10,'Precio $',1,0,'C',0);
    $pdf->Cell(25,10,'Precio Bs',1,0,'C',0);
    $pdf->Cell(31,10,'Precio Total $',1,0,'C',0);
    $pdf->Cell(31,10,'Precio Total Bs',1,0,'C',0);
    if($query3 -> num_rows >0){
        while ($row3 = mysqli_fetch_assoc($query3)) {
            $id=$row3['ID_P'];
            $query8= listar_productos2($conexion,$id);
            $row8= mysqli_fetch_assoc($query8);
            if(!empty($row8['NombreP'])){
                $Nombre2 = $row8 ['NombreP'];
                $archivo2=$row8['archivoBLOB'];
            }
            else{
                $Nombre2= 'Producto elimidado';
                $archivo2= 'Producto eliminado';
            }
            
            $Cantidad=$row3['Cantidad_Pedido'];
            $Precio=$row3['Precio_P'];
            $Precio_B=$row3['Precio_B'];
            $total_precio=$row3['total_precio'];
            $total_precio_BS=$row3['total_precio_BS'];

            $pdf->Ln(10);
            $pdf->SetFont('Arial','',6);
            $pdf->SetX(12);
            $pdf->Cell(52,10,utf8_decode($Nombre2),1,0,'C',0);
            $pdf->Cell(25,10,utf8_decode($Cantidad),1,0,'C',0);
            $pdf->Cell(25,10,utf8_decode("$Precio $"),1,0,'C',0);
            $pdf->Cell(25,10,utf8_decode("$Precio_B Bs"),1,0,'C',0);
            $pdf->Cell(31,10,utf8_decode("$total_precio $"),1,0,'C',0);
            $pdf->Cell(31,10,utf8_decode("$total_precio_BS Bs"),1,0,'C',0);
        }
    }
    else{
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',9);
        $pdf->SetX(12);
        $pdf->Cell(189,10,utf8_decode('No se Reservaron Productos'),1,0,'C',0);     
    }
    $pdf->Ln(18);
    $pdf->SetFont('Arial','B',13);
    $pdf->SetX(10);
    $pdf->Cell(2);
    $pdf->Cell(189,10,'Ofertas Reservadas',1,0,'C',0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',9);
    $pdf->SetX(12);
    $pdf->Cell(69,10,'Nombre',1,0,'C',0);
    $pdf->Cell(40,10,'Cantidad',1,0,'C',0);
    $pdf->Cell(40,10,'Precio $',1,0,'C',0);
    $pdf->Cell(40,10,'Precio Bs',1,0,'C',0);
    if($query4 -> num_rows >0){
        while ($row4 = mysqli_fetch_assoc($query4)) {
            $id=$row4 ['ID_Oferta'];
            $query7=listar_Ofertas2($conexion,$id);
            $row7= mysqli_fetch_assoc($query7);
            if(!empty($row7['Nombre_Oferta'])){
                $Nombre = $row7 ['Nombre_Oferta'];
                $archivo=$row7 ['Imagen_de_Oferta'];
            }
            else{
                $Nombre= 'Oferta elimidada';
                $archivo= 'Oferta eliminada';
            }
            $Cantidad=$row4['Cantidad_Pedido_O'];
            $Precio=$row4['Precio_O'];
            $Precio_B=$row4['Precio_O_B'];
            $total_precio=$row4['Total_precio_o'];
            $total_precio_BS=$row4['Total_precio_bs_o'];

            $pdf->Ln(10);
            $pdf->SetFont('Arial','',6);
            $pdf->SetX(12);
            $pdf->Cell(69,10,utf8_decode($Nombre),1,0,'C',0);
            $pdf->Cell(40,10,utf8_decode($Cantidad),1,0,'C',0);
            $pdf->Cell(40,10,utf8_decode("$total_precio $"),1,0,'C',0);
            $pdf->Cell(40,10,utf8_decode("$total_precio_BS Bs"),1,0,'C',0);
        }
    }
    else{
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',9);
        $pdf->SetX(12);
        $pdf->Cell(189,10,utf8_decode('No se Reservaron Ofertas'),1,0,'C',0);     
    }
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetX(2);
    $pdf->Cell(135,10,utf8_decode("Total en Dólares: $total $"),0,0,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetX(12);
    $pdf->Cell(260,10,utf8_decode("Total en Bolívares: $total2 Bs"),0,0,'C');
    $pdf->Ln(12);
	$pdf->Output();
?>