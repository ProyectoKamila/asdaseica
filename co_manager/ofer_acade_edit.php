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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tbloferta_academica SET strTitulo=%s, txtImagen_Peq=%s, intArea=%s, intTipo_Ofer=%s, intModalidad=%s, strDuracion=%s, strHorario=%s, txtDirigido_A=%s, txtObj_Gene=%s, txtObj_Espc_Cont=%s, intFacilitador=%s, intFacilitador2=%s, intFacilitador3=%s, txtInf_Adici=%s, strCosto=%s, txtBeneficios=%s, txtIncluye=%s, txtImagen_01=%s, txtImagen_02=%s, txtImagen_03=%s, txtImagen_04=%s, txtVideo_01=%s, txtVideo_02=%s, txtVideo_03=%s, intEstado=%s WHERE idOferta=%s",
                       GetSQLValueString($_POST['strTitulo'], "text"),
                       GetSQLValueString($_POST['txtImagen_Peq'], "text"),
                       GetSQLValueString($_POST['intArea'], "int"),
                       GetSQLValueString($_POST['intTipo_Ofer'], "int"),
                       GetSQLValueString($_POST['intModalidad'], "int"),
                       GetSQLValueString($_POST['strDuracion'], "text"),
					   GetSQLValueString($_POST['strHorario'], "text"),
                       GetSQLValueString($_POST['txtDirigido_A'], "text"),
                       GetSQLValueString($_POST['txtObj_Gene'], "text"),
                       GetSQLValueString($_POST['txtObj_Espc_Cont'], "text"),
                       GetSQLValueString($_POST['intFacilitador'], "int"),
                       GetSQLValueString($_POST['intFacilitador2'], "int"),
                       GetSQLValueString($_POST['intFacilitador3'], "int"),
                       GetSQLValueString($_POST['txtInf_Adici'], "text"),
                       GetSQLValueString($_POST['strCosto'], "text"),
                       GetSQLValueString($_POST['txtBeneficios'], "text"),
                       GetSQLValueString($_POST['txtIncluye'], "text"),
                       GetSQLValueString($_POST['txtImagen_01'], "text"),
                       GetSQLValueString($_POST['txtImagen_02'], "text"),
                       GetSQLValueString($_POST['txtImagen_03'], "text"),
                       GetSQLValueString($_POST['txtImagen_04'], "text"),
                       GetSQLValueString($_POST['txtVideo_01'], "text"),
                       GetSQLValueString($_POST['txtVideo_02'], "text"),
                       GetSQLValueString($_POST['txtVideo_03'], "text"),
                       GetSQLValueString($_POST['intEstado'], "int"),
                       GetSQLValueString($_POST['idOferta'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "ofer_acade.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}


mysql_select_db($database_conexion, $conexion);
$query_tipos = "SELECT * FROM tbloferta_tipo";
$tipos = mysql_query($query_tipos, $conexion) or die(mysql_error());
$row_tipos = mysql_fetch_assoc($tipos);
$totalRows_tipos = mysql_num_rows($tipos);

mysql_select_db($database_conexion, $conexion);
$query_modalidad = "SELECT * FROM tbloferta_modalidad";
$modalidad = mysql_query($query_modalidad, $conexion) or die(mysql_error());
$row_modalidad = mysql_fetch_assoc($modalidad);
$totalRows_modalidad = mysql_num_rows($modalidad);

mysql_select_db($database_conexion, $conexion);
$query_areas = "SELECT * FROM tbloferta_area";
$areas = mysql_query($query_areas, $conexion) or die(mysql_error());
$row_areas = mysql_fetch_assoc($areas);
$totalRows_areas = mysql_num_rows($areas);

$var_verifi = "0";
if (isset($_GET['id'])) {
  $var_verifi = $_GET['id'];
}
mysql_select_db($database_conexion, $conexion);
$query_verifi = sprintf("SELECT * FROM tbloferta_academica WHERE tbloferta_academica.idOferta = %s", GetSQLValueString($var_verifi, "int"));
$verifi = mysql_query($query_verifi, $conexion) or die(mysql_error());
$row_verifi = mysql_fetch_assoc($verifi);
$totalRows_verifi = mysql_num_rows($verifi);

mysql_select_db($database_conexion, $conexion);
$query_facilitador1 = "SELECT * FROM tblfacilitadores WHERE tblfacilitadores.intEstado = 1 ORDER BY tblfacilitadores.strNombre";
$facilitador1 = mysql_query($query_facilitador1, $conexion) or die(mysql_error());
$row_facilitador1 = mysql_fetch_assoc($facilitador1);
$totalRows_facilitador1 = mysql_num_rows($facilitador1);

mysql_select_db($database_conexion, $conexion);
$query_facilitador2 = "SELECT * FROM tblfacilitadores WHERE tblfacilitadores.intEstado = 1 ORDER BY tblfacilitadores.strNombre";
$facilitador2 = mysql_query($query_facilitador2, $conexion) or die(mysql_error());
$row_facilitador2 = mysql_fetch_assoc($facilitador2);
$totalRows_facilitador2 = mysql_num_rows($facilitador2);

mysql_select_db($database_conexion, $conexion);
$query_facilitador3 = "SELECT * FROM tblfacilitadores WHERE tblfacilitadores.intEstado = 1 ORDER BY tblfacilitadores.strNombre";
$facilitador3 = mysql_query($query_facilitador3, $conexion) or die(mysql_error());
$row_facilitador3 = mysql_fetch_assoc($facilitador3);
$totalRows_facilitador3 = mysql_num_rows($facilitador3);

mysql_select_db($database_conexion, $conexion);
$query_ano = "SELECT * FROM tblano ORDER BY tblano.idAno";
$ano = mysql_query($query_ano, $conexion) or die(mysql_error());
$row_ano = mysql_fetch_assoc($ano);
$totalRows_ano = mysql_num_rows($ano);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/Admin_02.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administraci&oacute;n Aseica</title>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
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
    
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
<h1 class="title">Oferta Academica</h1>
<p class="description">Contenido dentro de esta p&aacute;gina</p>
</div>
<!-- InstanceEndEditable -->

</div>

<!-- InstanceBeginEditable name="Contenido" -->


<script>
function subirimagen(nombrecampo, cardestino, id, imagen)
{
	self.name = 'opener';
	remote = open('imagenes_borra.php?campo='+nombrecampo+'&carpeta='+cardestino+'&id='+id+'&imag='+imagen, 'remote','width=500, height=200, location=no, scrollbars=yes, menubars=no, toolbars=no, resizable=yes, fullscreen=no, status=yes');
	remote.focus();
}
</script>

<div class="row">
  <div class="col-sm-12">
    
  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">Editando Oferta</h3>
  </div>
  <div class="panel-body">
    
  <a href="ofer_acade.php" class="btn btn-white btn-icon btn-icon-standalone btn-sm">
  <i class="fa-plus"></i><span>Regresar</span></a> <br>
  
  <div class="clearfix"></div>
  

  <form method="post" name="form1" action="<?php echo $editFormAction; ?>" class="form-horizontal">
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="strTitulo">Nombre de la Oferta</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span><span id="sprytextfield1">
  <input name="strTitulo" type="text" class="form-control" id="strTitulo" value="<?php echo $row_verifi['strTitulo']; ?>" />
  <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-2 control-label" for="txtImagen_Peq">Imagen Pequeña</label>
  <div class="col-sm-6"><span id="sprytextfield2">
    <input name="txtImagen_Peq" type="text" class="form-control" id="txtImagen_Peq" value="<?php echo $row_verifi['txtImagen_Peq']; ?>" >
    <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
  <div class="col-sm-3">
  <a class="btn btn-white btn-single" href="javascript:subirimagen('txtImagen_Peq', 'oferta_academica', '<?php echo $row_verifi['idOferta']; ?>', '<?php echo $row_verifi['txtImagen_Peq']; ?>')"><span>Buscar La Imagen</span></a>
  </div>
  </div>
    
  <div class="form-group-separator"></div>        
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="strDuracion">Duracion del Evento</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-database"></i></span>
  <input name="strDuracion" type="text" class="form-control" id="strDuracion" value="<?php echo $row_verifi['strDuracion']; ?>" />
  </div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>  
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="strHorario">Horario del Evento</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-database"></i></span><span id="sprytextfield4">
  <input name="strHorario" type="text" class="form-control" id="strHorario" value="<?php echo $row_verifi['strHorario']; ?>" />
  <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtDirigido_A">Dirigido A</label>
  <div class="col-sm-9"><span id="sprytextarea1">
    <textarea name="txtDirigido_A" cols="5" class="form-control" id="txtDirigido_A"><?php echo $row_verifi['txtDirigido_A']; ?></textarea>
    <span class="textareaRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtObj_Gene">Objetivo General</label>
  <div class="col-sm-9"><span id="sprytextarea2">
    <textarea name="txtObj_Gene" cols="5" class="form-control" id="txtObj_Gene"><?php echo $row_verifi['txtObj_Gene']; ?></textarea>
    <span class="textareaRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtObj_Espc_Cont">Objetivos especificos y Contenido</label>
  <div class="col-sm-9"><span id="sprytextarea3">
    <textarea name="txtObj_Espc_Cont" cols="5" class="form-control" id="txtObj_Espc_Cont"><?php echo $row_verifi['txtObj_Espc_Cont']; ?></textarea>
    <span class="textareaRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="intFacilitador">Facilitador 01</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span><span id="spryselect1">
  <select name="intFacilitador" class="form-control" >
    <?php do { ?>
    <option value="<?php echo $row_facilitador1['idFacilitador']?>" <?php if (!(strcmp($row_facilitador1['idFacilitador'], $row_verifi['intFacilitador']))) {echo "SELECTED";} ?>><?php echo $row_facilitador1['strNombre']?></option>
    <?php } while ($row_facilitador1 = mysql_fetch_assoc($facilitador1)); ?>
  </select>
  <span class="selectRequiredMsg">Seleccione un elemento.</span></span></div>
  </div>
  </div>                                
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="intFacilitador2">Facilitador 02</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span>
  <select name="intFacilitador2" class="form-control" >
  <option value="">Seleccionar</option>
  <?php do { ?>
  <option value="<?php echo $row_facilitador2['idFacilitador']?>" <?php if (!(strcmp($row_facilitador2['idFacilitador'], $row_verifi['intFacilitador2']))) {echo "SELECTED";} ?>><?php echo $row_facilitador2['strNombre']?></option>
  <?php } while ($row_facilitador2 = mysql_fetch_assoc($facilitador2)); ?>
  </select>
  </div>
  </div>
  </div>                                
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="intFacilitador3">Facilitador 03</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span>
  <select name="intFacilitador3" class="form-control" >
  <option value="">Seleccionar</option>
  <?php do { ?>
  <option value="<?php echo $row_facilitador3['idFacilitador']?>" <?php if (!(strcmp($row_facilitador3['idFacilitador'], $row_verifi['intFacilitador3']))) {echo "SELECTED";} ?>><?php echo $row_facilitador3['strNombre']?></option>
  <?php } while ($row_facilitador3 = mysql_fetch_assoc($facilitador3)); ?>
  </select>
  </div>
  </div>
  </div>                                
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="intArea">Tipo de Area</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-file-text"></i></span>
  <select name="intArea" class="form-control" >
  <?php do { ?>
  <option value="<?php echo $row_areas['idArea']?>" <?php if (!(strcmp($row_areas['idArea'], $row_verifi['intArea']))) {echo "SELECTED";} ?>><?php echo $row_areas['strDescripcion']?></option>
  <?php } while ($row_areas = mysql_fetch_assoc($areas)); ?>
  </select>
  </div>
  </div>
  </div>                                
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="intTipo_Ofer">Tipo de Evento</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-ils"></i></span>
  <select name="intTipo_Ofer" class="form-control" >
  <?php do { ?>
  <option value="<?php echo $row_tipos['idTipo']?>" <?php if (!(strcmp($row_tipos['idTipo'], $row_verifi['intTipo_Ofer']))) {echo "SELECTED";} ?>><?php echo $row_tipos['strTipo']?></option>
  <?php } while ($row_tipos = mysql_fetch_assoc($tipos)); ?>
  </select>
  </div>
  </div>
  </div>                                
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="intModalidad">Modalidad del Evento</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-check-square"></i></span>
  <select name="intModalidad" class="form-control" >
  <?php do { ?>
  <option value="<?php echo $row_modalidad['idModalidad']?>" <?php if (!(strcmp($row_modalidad['idModalidad'], $row_verifi['intModalidad']))) {echo "SELECTED";} ?>><?php echo $row_modalidad['strModalidad']?></option>
  <?php } while ($row_modalidad = mysql_fetch_assoc($modalidad)); ?>
  </select>
  </div>
  </div>
  </div>                                
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="strCosto">Costo del Evento</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-database"></i></span>
  <input name="strCosto" type="text" class="form-control" id="strCosto" value="<?php echo $row_verifi['strCosto']; ?>"/>
  </div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtInf_Adici">Informa&oacute;n Adicional</label>
  <div class="col-sm-9">
  <textarea name="txtInf_Adici" cols="5" class="form-control" id="txtInf_Adici"><?php echo $row_verifi['txtInf_Adici']; ?></textarea>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
   
   <div class="form-group">
  <label class="col-sm-3 control-label" for="txtBeneficios">Acreditación</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-database"></i></span>
  <input name="txtBeneficios" type="text" class="form-control" id="txtBeneficios" value="<?php echo $row_verifi['txtBeneficios']; ?>"/>
  </div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
  
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtIncluye">Que Incluye el Evento</label>
  <div class="col-sm-9">
  <textarea name="txtIncluye" cols="5" class="form-control" id="txtIncluye"><?php echo $row_verifi['txtIncluye']; ?></textarea>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtImagen_01">Imagen 01</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-file-image-o"></i></span>
  <input name="txtImagen_01" type="text" class="form-control" id="txtImagen_01" value="<?php echo $row_verifi['txtImagen_01']; ?>" />
  </div>
  </div>
  <div class="col-sm-3">
  <a class="btn btn-white btn-single" href="javascript:subirimagen('txtImagen_01', 'oferta_academica', '<?php echo $row_verifi['idOferta']; ?>', '<?php echo $row_verifi['txtImagen_01']; ?>')"><span>Buscar La Imagen</span></a>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtImagen_02">Imagen 02</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-file-image-o"></i></span>
  <input name="txtImagen_02" type="text" class="form-control" id="txtImagen_02" value="<?php echo $row_verifi['txtImagen_02']; ?>" />
  </div>
  </div>
  <div class="col-sm-3">
  <a class="btn btn-white btn-single" href="javascript:subirimagen('txtImagen_02', 'oferta_academica', '<?php echo $row_verifi['idOferta']; ?>', '<?php echo $row_verifi['txtImagen_02']; ?>')"><span>Buscar La Imagen</span></a>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtImagen_03">Imagen 03</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-file-image-o"></i></span>
  <input name="txtImagen_03" type="text" class="form-control" id="txtImagen_03" value="<?php echo htmlentities($row_verifi['txtImagen_03'], ENT_COMPAT, 'utf-8'); ?>"/>
  </div>
  </div>
  <div class="col-sm-3">
  <a class="btn btn-white btn-single" href="javascript:subirimagen('txtImagen_03', 'oferta_academica', '<?php echo $row_verifi['idOferta']; ?>', '<?php echo $row_verifi['txtImagen_03']; ?>')"><span>Buscar La Imagen</span></a>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtImagen_04">Imagen 04</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-file-image-o"></i></span>
  <input name="txtImagen_04" type="text" class="form-control" id="txtImagen_04" value="<?php echo htmlentities($row_verifi['txtImagen_04'], ENT_COMPAT, 'utf-8'); ?>"/>
  </div>
  </div>
  <div class="col-sm-3">
  <a class="btn btn-white btn-single" href="javascript:subirimagen('txtImagen_04', 'oferta_academica', '<?php echo $row_verifi['idOferta']; ?>', '<?php echo $row_verifi['txtImagen_04']; ?>')"><span>Buscar La Imagen</span></a>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtVideo_01">Enlace de Video 01</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-video-camera"></i></span>
  <input name="txtVideo_01" type="text" class="form-control" id="txtVideo_01" value="<?php echo htmlentities($row_verifi['txtVideo_03'], ENT_COMPAT, 'utf-8'); ?>"/>
  </div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtVideo_02">Enlace de Video 02</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-video-camera"></i></span>
  <input name="txtVideo_02" type="text" class="form-control" id="txtVideo_02" value="<?php echo htmlentities($row_verifi['txtVideo_02'], ENT_COMPAT, 'utf-8'); ?>"/>
  </div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="txtVideo_03">Enlace de Video 03</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-video-camera"></i></span>
  <input name="txtVideo_03" type="text" class="form-control" id="txtVideo_03" value="<?php echo htmlentities($row_verifi['txtVideo_03'], ENT_COMPAT, 'utf-8'); ?>" />
  </div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="intEstado">Estado</label>
  <div class="col-sm-6">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-certificate"></i></span>
  <select name="intEstado" class="form-control" >
  <option value="1" <?php if (!(strcmp(1, $row_verifi['intEstado']))) {echo "SELECTED";} ?>>Activo</option>
  <option value="0" <?php if (!(strcmp(0, $row_verifi['intEstado']))) {echo "SELECTED";} ?>>Desactivado</option>
  </select>
  </div>
  </div>
  </div>                                
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <button type="submit" class="btn btn-success">Actualizar</button>
  </div>
    
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="idOferta" value="<?php echo $row_verifi['idOferta']; ?>">
  </form>
    
    
    
  </div>
  </div>
    
  </div>
</div>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var sprytextarea3 = new Spry.Widget.ValidationTextarea("sprytextarea3");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
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
	
<!-- Imported styles on this page -->
<link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/multiselect/css/multi-select.css">
	
<!-- Bottom Scripts -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/xenon-api.js"></script>
<script src="assets/js/xenon-toggles.js"></script>
<script src="assets/js/moment.min.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/daterangepicker/daterangepicker.js"></script>
<script src="assets/js/datepicker/bootstrap-datepicker.js"></script>
<script src="assets/js/timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/js/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/select2/select2.min.js"></script>
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/js/typeahead.bundle.js"></script>
<script src="assets/js/handlebars.min.js"></script>
<script src="assets/js/multiselect/js/jquery.multi-select.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/tocify/jquery.tocify.min.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/rwd-table/js/rwd-table.min.js"></script>

<!-- JavaScripts initializations and stuff -->
<script src="assets/js/xenon-custom.js"></script>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($tipos);

mysql_free_result($modalidad);

mysql_free_result($areas);

mysql_free_result($verifi);

mysql_free_result($facilitador1);

mysql_free_result($facilitador2);

mysql_free_result($facilitador3);

mysql_free_result($ano);
?>
