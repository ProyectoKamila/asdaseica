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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tblcontacto_interno (strNombre, strApellido, strTelefono_01, strTelefono_02, strEmail_01, strEmail_02, strFacebook, strCompania, strCargo, strTwitter, strLinkedin, strInstagran, strGooglePlus, intEstado) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strApellido'], "text"),
                       GetSQLValueString($_POST['strTelefono_01'], "text"),
                       GetSQLValueString($_POST['strTelefono_02'], "text"),
                       GetSQLValueString($_POST['strEmail_01'], "text"),
                       GetSQLValueString($_POST['strEmail_02'], "text"),
                       GetSQLValueString($_POST['strFacebook'], "text"),
                       GetSQLValueString($_POST['strCompania'], "text"),
                       GetSQLValueString($_POST['strCargo'], "text"),
                       GetSQLValueString($_POST['strTwitter'], "text"),
                       GetSQLValueString($_POST['strLinkedin'], "text"),
                       GetSQLValueString($_POST['strInstagran'], "text"),
                       GetSQLValueString($_POST['strGooglePlus'], "text"),
                       GetSQLValueString($_POST['intEstado'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "cont_inter.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/Admin_02.dwt - Copia.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administraci&oacute;n Aseica</title>

<!-- InstanceEndEditable -->
<link rel="icon" type="image/png" href="../imagenes/logo/favicon.ico" />

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
<link rel="stylesheet" type="text/css" href="assets/css/fonts/linecons/css/linecons.css">
<link rel="stylesheet" type="text/css" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-core.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-forms.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-components.css">
<link rel="stylesheet" type="text/css" href="assets/css/xenon-skins.css">
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">

<script src="assets/js/jquery-1.11.1.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="../js/html5shiv.min.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="utilidades/jscripts/tiny_mce/tiny_mce.js"></script>
<link rel="stylesheet" type="text/css" href="utilidades/css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript">
tinyMCE.init({
// General options
mode : "textareas",
theme : "advanced",
width : "100%",
plugins : "lists, pagebreak, layer, table, save, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, contextmenu, paste, directionality, fullscreen, visualchars, nonbreaking, xhtmlxtras, wordcount, advlist, autosave, visualblocks",

// Theme options
theme_advanced_buttons1 : "bold, italic, underline, strikethrough, |, justifyleft, justifycenter, justifyright, justifyfull",
theme_advanced_buttons2 : "cut, copy, pastetext, pasteword, |, undo, redo,",
theme_advanced_buttons3 : "link, unlink, |, forecolor, backcolor",
theme_advanced_buttons4 : "table, row_props, cell_props, col_after, col_before",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : false,
convert_newlines_to_brs : false,
// Example content CSS (should be your site CSS)
content_css : "css/content.css",

// Drop lists for link/image/media/template dialogs
template_external_list_url : "lists/template_list.js",
external_link_list_url : "lists/link_list.js",
external_image_list_url : "lists/image_list.js",
media_external_list_url : "lists/media_list.js",

// Style formats
style_formats : [
	{title : 'Bold text', inline : 'b'},
	{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
	{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
	{title : 'Example 1', inline : 'span', classes : 'example1'},
	{title : 'Example 2', inline : 'span', classes : 'example2'},
	{title : 'Table styles'},
	{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
],

// Replace values for the template plugin
template_replace_values : {
	username : "Some User",
	staffid : "991234"
}
});
</script>


<!-- InstanceBeginEditable name="head" -->
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
</head>

<body class="page-body">
	
<div class="page-container">
<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
<div class="sidebar-menu toggle-others fixed">

<div class="sidebar-menu-inner">	

<header class="logo-env">

<!-- logo -->
<div class="logo">
  <a href="principal.php" class="logo-expanded">
      <img src="assets/images/logo@2x.png" width="180" alt="Aseica Admin" />
  </a>  
  <a href="principal.php" class="logo-collapsed">
      <img src="assets/images/logo-collapsed@2x.png" width="60" alt="Aseica Admin" />
  </a>
</div>

<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
<div class="mobile-menu-toggle visible-xs">
  <a href="#" data-toggle="user-info-menu">
      <i class="fa-bell-o"></i>
      <span class="badge badge-success">7</span>
  </a>  
  <a href="#" data-toggle="mobile-menu">
      <i class="fa-bars"></i>
  </a>
</div>

<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
<div class="settings-icon">
  <a href="#" data-toggle="settings-pane" data-animate="true">
      <i class="linecons-cog"></i>
  </a>
</div>
          
</header>
  
<ul id="main-menu" class="main-menu">
<?php include("includes/menu_primcipal.php"); ?>
</ul>
  
</div>

</div>

<div class="main-content">

<?php if (isset($_SESSION['MM_idAdmin'])&&($_SESSION['MM_idAdmin'] != '')){ ?>

<!-- User Info, Notifications and Menu Bar -->
<nav class="navbar user-info-navbar" role="navigation">
<?php include("includes/barra_superior.php"); ?>
</nav>

<div class="page-title">

<!-- InstanceBeginEditable name="Titulo" -->
<div class="title-env">
<h1 class="title">Contacto Aseica</h1>
<p class="description">Contacto de Uso Interno a Aseica</p>
</div>
<!-- InstanceEndEditable -->

</div>

<!-- InstanceBeginEditable name="Contenido" -->
<script> function asegurar() { rc = confirm("¿Seguro lo desea eliminar?");  return rc; } </script>

<div class="row">
  <div class="col-sm-12">
    
  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">Agregar Nuevo Contacto</h3>
  </div>
  <div class="panel-body">
    
  <a href="cont_inter.php" class="btn btn-white btn-icon btn-icon-standalone btn-sm">
  <i class="fa-plus"></i><span>Regresar</span></a> 
    
  <div class="clearfix"></div><br>
  <br>
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>" class="form-horizontal">
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strNombre">Nombre</label>
  <div class="col-sm-6"><span id="sprytextfield1">
    <input name="strNombre" type="text" class="form-control" id="strNombre" placeholder="Ingrese un Nombre">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strApellido">Apellido</label>
  <div class="col-sm-6"><span id="sprytextfield2">
    <input name="strApellido" type="text" class="form-control" id="strApellido" placeholder="Ingrese un Apellido">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strTelefono_01">Teléfono</label>
  <div class="col-sm-6"><span id="sprytextfield3">
    <input name="strTelefono_01" type="text" class="form-control" id="strTelefono_01" placeholder="Ingrese un Teléfono">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strTelefono_02">Teléfono 2</label>
  <div class="col-sm-6">
  <input name="strTelefono_02" type="text" class="form-control" id="strTelefono_02" placeholder="Ingrese un Teléfono">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strEmail_01">Email</label>
  <div class="col-sm-6">
  <input name="strEmail_01" type="text" class="form-control" id="strEmail_01" placeholder="Ingrese un Email">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strEmail_02">Email 2</label>
  <div class="col-sm-6">
  <input name="strEmail_02" type="text" class="form-control" id="strEmail_02" placeholder="Ingrese un Email">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strCompania">Compañia</label>
  <div class="col-sm-6">
  <input name="strCompania" type="text" class="form-control" id="strCompania" placeholder="Ingrese una Compañia">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strCargo">Cargo</label>
  <div class="col-sm-6">
  <input name="strCargo" type="text" class="form-control" id="strCargo" placeholder="Ingrese un Cargo">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strFacebook">Facebook</label>
  <div class="col-sm-6">
  <input name="strFacebook" type="text" class="form-control" id="strFacebook" placeholder="Ingrese un Facebook">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strTwitter">Twitter</label>
  <div class="col-sm-6">
  <input name="strTwitter" type="text" class="form-control" id="strTwitter" placeholder="Ingrese un Twitter">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strLinkedin">Linkedin</label>
  <div class="col-sm-6">
  <input name="strLinkedin" type="text" class="form-control" id="strLinkedin" placeholder="Ingrese un Linkedin">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strInstagran">Instagran</label>
  <div class="col-sm-6">
  <input name="strInstagran" type="text" class="form-control" id="strInstagran" placeholder="Ingrese un Instagran">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="strGooglePlus">Google +</label>
  <div class="col-sm-6">
  <input name="strGooglePlus" type="text" class="form-control" id="strGooglePlus" placeholder="Ingrese un Google +">
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="intEstado">Estado</label>
    
  <div class="col-sm-10">
  <select name="intEstado" class="form-control">
  <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Activo</option>
  <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Desactivado</option>
  </select>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <button type="submit" class="btn btn-success">Agregar</button>
  <button type="reset" class="btn btn-white">Reset</button>
  </div>
    
    <input type="hidden" name="MM_insert" value="form1">
  </form>
    
    
  </div>
  </div>
    
  </div>
</div>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
<!-- InstanceEndEditable -->

<META HTTP-EQUIV="Refresh" CONTENT="990; URL=cerrar_sesion.php">

<?php } else {?>

<div class="clearfix"></div>
<h1 class="ilega"> Has ingresado ilegalmente a la p&aacute;gina de administraci&oacute;n</h1>
<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php" >
         
<?php } ?>

<!-- Main Footer -->
<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
<!-- Or class "fixed" to  always fix the footer to the end of page -->
<footer class="main-footer sticky footer-type-1">

<div class="footer-inner">

<!-- Add your copyright text here -->
<div class="footer-text">
  &copy; 2015
  <strong>ASEICA</strong> 
</div>


<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
<div class="go-up">

  <a href="#" rel="go-top">
      <i class="fa-angle-up"></i>
  </a>
  
</div>

</div>

</footer>
</div>


</div>
	
	
<!-- Bottom Scripts -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/xenon-api.js"></script>
<script src="assets/js/xenon-toggles.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/tocify/jquery.tocify.min.js"></script>

<!-- JavaScripts initializations and stuff -->
<script src="assets/js/xenon-custom.js"></script>

</body>
<!-- InstanceEnd --></html>
