<?php  
mysql_select_db($database_conexion, $conexion);
$query_redes = "SELECT * FROM tblredes_sociales WHERE tblredes_sociales.intEstado = 1";
$redes = mysql_query($query_redes, $conexion) or die(mysql_error());
$row_redes = mysql_fetch_assoc($redes);
$totalRows_redes = mysql_num_rows($redes);
?>
<?php do { ?>
  <li><a href="<?php echo $row_redes['txtUrl']; ?>" target="_blank"><i class="<?php echo $row_redes['strI_clae']; ?>" id="<?php echo $row_redes['idUrl']; ?>" data-original-title="<?php echo $row_redes['strTitulo']; ?>" title="<?php echo $row_redes['strTitulo']; ?>"></i></a></li>
  <?php } while ($row_redes = mysql_fetch_assoc($redes)); ?>
<?php
mysql_free_result($redes);
?>
