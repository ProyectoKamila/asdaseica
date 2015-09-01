<meta charset="iso-8859-1" />
<?php $ano2 = 2015;$var_Enero = "0";if (isset($ano2)) {$var_Enero = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Enero = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 01 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Enero, "int"));$Enero = mysql_query($query_Enero, $conexion) or die(mysql_error());$row_Enero = mysql_fetch_assoc($Enero);$totalRows_Enero = mysql_num_rows($Enero);$var_febrero = "0";if (isset($ano2)) {  $var_febrero = $ano2;}mysql_select_db($database_conexion, $conexion);$query_febrero = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 02 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_febrero, "int"));$febrero = mysql_query($query_febrero, $conexion) or die(mysql_error());$row_febrero = mysql_fetch_assoc($febrero);$totalRows_febrero = mysql_num_rows($febrero);$var_Marzo = "0";if (isset($ano2)) {  $var_Marzo = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Marzo = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 03 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Marzo, "int"));$Marzo = mysql_query($query_Marzo, $conexion) or die(mysql_error());$row_Marzo = mysql_fetch_assoc($Marzo);$totalRows_Marzo = mysql_num_rows($Marzo);$var_Abril = "0";if (isset($ano2)) {  $var_Abril = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Abril = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 04 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Abril, "int"));$Abril = mysql_query($query_Abril, $conexion) or die(mysql_error());$row_Abril = mysql_fetch_assoc($Abril);$totalRows_Abril = mysql_num_rows($Abril);$var_Mayo = "0";if (isset($ano2)) { $var_Mayo = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Mayo = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 05 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Mayo, "int"));$Mayo = mysql_query($query_Mayo, $conexion) or die(mysql_error());$row_Mayo = mysql_fetch_assoc($Mayo);$totalRows_Mayo = mysql_num_rows($Mayo);$var_Junio = "0";if (isset($ano2)) {$var_Junio = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Junio = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 06 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Junio, "int"));$Junio = mysql_query($query_Junio, $conexion) or die(mysql_error());$row_Junio = mysql_fetch_assoc($Junio);$totalRows_Junio = mysql_num_rows($Junio);$var_Julio = "0";if (isset($ano2)) {  $var_Julio = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Julio = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 07 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Julio, "int"));$Julio = mysql_query($query_Julio, $conexion) or die(mysql_error());$row_Julio = mysql_fetch_assoc($Julio);$totalRows_Julio = mysql_num_rows($Julio);$var_Agosto = "0";if (isset($ano2)) { $var_Agosto = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Agosto = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 08 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Agosto, "int"));$Agosto = mysql_query($query_Agosto, $conexion) or die(mysql_error());$row_Agosto = mysql_fetch_assoc($Agosto);$totalRows_Agosto = mysql_num_rows($Agosto);$var_Septiembre = "0";if (isset($ano2)) { $var_Septiembre = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Septiembre = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 09 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Septiembre, "int"));$Septiembre = mysql_query($query_Septiembre, $conexion) or die(mysql_error());$row_Septiembre = mysql_fetch_assoc($Septiembre);$totalRows_Septiembre = mysql_num_rows($Septiembre);$var_Octubre = "0";if (isset($ano2)) { $var_Octubre = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Octubre = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 10 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Octubre, "int"));$Octubre = mysql_query($query_Octubre, $conexion) or die(mysql_error());$row_Octubre = mysql_fetch_assoc($Octubre);$totalRows_Octubre = mysql_num_rows($Octubre);$var_Noviembre = "0";if (isset($ano2)) { $var_Noviembre = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Noviembre = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 11 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Noviembre, "int"));$Noviembre = mysql_query($query_Noviembre, $conexion) or die(mysql_error());$row_Noviembre = mysql_fetch_assoc($Noviembre);$totalRows_Noviembre = mysql_num_rows($Noviembre);$var_Diciembre = "0";if (isset($ano2)) { $var_Diciembre = $ano2;}mysql_select_db($database_conexion, $conexion);$query_Diciembre = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intMes = 12 AND tbloferta_academica.intano = %s ORDER BY tbloferta_academica.idOferta", GetSQLValueString($var_Diciembre, "int"));$Diciembre = mysql_query($query_Diciembre, $conexion) or die(mysql_error());$row_Diciembre = mysql_fetch_assoc($Diciembre);$totalRows_Diciembre = mysql_num_rows($Diciembre);
if ($totalRows_Enero > 0) {?>
<section class="section active">
<p class="title"><a href="#">Eventos de Enero</a></p>
<div class="content">
  <ul class="side-nav">
	<?php do { ?>
    <li><a href="ver_ofer-<?php echo RemUrl($row_Enero['strTitulo']); ?>_<?php echo $row_Enero['idOferta']; ?>"><?php echo $row_Enero['strTitulo']; ?></a></li>
    <?php } while ($row_Enero = mysql_fetch_assoc($Enero)); ?>
  </ul>
</div>
</section>
<?php } if ($totalRows_febrero > 0) { ?>
  <section class="section active">
    <p class="title"><a href="#">Eventos de Febrero</a></p>
    <div class="content">
      <ul class="side-nav">
        <?php do { ?>
          <li><a href="ver_ofer-<?php echo RemUrl($row_febrero['strTitulo']); ?>_<?php echo $row_febrero['idOferta']; ?>"><?php echo $row_febrero['strTitulo']; ?></a></li>
          <?php } while ($row_febrero = mysql_fetch_assoc($febrero)); ?>
      </ul>
    </div>
  </section>
<?php } if ($totalRows_Marzo > 0) { ?>  
<section class="section active">
<p class="title"><a href="#">Eventos de Marzo</a></p>
<div class="content">
<ul class="side-nav">
  <?php do { ?>
	<li><a href="ver_ofer-<?php echo RemUrl($row_Marzo['strTitulo']); ?>_<?php echo $row_Marzo['idOferta']; ?>"><?php echo $row_Marzo['strTitulo']; ?></a></li>
	<?php } while ($row_Marzo = mysql_fetch_assoc($Marzo)); ?>
</ul>
</div>
</section>
<?php } if ($totalRows_Abril > 0) { ?>
  <section class="section active">
    <p class="title"><a href="#">Eventos de Abril</a></p>
    <div class="content">
      <ul class="side-nav">
        <?php do { ?>
          <li><a href="ver_ofer-<?php echo RemUrl($row_Abril['strTitulo']); ?>_<?php echo $row_Abril['idOferta']; ?>"><?php echo $row_Abril['strTitulo']; ?></a></li>
          <?php } while ($row_Abril = mysql_fetch_assoc($Abril)); ?>
        </ul>
      </div>
  </section>
  <?php } do { if ($totalRows_Mayo > 0) { ?>
    <section class="section active">
      <p class="title"><a href="#">Eventos de Mayo</a></p>
      <div class="content">
        <ul class="side-nav">
          <li><a href="ver_ofer-<?php echo RemUrl($row_Mayo['strTitulo']); ?>_<?php echo $row_Mayo['idOferta']; ?>"><?php echo $row_Mayo['strTitulo']; ?></a></li>
        </ul>
      </div>
    </section>
    <?php } } while ($row_Mayo = mysql_fetch_assoc($Mayo)); if ($totalRows_Junio > 0) { ?>
  <section class="section active">
    <p class="title"><a href="#">Eventos de Junio</a></p>
    <div class="content">
      <ul class="side-nav">
        <?php do { ?>
          <li><a href="ver_ofer-<?php echo RemUrl($row_Junio['strTitulo']); ?>_<?php echo $row_Junio['idOferta']; ?>"><?php echo $row_Junio['strTitulo']; ?></a></li>
          <?php } while ($row_Junio = mysql_fetch_assoc($Junio)); ?>
        </ul>
      </div>
  </section>
  <?php } if ($totalRows_Julio > 0) { ?>
  <section class="section active">
    <p class="title"><a href="#">Eventos de Julio</a></p>
    <div class="content">
      <ul class="side-nav">
        <?php do { ?>
          <li><a href="ver_ofer-<?php echo RemUrl($row_Julio['strTitulo']); ?>_<?php echo $row_Julio['idOferta']; ?>"><?php echo $row_Julio['strTitulo']; ?></a></li>
          <?php } while ($row_Julio = mysql_fetch_assoc($Julio)); ?>
        </ul>
      </div>
  </section>
  <?php } if ($totalRows_Agosto > 0) { ?>
  <section class="section active">
    <p class="title"><a href="#">Eventos de Agosto</a></p>
    <div class="content">
      <ul class="side-nav">
        <?php do { ?>
          <li><a href="ver_ofer-<?php echo RemUrl($row_Agosto['strTitulo']); ?>_<?php echo $row_Agosto['idOferta']; ?>"><?php echo $row_Agosto['strTitulo']; ?></a></li>
          <?php } while ($row_Agosto = mysql_fetch_assoc($Agosto)); ?>
        </ul>
      </div>
  </section>
  <?php } if ($totalRows_Septiembre > 0) { ?>
  <section class="section active">
    <p class="title"><a href="#">Eventos de Septiembre</a></p>
    <div class="content">
      <ul class="side-nav">
        <?php do { ?>
          <li><a href="ver_ofer-<?php echo RemUrl($row_Septiembre['strTitulo']); ?>_<?php echo $row_Septiembre['idOferta']; ?>"><?php echo $row_Septiembre['strTitulo']; ?></a></li>
          <?php } while ($row_Septiembre = mysql_fetch_assoc($Septiembre)); ?>
        </ul>
      </div>
  </section>
  <?php } if ($totalRows_Octubre > 0) { ?>
  <section class="section active">
    <p class="title"><a href="#">Eventos de Octubre</a></p>
    <div class="content">
      <ul class="side-nav">
        <?php do { ?>
          <li><a href="ver_ofer-<?php echo RemUrl($row_Octubre['strTitulo']); ?>_<?php echo $row_Octubre['idOferta']; ?>"><?php echo $row_Octubre['strTitulo']; ?></a></li>
          <?php } while ($row_Octubre = mysql_fetch_assoc($Octubre)); ?>
        </ul>
      </div>
  </section>
  <?php } if ($totalRows_Noviembre > 0) { ?>
<section class="section active">
<p class="title"><a href="#">Eventos de Noviembre</a></p>
<div class="content">
<ul class="side-nav">
  <?php do { ?>
    <li><a href="ver_ofer-<?php echo RemUrl($row_Noviembre['strTitulo']); ?>_<?php echo $row_Noviembre['idOferta']; ?>"><?php echo $row_Noviembre['strTitulo']; ?></a></li>
    <?php } while ($row_Noviembre = mysql_fetch_assoc($Noviembre)); ?>
</ul>
</div>
</section>
<?php } if ($totalRows_Diciembre > 0) { ?>
<section class="section active">
<p class="title"><a href="#">Eventos de Diciembre</a></p>
<div class="content">
<ul class="side-nav">
    <?php do { ?>
      <li><a href="ver_ofer-<?php echo RemUrl($row_Diciembre['strTitulo']); ?>_<?php echo $row_Diciembre['idOferta']; ?>"><?php echo $row_Diciembre['strTitulo']; ?></a></li>
      <?php } while ($row_Diciembre = mysql_fetch_assoc($Diciembre)); ?>
</ul>
</div>
</section>
<?php } mysql_free_result($Enero);mysql_free_result($febrero);mysql_free_result($Marzo);mysql_free_result($Abril);mysql_free_result($Mayo);mysql_free_result($Junio);mysql_free_result($Julio);mysql_free_result($Agosto);mysql_free_result($Septiembre);mysql_free_result($Octubre);mysql_free_result($Noviembre);mysql_free_result($Diciembre);
?>
