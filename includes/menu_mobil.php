<?php 
  
mysql_select_db($database_conexion, $conexion);
$query_redes = "SELECT * FROM tblredes_sociales WHERE tblredes_sociales.intEstado = 1";
$redes = mysql_query($query_redes, $conexion) or die(mysql_error());
$row_redes = mysql_fetch_assoc($redes);
$totalRows_redes = mysql_num_rows($redes);

mysql_select_db($database_conexion, $conexion);
$query_info = "SELECT * FROM tblcontacto";
$info = mysql_query($query_info, $conexion) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);
$totalRows_info = mysql_num_rows($info);
?>


<li><i class="icon-phone2"></i><?php echo $row_info['strTelefono_01']; ?></li>
<li><i class="icon-mail"></i><a href="contacto" class="mail-menu"><?php echo $row_info['strEmail_01']; ?></a></li>

<li><i class="icon-globe"></i>
<?php do { ?>
<a href="<?php echo $row_redes['txtUrl']; ?>" class="mail-menu" target="_blank" title="<?php echo $row_redes['strTitulo']; ?>"><i class="<?php echo $row_redes['strIcon']; ?>"></i></a>
<?php } while ($row_redes = mysql_fetch_assoc($redes)); ?>
<?php
mysql_free_result($redes);

mysql_free_result($info);
?>

</li>
<li><i class="icon-search"></i>
<div class="search-wrap"><input type="text" id="search-text" class="search-txt" name="search-text">
<button id="searchbt" name="searchbt" class="icon-search search-bt"></button></div>
</li>