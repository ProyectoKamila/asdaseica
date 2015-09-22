<?php  mysql_select_db($database_conexion, $conexion);$query_contacto = "SELECT * FROM tblcontacto";$contacto = mysql_query($query_contacto, $conexion) or die(mysql_error());$row_contacto = mysql_fetch_assoc($contacto);$totalRows_contacto = mysql_num_rows($contacto);$var_pensamiento = "0";if (isset($resu2)) { $var_pensamiento = $resu2;}mysql_select_db($database_conexion, $conexion);$query_pensamiento = sprintf("SELECT * FROM tblpensamiento WHERE tblpensamiento.intDia = %s", GetSQLValueString($var_pensamiento, "int"));$pensamiento = mysql_query($query_pensamiento, $conexion) or die(mysql_error());$row_pensamiento = mysql_fetch_assoc($pensamiento);$totalRows_pensamiento = mysql_num_rows($pensamiento);?>
<!--Foot widget-->
<div class="col-xs-12 col-sm-6 col-md-4 foot-widget">
<a href="contacto"><div class="foot-logo col-xs-12 no-pad"><img src="imagenes/logo/foot-logo.png"></div></a>

<address class="foot-address">
<div class="col-xs-12 no-pad"><i class="icon-globe address-icons"></i><?php echo $row_contacto['txtDireccion']; ?><br />
<?php echo $row_contacto['strHorario']; ?></div>
<div class="col-xs-12 no-pad"><i class="icon-phone2 address-icons"></i><?php echo $row_contacto['strTelefono_01']; ?> / <?php echo $row_contacto['strTelefono_02']; ?></div>
<div class="col-xs-12 no-pad"><i class="icon-mail address-icons"></i>
<?php if ($row_contacto['strEmail_01'] != '') { ?>
<?php echo $row_contacto['strEmail_01']; ?> 
<?php } ?> / <?php if ($row_contacto['strEmail_02'] != '') { ?>
<?php echo $row_contacto['strEmail_02']; ?>
<?php } ?>
</div>
</address>
</div>
        
<!--Foot widget-->
<div class="col-xs-12 col-sm-6 col-md-4 recent-post-foot foot-widget">
<!-- www.intagme.com -->
<iframe src="http://www.intagme.com/in/?u=YXNlaWNhZGV2emxhfHNsfDMwMHw0fDJ8fG5vfDV8dW5kZWZpbmVkfHllcw==" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:305px; height: 305px" ></iframe>
</div>


<!--Foot widget-->
<div class="col-xs-12 col-sm-6 col-md-4 foot-widget">
<div class="foot-widget-title" id="boletin"> REGISTRATE</div>
 <p>Enterate de lo más importate del mundo Gerencial</p>
<div class="news-subscribe">
<form action="inscripcion_boletin" method="post" name="form1">

<label for="titulo" class="news-button" >Titulo</label>
<select name="titulo" class="news-tb" >
<option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Sr.</option>
<option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Srta.</option>
<option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Sra.</option>
</select>
<div class="clearfix"></div>
<label for="nombre" class="news-button">Nombre</label>
<input type="text" class="news-tb" name="nombre" id="nombre" placeholder="Nombre"/>
<div class="clearfix"></div>
<label for="apellido" class="news-button">Apellido</label>
<input type="text" class="news-tb" name="apellido" id="apellido" placeholder="apellido"/>
<div class="clearfix"></div>
<input name="email" type="text" class="news-tb" id="email" placeholder="Email" />
<button class="news-button">Suscribirse</button>
<input type="hidden" name="MM_insert" value="form1">
</form>
</div>

<div class="foot-widget-title">social media</div>
<div class="social-wrap">
<ul>
<?php include("includes/redes_sociales.php"); ?>
</ul>
</div>
</div>  
      
<!--Foot widget
<div class="col-xs-12 col-sm-6 col-md-3 recent-post-foot foot-widget">
<div class="foot-widget-title">Recent Posts</div>
<ul>
<li><a href="#">Consecte tur adipiscing elit ut eunt<br /><span class="event-date">3 days ago</span></a></li>
<li><a href="#">Fusce vel tempus augue nunc<br /><span class="event-date">5 days ago</span></a></li>
<li><a href="#">Lorem nulla, vitae eleifend leo tincidunt<br /><span class="event-date">7 days ago</span></a></li>
</ul>
</div>
-->
<?php
mysql_free_result($contacto);

mysql_free_result($pensamiento);
?>
