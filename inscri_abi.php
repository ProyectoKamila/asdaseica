<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}}$pg = 3;$editFormAction = $_SERVER['PHP_SELF'];if (isset($_SERVER['QUERY_STRING'])) { $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {$insertSQL = sprintf("INSERT INTO tblpre_incrip (intEmp_Perso, strNombre, strCI_RIF, strTelefono_01, strTelefono_02, strEmail_01, strEmail_02, intOferta, strNomb_Respon, strApellido_Respon, strCI, strCargo, strEmaio_Repre, strTelefono_Repre, intSexo_represen, datFecha_Solici, timHora, txtInfo_Extra, intCartaCompromiso, intBoletines, intCalendario, intEstado) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",GetSQLValueString($_POST['intEmp_Perso'], "int"),GetSQLValueString($_POST['strNombre'], "text"),GetSQLValueString($_POST['strCI_RIF'], "text"),GetSQLValueString($_POST['strTelefono_01'], "text"), GetSQLValueString($_POST['strTelefono_02'], "text"),   GetSQLValueString($_POST['strEmail_01'], "text"),GetSQLValueString($_POST['strEmail_02'], "text"),GetSQLValueString($_POST['intOferta'], "int"),GetSQLValueString(strtolower($_POST['strNomb_Respon']), "text"),GetSQLValueString(strtolower($_POST['strApellido_Respon']), "text"),GetSQLValueString($_POST['strCI'], "text"),GetSQLValueString(strtolower($_POST['strCargo']), "text"),GetSQLValueString($_POST['strEmaio_Repre'], "text"),GetSQLValueString($_POST['strTelefono_Repre'], "text"),GetSQLValueString($_POST['intSexo_represen'], "int"),GetSQLValueString($_POST['datFecha_Solici'], "date"),GetSQLValueString($_POST['timHora'], "date"),GetSQLValueString($_POST['txtInfo_Extra'], "text"),GetSQLValueString($_POST['intCartaCompromiso'], "int"),GetSQLValueString($_POST['intBoletines'], "int"),GetSQLValueString($_POST['intCalendario'], "int"), GetSQLValueString($_POST['intEstado'], "int"));  mysql_select_db($database_conexion, $conexion); $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error()); $id = mysql_insert_id();  $insertGoTo = "inscri_abi_ok.php?res=".$id;if (isset($_SERVER['QUERY_STRING'])) { $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?"; $insertGoTo .= $_SERVER['QUERY_STRING'];}header(sprintf("Location: %s", $insertGoTo));}$var_oferta = "0";if (isset($_GET['id'])) { $var_oferta = $_GET['id'];}mysql_select_db($database_conexion, $conexion);$query_oferta = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.idOferta = %s", GetSQLValueString($var_oferta, "int"));$oferta = mysql_query($query_oferta, $conexion) or die(mysql_error());$row_oferta = mysql_fetch_assoc($oferta);$totalRows_oferta = mysql_num_rows($oferta);$VAR_calendario = "0";if (isset($_GET['ca'])) { $VAR_calendario = $_GET['ca'];}mysql_select_db($database_conexion, $conexion);$query_calendario = sprintf("SELECT * FROM tbloferta_academica_calendario WHERE tbloferta_academica_calendario.idCalendario = %s", GetSQLValueString($VAR_calendario, "int"));$calendario = mysql_query($query_calendario, $conexion) or die(mysql_error());$row_calendario = mysql_fetch_assoc($calendario);$totalRows_calendario = mysql_num_rows($calendario);?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Academia de Servicios Educativos Integrales</title>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
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
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
  <div class="bread-heading">
    <h1>Oferta Acad&Eacute;mica Abierta</h1></div>                        
  </div>
  </div>
  </div> 
</div>


<div class="container">
  <div class="row">
    
    <div class="col-xs-12 col-lg-12  col-sm-12 col-md-12 pull-left contact2-wrap no-pad">
      
      <!--contact widgets-->
      <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 pull-left no-pad">    
        
        <div class="subtitle col-xs-12 no-pad col-sm-12 col-md-12 pull-left news-sub icontact-widg">
          Formulario  de Preinscripci&Oacute;N
          <h3><?php echo $row_oferta['strTitulo']; ?>, A realizarse el 
            <?php echo ObtFechaDia($row_calendario['datFecha_01']); if ($row_calendario['datFecha_02'] != '') { echo ', '.ObtFechaDia($row_calendario['datFecha_02']); } if ($row_calendario['datFecha_03'] != '') { echo ', '.ObtFechaDia($row_calendario['datFecha_03']); } if ($row_calendario['datFecha_04'] != '') { echo ', '.ObtFechaDia($row_calendario['datFecha_04']); } if ($row_calendario['datFecha_05'] != '') { echo ', '.ObtFechaDia($row_calendario['datFecha_05']); } if ($row_calendario['datFecha_06'] != '') { echo ', '.ObtFechaDia($row_calendario['datFecha_06']); } ?> de <?php echo ObtMes($row_calendario['intMes']); ?> del <?php echo $row_calendario['intAno']; ?></h3>
          </div>
        
        <!--Contact form-->
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="160">
          
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad">
            <form method="post" name="form2" action="<?php echo $editFormAction; ?>" class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1" id="contactForm">
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="intSexo_represen" class="control-label" >Titulo (<span>*</span>)</label>
                <select name="intSexo_represen" class="contact2-textbox">
                  <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Sr.</option>
                  <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Srta.</option>
                  <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Sra.</option>
                  <option value="4" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>Lic.</option>
                  <option value="5" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>>Licda.</option>
                  <option value="6" <?php if (!(strcmp(6, ""))) {echo "SELECTED";} ?>>MSc.</option>
                  <option value="7" <?php if (!(strcmp(7, ""))) {echo "SELECTED";} ?>>Dr.</option>
                  <option value="8" <?php if (!(strcmp(8, ""))) {echo "SELECTED";} ?>>Dra.</option>
                  </select>
                </div>
              
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="strCI" class="control-label">C.I. Solicitante (<span>*</span>)</label>
                <span id="sprytextfield2">
                  <input type="text" class="contact2-textbox" name="strCI" id="strCI" placeholder=" 12.345.678"/>
                  <span class="textfieldRequiredMsg">Se necesita una C.I.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>
                </div>   
              
              <div class="clearfix"></div> 
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="strNomb_Respon" class="control-label">Nombre Solicitante (<span>*</span>)</label>
                <span id="sprytextfield1">
                  <input type="text" class="contact2-textbox" name="strNomb_Respon" id="strNomb_Respon" />
                  <span class="textfieldRequiredMsg">Se necesita un Nombre.</span></span>
                </div>
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="strApellido_Respon" class="control-label">Apellido Solicitante (<span>*</span>)</label>
                <span id="sprytextfield6">
                  <input type="text" class="contact2-textbox" name="strApellido_Respon" id="strApellido_Respon" />
                  <span class="textfieldRequiredMsg">Se necesita un Apellido.</span></span>
                </div>   
              
              <div class="clearfix"></div>
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="strEmaio_Repre" class="control-label">Email Solicitante (<span>*</span>)</label>
                <span id="sprytextfield4">
                  <input type="text" class="contact2-textbox" name="strEmaio_Repre" id="strEmaio_Repre" />
                  <span class="textfieldRequiredMsg">Se necesita un Email.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>
                </div>      
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="strTelefono_Repre" class="control-label">Tel&eacute;fono Solicitante (<span>*</span>)</label>
                <span id="sprytextfield5">
                  <input type="text" class="contact2-textbox" name="strTelefono_Repre" id="strTelefono_Repre" />
                  <span class="textfieldRequiredMsg">Se necesita un Tel&eacute;fono.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>
                </div>
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="intCartaCompromiso" class="control-label" >Forma de Pago</label>
                <select name="intCartaCompromiso" class="contact2-textbox">
                  <option value="1" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Deposito En Efectivo</option>
                  <option value="2" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Transferencia</option>
                  <option value="3" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Carta de Compromiso</option>
                  </select>
                </div>
              
              <div class="clearfix"></div>
              
              
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <label for="txtInfo_Extra" class="control-label">Informaci&oacute;n Adicional</label>
                <textarea class="contact2-textarea" name="txtInfo_Extra" id="txtInfo_Extra"></textarea>
                </div>   
              
              <div class="clearfix"></div>      
              
              <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
                <label for="intBoletines" class="control-label" >Recibir  Boletines de Informaci&oacute;n</label>
                <select name="intBoletines" class="contact2-textbox">
                  <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Si</option>
                  <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>No</option>
                  </select>
                </div> 
              
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <section class="color-7" id="btn-click">
                  <button class="icon-mail btn2-st2 btn-7 btn-7b" data-loading-text="Loading..." type="submit">&nbsp;&nbsp;&nbsp;Solicitar</button>
                  </section>
                </div> 
              
              <input type="hidden" name="intEmp_Perso" value="2">
              <input type="hidden" name="intOferta" value="<?php echo $row_oferta['idOferta']; ?>">
              <input type="hidden" name="datFecha_Solici" value="<?php echo $resu; ?>">
              <input type="hidden" name="timHora" value="<?php echo $res2; ?>">
              <input type="hidden" name="intCalendario" value="<?php echo $_GET['ca']; ?>">
              <input type="hidden" name="intEstado" value="3">
              <input type="hidden" name="MM_insert" value="form2">
              </form>
                       
            </div>
          
          </div>
        
        </div>
      
      </div>
    
    </div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email", {validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "phone_number", {format:"phone_custom", pattern:"xxxx - xxx - xx - xx", useCharacterMasking:true, validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["blur"]});
</script>
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
<?php mysql_free_result($empre);mysql_free_result($oferta);mysql_free_result($calendario);?>
