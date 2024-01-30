<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
// Conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ventas_php";

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
class PDF extends FPDF
{
// Cabecera de página
//Numeros de paginas
//SetTextColor(255,255,255);es RGB extraer colores con GIMP
//SetFillColor()
//SetDrawColor()
//Line(derecha-izquierda, arriba-abajo,ancho,arriba-abajo)
//Color line setDrawColor(61,174,233)
//GetX() || GetY() posiciones en cm
//Grosor SetLineWidth(1)
// SetFont(tipo{COURIER, HELVETICA,ARIAL,TIMES,SYMBOL, ZAPDINGBATS}, estilo[normal,B,I ,A], tamaño)
// Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)
//AddPage(orientacion[PORTRAIT, LANDSCAPE], tamño[A3.A4.A5.LETTER,LEGAL],rotacion)
//Image(ruta, poscisionx,pocisiony,alto,ancho,tipo,link)
//SetMargins(10,30,20,20) luego de addpage
  
function Header()
{
$this->Image('img/logo.png',-1,-1,85);
$this->Image('img\logoPDF2.png',150,15,35);

$this->SetY(40);
$this->SetX(145);
$this->SetFont('Arial','B',12);

$this->SetTextColor(246, 130, 14 );
$this->Cell(50, 8, 'Distribuidora-AUTOCAR',0,1);
$this->SetY(45);
$this->SetX(147);
$this->SetFont('Arial','',8);
$this->Cell(40, 8, 'sobre el parque hurbano');
$this->SetTextColor(30,10,32);
$this->Ln(30);

}

function Footer()
{
    $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("AutoCar © Todos los derechos reservados."),0,0,"C");
        
}
//uykfru
function Body($data)
{
  $this->SetFont('Arial', '', 10);

  foreach ($data as $row) {
      $this->SetX(15);
      $this->SetFillColor(255, 255, 255);
      $this->SetDrawColor(65, 61, 61);
      $this->Cell(12, 8, utf8_decode($row['id']), 'B', 0, 'C', 1);
      $this->Cell(80, 8, utf8_decode($row['nombre']), 'B', 0, 'C', 1);
      $this->Cell(30, 8, utf8_decode('$' . number_format($row['venta'], 2)), 'B', 0, 'C', 1);
      $this->Cell(30, 8, utf8_decode($row['existencia']), 'B', 0, 'C', 1);
      $this->Cell(30, 8, utf8_decode('$' . number_format($row['venta'] * $row['existencia'], 2)), 'B', 1, 'C', 1);
      $this->Ln(0.5);
  }
}

// huyfuyfu
}

// Consultar los datos de la tabla productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
// Crear el PDF y agregar la página
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(500);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

// Cabecera de la tabla
$pdf->SetTextColor(255, 255, 255);  // Establecer el color del texto a blanco
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(12, 12, utf8_decode('ID'), 1, 0, 'C', 1);
$pdf->Cell(80, 12, utf8_decode('Nombre Item'), 1, 0, 'C', 1);
$pdf->Cell(30, 12, utf8_decode('Precio'), 1, 0, 'C', 1);
$pdf->Cell(30, 12, utf8_decode('Stock'), 1, 0, 'C', 1);
$pdf->Cell(30, 12, utf8_decode('Total para Venta'), 1, 1, 'C', 1);

// Cuerpo de la tabla
$pdf->SetTextColor(0, 0, 0);  // Restaurar el color del texto a negro (opcional)
$pdf->Body($data);

$pdf->Output();
?>