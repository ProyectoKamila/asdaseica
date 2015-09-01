<meta charset="iso-8859-1">
<?php
mysql_select_db($database_conexion, $conexion);
$query_catego = "SELECT * FROM tbloferta_company WHERE tbloferta_company.intEstado = 1";
$catego = mysql_query($query_catego, $conexion) or die(mysql_error());
$row_catego = mysql_fetch_assoc($catego);
$totalRows_catego = mysql_num_rows($catego);
?>

<?php do { ?>
    <li><a href="ver_company_oferta-<?php echo RemUrl($row_catego['strTitulo']); ?>_<?php echo $row_catego['idCompanias']; ?>"><i class="fa fa-angle-right about-list-arrows"></i><?php echo $row_catego['strTitulo']; ?></a></li>
    <?php } while ($row_catego = mysql_fetch_assoc($catego)); ?>