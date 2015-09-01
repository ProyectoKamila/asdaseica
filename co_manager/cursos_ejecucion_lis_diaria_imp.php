<?php require_once('../Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$var_listas = "0";
if (isset($_GET['li'])) {
  $var_listas = $_GET['li'];
}
$cale_listas = "0";
if (isset($_GET['cal'])) {
  $cale_listas = $_GET['cal'];
}
mysql_select_db($database_conexion, $conexion);
$query_listas = sprintf("SELECT * FROM tblcursos_aseica_participantes WHERE tblcursos_aseica_participantes.intCurso = %s AND tblcursos_aseica_participantes.intCalendario = %s AND tblcursos_aseica_participantes.intEstado = 10", GetSQLValueString($var_listas, "int"),GetSQLValueString($cale_listas, "int"));
$listas = mysql_query($query_listas, $conexion) or die(mysql_error());
$row_listas = mysql_fetch_assoc($listas);
$totalRows_listas = mysql_num_rows($listas);

//   ------------------------------------

require('pdf/fpdf.php');

class PDF extends FPDF
{
	
// Cabecera de página

function Header()
{
	$titulo = 'LISTA DE ASISTENCIA';
	$FECHA_HOY = 'Fecha: '.date('d-m-Y');
    // Logo
    $this->Image('../imagenes/logo/logo-pequeno-2.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
    $this->Cell(150, 10,$titulo, 0);
	// Salto de línea
    $this->Ln(5);
	// Arial bold 15
    $this->SetFont('Arial','B',14);
	// Movernos a la derecha
    $this->Cell(40);
	// Fecha
	$this->Cell(1, 20,$FECHA_HOY, 0);
    // Salto de línea
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$oferta = utf8_decode('Lista de los Participantes Oferta: '.ObtNombOferAcade($_GET['li']).' Fecha: '.FecDelCalen($_GET['cal']));
$Dictado = 'Facilitador: ';
// Creación del objeto de la clase heredada
$pdf = new PDF('p','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(100, 8, $oferta, 0);
$pdf->Ln(8);
$pdf->Cell(100, 8, $Dictado, 0);
$pdf->Ln(12);

$alto = 8;

$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(0, 0, 255);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(8, $alto, utf8_decode('N°'), 1, 0, 'C', True);
$pdf->Cell(90, $alto, 'Nombres y Apellidos.', 1, 0, 'C', True);
$pdf->Cell(30, $alto, 'C.I', 1, 0, 'C', True);
$pdf->Cell(60, $alto, 'Firma', 1, 0, 'C', True);

$pdf->Ln($alto);

do { 
$tota = 01;
$nombre = ucfirst(strtolower(utf8_decode(ObtNombreSolicitante($row_listas['intPaticiapante']).' '.ObtApellidoSolicitante($row_listas['intPaticiapante']))));
$cedula = ObtCedulaSolicitante($row_listas['intPaticiapante']);

$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(8, $alto, $tota, 1, 0, 'C');
$pdf->Cell(90, $alto, $nombre, 1, 0, 'C');
$pdf->Cell(30, $alto, $cedula, 1, 0, 'C');
$pdf->Cell(60, $alto, '', 1, 0, 'C');

$tota = $tota + 1;
} while ($row_listas = mysql_fetch_assoc($listas)); 
 
$pdf->Ln($alto);



$pdf->Output();



mysql_free_result($listas);
?>