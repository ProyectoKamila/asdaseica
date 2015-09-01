<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}} $pg = 3;$editFormAction = $_SERVER['PHP_SELF'];if (isset($_SERVER['QUERY_STRING'])) { $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);}if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) { $insertSQL = sprintf("INSERT INTO tblpre_incrip (intEmp_Perso, strNombre, strCI_RIF, txtDireccion, strTelefono_01, strTelefono_02, strEmail_01, strEmail_02, intOferta, strNomb_Respon, strApellido_Respon, strCI, strCargo, strEmaio_Repre, strTelefono_Repre, intActividad_Comer, intDenomina_Comer, intTam_Empre, intNume_Part, datFecha_Solici, timHora, intSexo_represen, txtInfo_Extra, intObjetivo, intEstado) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",GetSQLValueString($_POST['intEmp_Perso'], "int"),GetSQLValueString($_POST['strNombre'], "text"), GetSQLValueString($_POST['strCI_RIF'], "text"),GetSQLValueString($_POST['txtDireccion'], "text"),GetSQLValueString($_POST['strTelefono_01'], "text"),GetSQLValueString($_POST['strTelefono_02'], "text"),GetSQLValueString($_POST['strEmail_01'], "text"),GetSQLValueString($_POST['strEmail_02'], "text"),GetSQLValueString($_POST['intOferta'], "int"),GetSQLValueString(strtolower($_POST['strNomb_Respon']), "text"),GetSQLValueString(strtolower($_POST['strApellido_Respon']), "text"),GetSQLValueString($_POST['strCI'], "text"),GetSQLValueString(strtolower($_POST['strCargo']), "text"),GetSQLValueString($_POST['strEmaio_Repre'], "text"),GetSQLValueString($_POST['strTelefono_Repre'], "text"),GetSQLValueString($_POST['intActividad_Comer'], "int"),GetSQLValueString($_POST['intDenomina_Comer'], "int"),GetSQLValueString($_POST['intTam_Empre'], "int"),GetSQLValueString($_POST['intNume_Part'], "int"),GetSQLValueString($_POST['datFecha_Solici'], "date"),GetSQLValueString($_POST['timHora'], "date"),GetSQLValueString($_POST['intSexo_represen'], "int"),GetSQLValueString($_POST['txtInfo_Extra'], "text"),GetSQLValueString($_POST['intObjetivo'], "int"),GetSQLValueString($_POST['intEstado'], "int"));mysql_select_db($database_conexion, $conexion);$Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error()); $id = mysql_insert_id(); $insertGoTo = "inscri_empresa_ok.php?res=".$id; if (isset($_SERVER['QUERY_STRING'])) { $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?"; $insertGoTo .= $_SERVER['QUERY_STRING']; } header(sprintf("Location: %s", $insertGoTo));}$var_empre = "0";if (isset($_GET['id'])) { $var_empre = $_GET['id'];}mysql_select_db($database_conexion, $conexion);$query_empre = sprintf("SELECT * FROM tbloferta_company WHERE tbloferta_company.idCompanias = %s", GetSQLValueString($var_empre, "int"));$empre = mysql_query($query_empre, $conexion) or die(mysql_error());$row_empre = mysql_fetch_assoc($empre);$totalRows_empre = mysql_num_rows($empre);mysql_select_db($database_conexion, $conexion);$query_tamano_empresa = "SELECT * FROM tblpre_tam_empre WHERE tblpre_tam_empre.intEstado = 1";$tamano_empresa = mysql_query($query_tamano_empresa, $conexion) or die(mysql_error());$row_tamano_empresa = mysql_fetch_assoc($tamano_empresa);$totalRows_tamano_empresa = mysql_num_rows($tamano_empresa);mysql_select_db($database_conexion, $conexion);$query_actividad_comercial = "SELECT * FROM tblpre_act_comer WHERE tblpre_act_comer.intEstado = 1";$actividad_comercial = mysql_query($query_actividad_comercial, $conexion) or die(mysql_error());$row_actividad_comercial = mysql_fetch_assoc($actividad_comercial);$totalRows_actividad_comercial = mysql_num_rows($actividad_comercial);mysql_select_db($database_conexion, $conexion);$query_denominacion_comercial = "SELECT * FROM tblpre_deno_comer WHERE tblpre_deno_comer.intEstado = 1";$denominacion_comercial = mysql_query($query_denominacion_comercial, $conexion) or die(mysql_error());$row_denominacion_comercial = mysql_fetch_assoc($denominacion_comercial);$totalRows_denominacion_comercial = mysql_num_rows($denominacion_comercial);$var_objetivo = "0";if (isset($_GET['id'])) {  $var_objetivo = $_GET['id'];}mysql_select_db($database_conexion, $conexion);$query_objetivo = sprintf("SELECT * FROM tbloferta_company_objetivos WHERE tbloferta_company_objetivos.intOferta_Company = %s", GetSQLValueString($var_objetivo, "int"));$objetivo = mysql_query($query_objetivo, $conexion) or die(mysql_error());$row_objetivo = mysql_fetch_assoc($objetivo);$totalRows_objetivo = mysql_num_rows($objetivo);?>
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
  <h1>Informaci&Oacute;n Para Empresas</h1>
  </div>                        
  </div>
  </div>
  </div> 
</div>

<!--About-us top-content-->

<div class="container">
  <div class="row">
    
  <div class="col-xs-12 col-lg-12  col-sm-12 col-md-12 pull-left contact2-wrap no-pad">
    
  <!--contact widgets-->
  <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 pull-left no-pad">
    
    
  <div class="subtitle col-xs-12 no-pad col-sm-12 col-md-12 pull-left news-sub icontact-widg">Formulario de Solicitud de informaci&Oacute;n
  <p> - <?php echo ObtObjeEmpre($_GET['ob']); ?></p>
  </div>
    
  <!--Contact form-->
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="160">
    
  <div></div>                 
    
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad">
    
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>" class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1" id="contactForm">
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strNombre" class="control-label">Nombre Empresa (<span>*</span>)</label>
  <span id="sprytextfield1">
  <input type="text" class="contact2-textbox" name="strNombre" id="strNombre" />
  <span class="textfieldRequiredMsg">Ingrese un Nombre.</span></span></div>      
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strCI_RIF" class="control-label">R.I.F. Empresa (<span>*</span>)</label>
  <span id="sprytextfield2">
  <input type="text" class="contact2-textbox" name="strCI_RIF" id="strCI_RIF" />
  <span class="textfieldRequiredMsg">Ingrese un RIF.</span></span></div>
    
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  <label for="txtDireccion" class="control-label">Direcci&oacute;n de la Empresa (<span>*</span>)</label>
  <span id="sprytextarea1">
  <textarea class="contact2-textarea" name="txtDireccion" id="txtDireccion"></textarea>
  <span class="textareaRequiredMsg">Se necesita a direcci&oacute;n.</span><span class="textareaMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></div>          
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strTelefono_01" class="control-label">Tel&eacute;fono 01 (<span>*</span>)</label>
  <span id="sprytextfield3">
  <input type="text" class="contact2-textbox" name="strTelefono_01" id="strTelefono_01" />
  <span class="textfieldRequiredMsg">Ingrese un N&uacute;mero.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strTelefono_01" class="control-label">Tel&eacute;fono 02</label>
  <input type="text" class="contact2-textbox" name="strTelefono_02" id="strTelefono_02" />
  </div>         
    
  <div class="clearfix"></div>    
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strEmail_01" class="control-label">Email 01 (<span>*</span>)</label>
  <span id="sprytextfield4">
  <input type="text" class="contact2-textbox" name="strEmail_01" id="strEmail_01" />
  <span class="textfieldRequiredMsg">Ingrese Un Email.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></div>   
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strEmail_02" class="contact2-wrap">Email 02</label>
  <input type="text" class="contact2-textbox" name="strEmail_02" id="strEmail_02" />
  </div>       
    
  <div class="clearfix"></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strNomb_Respon" class="control-label">Nombre Solicitante (<span>*</span>)</label>
  <span id="sprytextfield5">
  <input type="text" class="contact2-textbox" name="strNomb_Respon" id="strNomb_Respon" />
  <span class="textfieldRequiredMsg">Ingrese Un Nombre.</span></span></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strApellido_Respon" class="control-label">Apellido Solicitante (<span>*</span>)</label>
  <span id="sprytextfield11">
  <input type="text" class="contact2-textbox" name="strApellido_Respon" id="strApellido_Respon" />
  <span class="textfieldRequiredMsg">Se necesita un Apellido.</span></span></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="intSexo_represen" class="control-label" >Sexo</label>
  <span id="spryselect1">
  <select name="intSexo_represen" class="contact2-textbox">
  <option value="1">Masculino</option>
  <option value="2">Femenino</option>
  </select>
  </div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strCI" class="control-label">C.I. Solicitante (<span>*</span>)</label>
  <span id="sprytextfield6">
  <input type="text" class="contact2-textbox" name="strCI" id="strCI" />
  <span class="textfieldRequiredMsg">Ingrese una Cedula de Identidad.</span></span></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strCargo" class="control-label">Cargo Solicitante (<span>*</span>)</label>
  <span id="sprytextfield10">
  <input type="text" class="contact2-textbox" name="strCargo" id="strCargo" />
  <span class="textfieldRequiredMsg">Se necesita un Cargo.</span></span></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strEmaio_Repre" class="control-label">Email Solicitante (<span>*</span>)</label>
  <span id="sprytextfield7">
  <input type="text" class="contact2-textbox" name="strEmaio_Repre" id="strEmaio_Repre" />
  <span class="textfieldRequiredMsg">Ingrese Un Email.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></div>       
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="strTelefono_Repre" class="control-label">Tel&eacute;fono Solicitante (<span>*</span>)</label>
  <span id="sprytextfield8">
  <input type="text" class="contact2-textbox" name="strTelefono_Repre" id="strTelefono_Repre" />
  <span class="textfieldRequiredMsg">Ingrese Un N&uacute;mero.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="intActividad_Comer" class="control-label">Actividad Comercial (<span>*</span>)</label>
  <span id="spryselect2">
  <select name="intActividad_Comer" class="contact2-textbox">
  <option>Seleccionar</option>
  <?php do { ?>
  <option value="<?php echo $row_actividad_comercial['idActivi']?>"><?php echo $row_actividad_comercial['strTitulo']?></option>
  <?php } while ($row_actividad_comercial = mysql_fetch_assoc($actividad_comercial));
$rows = mysql_num_rows($actividad_comercial);
if($rows > 0) {
mysql_data_seek($actividad_comercial, 0);
$row_actividad_comercial = mysql_fetch_assoc($actividad_comercial);
}?>
  </select>
  <span class="selectRequiredMsg">Seleccione un elemento.</span></span></div>
    
  <div class="clearfix"></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="intActividad_Comer" class="control-label">Denominaci&oacute;n  Comercial (<span>*</span>)</label>
  <span id="spryselect3">
  <select name="intDenomina_Comer" class="contact2-textbox">
  <option>Seleccionar</option>
  <?php do { ?>
  <option value="<?php echo $row_denominacion_comercial['idActivi']?>"><?php echo $row_denominacion_comercial['strTitulo']?></option>
  <?php } while ($row_denominacion_comercial = mysql_fetch_assoc($denominacion_comercial));
$rows = mysql_num_rows($denominacion_comercial);
if($rows > 0) {
mysql_data_seek($denominacion_comercial, 0);
$row_denominacion_comercial = mysql_fetch_assoc($denominacion_comercial);
} ?>
  </select>
  <span class="selectRequiredMsg">Seleccione un elemento.</span></span></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="intActividad_Comer" class="control-label">Tama&ntilde;o de Empresa</label>
  <span id="spryselect1">
  <select name="intTam_Empre" class="contact2-textbox">
  <option>Seleccionar</option>
  <?php do { ?>
  <option value="<?php echo $row_tamano_empresa['idTama']?>"><?php echo $row_tamano_empresa['strTitulo']?></option>
  <?php 
} while ($row_tamano_empresa = mysql_fetch_assoc($tamano_empresa));
$rows = mysql_num_rows($tamano_empresa);
if($rows > 0) {
mysql_data_seek($tamano_empresa, 0);
$row_tamano_empresa = mysql_fetch_assoc($tamano_empresa);
}
?>
  </select>
  <span class="selectRequiredMsg">Seleccione un elemento.</span></span></div>
    
  <div class="clearfix"></div>
    
  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 control-group">
  <label for="intNume_Part" class="control-label">N&uacute;mero Participantes (<span>*</span>)</label>
  <span id="sprytextfield9">
  <input type="text" class="contact2-textbox" name="intNume_Part" id="intNume_Part" />
  <span class="textfieldRequiredMsg">Ingrese Un N&uacute;mero.</span></span></div>
    
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  <label for="txtInfo_Extra" class="control-label"> Otros Datos</label>
  <textarea class="contact2-textarea" name="txtInfo_Extra" id="txtInfo_Extra" placeholder="Ingrese Un Modelo de Curso"></textarea>
  </div>       
    
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  <section class="color-7" id="btn-click">
  <button class="icon-mail btn2-st2 btn-7 btn-7b"  data-loading-text="Loading..." type="submit">Solicitar</button>
  </section>
  </div>
    
  <input type="hidden" name="intEmp_Perso" value="1">
  <input type="hidden" name="intOferta" value="<?php echo $_GET['id'] ?>">
  <input type="hidden" name="intObjetivo" value="<?php echo $_GET['ob'] ?>">
  <input type="hidden" name="intEstado" value="3">
  <input type="hidden" name="datFecha_Solici" value="<?php echo $resu; ?>">
  <input type="hidden" name="timHora" value="<?php echo $res2; ?>">
  <input type="hidden" name="MM_insert" value="form1">
  </form>
    
    
  </div>
    
  </div>
    
  </div>
    
  </div>
    
  </div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {minChars:50});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "phone_number", {format:"phone_custom", pattern:"xxxx - xxx - xx - xx", useCharacterMasking:true});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "email");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "phone_number", {format:"phone_custom", pattern:"xxxx - xxx - xx - xx", useCharacterMasking:true});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
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
<?php mysql_free_result($empre);mysql_free_result($tamano_empresa);mysql_free_result($actividad_comercial);mysql_free_result($denominacion_comercial);mysql_free_result($objetivo);?>
