<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}}$editFormAction = $_SERVER['PHP_SELF'];if (isset($_SERVER['QUERY_STRING'])) { $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);}if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {  $insertSQL = sprintf("INSERT INTO tblpre_incrip_pagos (intPre_Inscri, intOferta, intCurso, intTipo_Pago, strBanco, strMonto, strReferencia, datFecha_Pago, intEstado) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",GetSQLValueString($_POST['intPre_Inscri'], "int"),GetSQLValueString($_POST['intOferta'], "int"),GetSQLValueString($_POST['intCurso'], "int"),GetSQLValueString($_POST['intTipo_Pago'], "int"),GetSQLValueString($_POST['strBanco'], "text"),GetSQLValueString($_POST['strMonto'], "text"),GetSQLValueString($_POST['strReferencia'], "text"),GetSQLValueString($_POST['datFecha_Pago'], "text"),GetSQLValueString($_POST['intEstado'], "int"));mysql_select_db($database_conexion, $conexion);$Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());$id = mysql_insert_id();$insertGoTo = "pago_ok.php?ulo=".$id;if (isset($_SERVER['QUERY_STRING'])) {$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";$insertGoTo .= $_SERVER['QUERY_STRING'];}header(sprintf("Location: %s", $insertGoTo));}$var_pre_inscrito = "0";if (isset($_GET['pa'])) { $var_pre_inscrito = $_GET['pa'];}mysql_select_db($database_conexion, $conexion);$query_pre_inscrito = sprintf("SELECT * FROM tblpre_incrip WHERE tblpre_incrip.idPre_inscripcion = %s", GetSQLValueString($var_pre_inscrito, "int"));$pre_inscrito = mysql_query($query_pre_inscrito, $conexion) or die(mysql_error());$row_pre_inscrito = mysql_fetch_assoc($pre_inscrito);$totalRows_pre_inscrito = mysql_num_rows($pre_inscrito);$VAR_calendario = "0";if (isset($_GET['ca'])) {  $VAR_calendario = $_GET['ca'];}mysql_select_db($database_conexion, $conexion);$query_calendario = sprintf("SELECT * FROM tbloferta_academica_calendario WHERE tbloferta_academica_calendario.idCalendario = %s", GetSQLValueString($VAR_calendario, "int"));$calendario = mysql_query($query_calendario, $conexion) or die(mysql_error());$row_calendario = mysql_fetch_assoc($calendario);$totalRows_calendario = mysql_num_rows($calendario);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Academia de Servicios Educativos Integrales</title>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" href="imagenes/logo/favicon.ico" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
<link href="css/animate.css" rel="stylesheet" />
<link href="css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/blue.css" id="style-switch" />
<!-- REVOLUTION BANNER CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.min.css" media="screen" />
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="../css/ie9.css" />
<![endif]-->

<link rel="stylesheet" type="text/css" href="css/slides.css" />
<link rel="stylesheet" type="text/css" href="css/inline.min.css" />


<!-- LayerSlider -->
<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
<link rel="stylesheet" href="layerslider/assets/css/style.css" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<!--JS Inclution-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>  
<script type="text/javascript" src="bootstrap-new/js/bootstrap.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="js/jquery.sticky.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.min.js"></script>
<script type="text/javascript" src="js/jquery.imedica.min.js"></script>
<script type="text/javascript" src="js/custom-imedicajs.min.js"></script>
<script type='text/javascript'>
$(window).load(function(){
$('#loader-overlay').fadeOut(900);
$("html").css("overflow","visible");
});
</script>

<!-- LayerSlider -->
<script src="layerslider/jQuery/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="layerslider/jQuery/jquery-transit-modified.js" type="text/javascript"></script>
<script src="layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#layerslider').layerSlider({
        skinsPath : 'layerslider/skins/',
        skin : 'borderlessdark3d',
        thumbnailNavigation : 'hover',
        hoverPrevNext : false,
        autoPlayVideos : false
    });
});		
</script>



</head>

<body>

<div id="loader-overlay"><img src="images/loader.gif" alt="Loading" /></div>

<header>
            
<div class="header-bg">

<div id="search-overlay">
<div class="container">
<div id="close">X</div>

<input id="hidden-search" type="text" placeholder="Start Typing..." autofocus autocomplete="off"  /> <!--hidden input the user types into-->
<input id="display-search" type="text" placeholder="Start Typing..." autofocus autocomplete="off" /> <!--mirrored input that shows the actual input value-->
</div></div>


<!--Topbar-->
<div class="topbar-info no-pad fondo_negro">                    
<div class="container">                     
<div class="social-wrap-head col-md-9 no-pad letras_supe">ACADEMIA DE SERVICIOS EDUCATIVOS INTEGRALES</div                          
><div class="top-info-contact pull-right col-md-3">
<ul>
<?php include("includes/redes_sociales.php"); ?>
</ul>
<div id="search" class="fa fa-search search-head"></div>
</div>                      
</div>
</div><!--Topbar-info-close-->

<div id="headerstic">

<div class="top-bar container">
<div class="row fonfo_blanco">
<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">

