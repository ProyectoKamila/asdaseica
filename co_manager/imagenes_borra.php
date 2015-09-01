<?php

$campo =   $_GET['campo']; 
$carpeta = $_GET['carpeta']; 
$id =      $_GET['id']; 
$imagen =  $_GET['imag']; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Eliminar Imagen</title>
</head>

<body>
<h1>Eliminando</h1>
<img src="../imagenes/<?php echo $carpeta; ?>/<?php echo $imagen; ?>" width="273" height="134" />

<br />

<?php 

echo $campo;

$archivo1 = $imagen;
$direccion = ("../imagenes/".$carpeta."/");

unlink ($direccion.$archivo1);

?>

<META HTTP-EQUIV="Refresh" CONTENT="2; URL=imagenes_busca.php?campo=<?php echo $campo ?>&carpeta=<?php echo $carpeta ?>&id=<?php echo $id ?>">

</body>
</html>
<?php
mysql_free_result($img);
?>
