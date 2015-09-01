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

$participante = $_GET['par'];

$oferta = $_GET['ofer'];

$calendario = $_GET['calen'];

$tipo_de_impre = $_GET['tipo'];

$nomb_partci = ucfirst (utf8_decode (ObtNombreSolicitante($participante))).' '.ucfirst (utf8_decode (ObtApellidoSolicitante($participante)));

$nombre = utf8_decode (ObtNombOferAcade($oferta));

$horas_academicas = ObtHorasOferAcade($oferta);

$fecha_calendario = FecDelCalen($calendario);

$tipo = 2;

if ($tipo == 1) {
	$tipo_ele = 'taller';
} else {
	$tipo_ele = 'curso';	
}

$texto_01 = 'Por haber cumplido satisfactoriamente con los requisitos';
$texto_02 = 'academicos correspondientes al '.$tipo_ele.':';

$texto_03 = $nombre;

$texto_04 = 'Horas Academicas: '.utf8_decode ($horas_academicas);

$texto_05 = 'Ofrecido en Caracas el '.$fecha_calendario;

$texto_06 = 'Registrado Bajo';

require('pdf/fpdf.php');

class PDF extends FPDF
{
	
}

// Creación del objeto de la clase heredada
$pdf = new FPDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddFont('courieri','','courieri.phpp');
$pdf->SetFont('Helvetica','B',32);
$pdf->Ln(60);
$pdf->Cell(170, 12, $nomb_partci, 1, 0, 'C');
$pdf->Ln(27);
$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(170, 6, $texto_01, 1, 0, 'C');
$pdf->Ln(6);
$pdf->Cell(170, 6, $texto_02, 1, 0, 'C');
$pdf->Ln(18);
$pdf->SetFont('Helvetica','B',22);
$pdf->Cell(200, 10, $texto_03, 1, 0, 'C');
$pdf->Ln(18);
$pdf->SetFont('courieri','I',7);
$pdf->Cell(40, 40, $texto_06, 1, 0, 'C');
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(180, 7, $texto_04, 1, 0, 'R');
$pdf->Ln(18);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(40, 7, '', 0, 0, 'R');
$pdf->Cell(180, 7, $texto_05, 1, 0, 'R');





$pdf->Output();



mysql_free_result($pre);
?>