<button type="button" class="navbar-toggle icon-list-ul" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
</button>
<button type="button" class="navbar-toggle icon-rocket" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
<span class="sr-only">Toggle navigation</span>
</button>

<a href="inicio"><div class="logo"><img src="imagenes/logo/logo-pequeno-2.png"></div></a>
<div class="clearfix"></div>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<?php include("includes/menu_supe.php"); ?>
</ul>
</div><!-- /.navbar-collapse -->

<div class="hide-mid collapse navbar-collapse option-drop" id="bs-example-navbar-collapse-2">

<ul class="nav navbar-nav navbar-right other-op">
<?php include("includes/menu_mobil.php"); ?>
</ul>
</div><!-- /.navbar-collapse -->

</div><!-- /.container-fluid -->
</nav>
</div>    
</div><!--Topbar End-->
</div>

</div>

</header>

<div class="complete-content">
<div class="about-intro-wrap pull-left">
  <div class="bread-crumb-wrap ibc-wrap-1">
  <div class="container">
  <!--Title / Beadcrumb-->
  <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
  <div class="bread-heading"><h1>Registros de Pagos en Aseica</h1></div>                        
  </div>
  </div>
  </div> 
</div>

<div class="container">
  <div class="row">
    
    <div class="col-xs-12 col-lg-12  col-sm-12 col-md-12 pull-left contact2-wrap no-pad">
      
      <!--contact widgets-->
      <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 pull-left no-pad">
        
        
        <div class="subtitle col-xs-12 no-pad col-sm-12 col-md-12 pull-left news-sub icontact-widg">Formulario  DE PAGO</div>
        
        <div class="whitebg-t2 col-xs-12 no-pad col-sm-12 col-md-12"><?php if ($row_pre_inscrito['intSexo_represen'] == 1) { echo "Estimado "; } else { echo "Estimada "; } ?> <?php echo $row_pre_inscrito['strNomb_Respon']; ?> <?php echo $row_pre_inscrito['strApellido_Respon']; ?><br>
  <br>
          Ingrese los datos para confirmar su pago del Curso - <?php echo ObtNombOferAcade($row_pre_inscrito['intOferta']); ?> <?php echo FecDelCalen($row_pre_inscrito['intCalendario']); ?><br>
  <br>
  </div>
        
        <!--Contact form-->
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="160">
          
          <div></div>                 
          
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad">
            
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>" class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1" id="contactForm">
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="intTipo_Pago" class="control-label" >Tipo de Pago</label>
  <select name="intTipo_Pago" class="contact2-textbox">
  <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Deposito en Efectivo</option>
  <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Transferencia</option>
  </select>
  </div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strBanco" class="control-label">Si Hizo una Transferencia. &iquest;Desde que Banco la Realizo?</label>
    
  <input type="text" class="contact2-textbox" name="strBanco" id="strBanco" />
  </div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strReferencia" class="control-label">N&deg; Referencia de Transferencia / N&deg; Bauche en Taquilla</label>
  <input type="text" class="contact2-textbox" name="strReferencia" id="strReferencia" />
  </div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strMonto" class="control-label">Monto depositado</label>
  <input type="text" class="contact2-textbox" name="strMonto" id="strMonto" />
  </div>
    
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  <section class="color-7" id="btn-click">
  <button class="icon-mail btn2-st2 btn-7 btn-7b" data-loading-text="Loading..." type="submit">&nbsp;&nbsp;&nbsp;Notificar</button>
  </section>
  </div> 
    
  <input type="hidden" name="intPre_Inscri" value="<?php echo $row_pre_inscrito['idPre_inscripcion']; ?>">
  <input type="hidden" name="intOferta" value="<?php echo $row_pre_inscrito['intOferta']; ?>">
  <input type="hidden" name="intCurso" value="<?php echo $_GET['cle0']; ?>">
  <input name="datFecha_Pago" type="hidden" value="<?php echo $resu; ?>">
  <input type="hidden" name="intEstado" value="6">
    
  <input type="hidden" name="MM_insert" value="form1">
  </form>
            
            
            </div>
          
          </div>
        
        </div>
      
      </div>
    
    </div>
</div>

<br>
<br>
<br>
</div>

<div class="complete-footer">
<footer id="footer">

<div class="container">
<div class="row">
	<?php include("includes/footer.php"); ?>
</div>
</div>       

</footer>

<div class="bottom-footer">
<div class="container">

<div class="row">
<!--Foot widget-->
<div class="col-xs-12 col-sm-12 col-md-12 foot-widget-bottom">
<p class="col-xs-12 col-md-5 no-pad">Copyright <?php echo $ano; ?> Aseica | Todos los Derechos Reservados</p>
<ul class="foot-menu col-xs-12 col-md-7 no-pad">                     
	<?php include("includes/menu_footer.php"); ?>
</ul>
</div>
</div>
</div> 
</div>

</div>

</body>
</html>
<?php mysql_free_result($pre_inscrito);mysql_free_result($calendario);mysql_free_result($bancos);?>
