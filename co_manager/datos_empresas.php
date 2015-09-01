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

$currentPage = $_SERVER["PHP_SELF"];


$maxRows_empresas = 15;
$pageNum_empresas = 0;
if (isset($_GET['pageNum_empresas'])) {
  $pageNum_empresas = $_GET['pageNum_empresas'];
}
$startRow_empresas = $pageNum_empresas * $maxRows_empresas;

mysql_select_db($database_conexion, $conexion);
$query_empresas = "SELECT * FROM tbldatos_empresas ORDER BY tbldatos_empresas.strNombre";
$query_limit_empresas = sprintf("%s LIMIT %d, %d", $query_empresas, $startRow_empresas, $maxRows_empresas);
$empresas = mysql_query($query_limit_empresas, $conexion) or die(mysql_error());
$row_empresas = mysql_fetch_assoc($empresas);

if (isset($_GET['totalRows_empresas'])) {
  $totalRows_empresas = $_GET['totalRows_empresas'];
} else {
  $all_empresas = mysql_query($query_empresas);
  $totalRows_empresas = mysql_num_rows($all_empresas);
}
$totalPages_empresas = ceil($totalRows_empresas/$maxRows_empresas)-1;

$queryString_empresas = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_empresas") == false && 
        stristr($param, "totalRows_empresas") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_empresas = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_empresas = sprintf("&totalRows_empresas=%d%s", $totalRows_empresas, $queryString_empresas);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/Admin_02.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
<h1 class="title">Base de Datos Asica</h1>
<p class="description">Contenido de las Bases de Datos</p>
</div>
<!-- InstanceEndEditable -->

</div>

<!-- InstanceBeginEditable name="Contenido" -->
<script> function asegurar() { rc = confirm("¿Seguro lo desea eliminar?");  return rc; } </script>

<!-- Responsive Table -->
<div class="row">
<div class="col-md-12">

<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Listas de las Empresas</h3><br>
<br>
    <a href="datos_empresas_add.php" class="btn btn-success">Agregar Nueva</a>
    
    <div class="panel-options">
    <form method="get" action="extra-search.html">
    <input type="text" name="s" class="form-control search-field" placeholder="Buscar por Nombre..." />    <button type="submit" class="btn btn-link"><i class="linecons-search"></i></button>
    </form>

    </div>
</div>
<div class="panel-body">
    
    <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
    
          <table cellspacing="0" class="table table-small-font table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th data-priority="1">RIF</th>
                <th data-priority="6">Razon Social</th>
                <th data-priority="1">Teléfono01</th>
                <th data-priority="4">Teléfono02</th>
                <th data-priority="5">Teléfono03</th>
                <th data-priority="3">Email 01</th>
                <th data-priority="4">Email 02</th>
                <th data-priority="5">Email 03</th>
                <th data-priority="5">Direcci&oacute;on</th>
                <th data-priority="1">Acciones</th>
                </tr>
              </thead>
            <tbody>
              <?php do { ?>
              <tr>
                <th><?php echo $row_empresas['strNombre']; ?></th>
                <td><?php echo ObtNA($row_empresas['strRif']); ?></td>
                <td><?php echo $row_empresas['strRazon_Social']; ?></td>
                <td><?php echo ObtNA($row_empresas['strTelefono_01']); ?></td>
                <td><?php echo ObtNA($row_empresas['strTelefono_02']); ?></td>
                <td><?php echo ObtNA($row_empresas['strTelefono_03']); ?></td>
                <td><?php echo ObtNA($row_empresas['strEmail_01']); ?></td>
                <td><?php echo ObtNA($row_empresas['strEmail_02']); ?></td>
                <td><?php echo ObtNA($row_empresas['strEmail_03']); ?></td>
                <td><?php echo ObtNA($row_empresas['txtDireccion']); ?></td>
                <td><a href="datos_empresas_edit.php?id=<?php echo $row_empresas['idEmpresa']; ?>" class="btn btn-icon btn-warning"><i class="fa-edit"></i></a> <a href="datos_empresas_dell.php?id=<?php echo $row_empresas['idEmpresa']; ?>" onclick="javascript:return asegurar();" class="btn btn-icon btn-red"><i class="fa-remove"></i></a></td>
                </tr>
				<?php } while ($row_empresas = mysql_fetch_assoc($empresas)); ?>                
              </tbody>
          </table>
          
    
    </div>
    
    <script type="text/javascript">
    // This JavaScript Will Replace Checkboxes in dropdown toggles
    jQuery(document).ready(function($)
    {
        setTimeout(function()
        {
            $(".checkbox-row input").addClass('cbr');
            cbr_replace();
        }, 0);
    });
    </script>

<ul class="pager">
<?php if ($pageNum_empresas > 0) { // Show if not first page ?>
<li><a href="<?php printf("%s?pageNum_empresas=%d%s", $currentPage, 0, $queryString_empresas); ?>"><i class="fa-angle-double-left"></i> Primero</a></li>
<?php } // Show if not first page ?>
<?php if ($pageNum_empresas > 0) { // Show if not first page ?>
<li><a href="<?php printf("%s?pageNum_empresas=%d%s", $currentPage, max(0, $pageNum_empresas - 1), $queryString_empresas); ?>"><i class="fa-angle-double-left"></i> Anterior</a></li>
            <?php } // Show if not first page ?>
<li><a href="#">Empresas <?php echo ($startRow_empresas + 1) ?> a <?php echo min($startRow_empresas + $maxRows_empresas, $totalRows_empresas) ?> de <?php echo $totalRows_empresas ?></a></li>
        <td><?php if ($pageNum_empresas < $totalPages_empresas) { // Show if not last page ?>
<li><a href="<?php printf("%s?pageNum_empresas=%d%s", $currentPage, min($totalPages_empresas, $pageNum_empresas + 1), $queryString_empresas); ?>">Siguiente <i class="fa-angle-double-right"></i></a></li>
<?php } // Show if not last page ?>
<?php if ($pageNum_empresas < $totalPages_empresas) { // Show if not last page ?>
<li><a href="<?php printf("%s?pageNum_empresas=%d%s", $currentPage, $totalPages_empresas, $queryString_empresas); ?>">&Uacute;ltimo <i class="fa-angle-double-right"></i></a></li>
<?php } // Show if not last page ?>
</ul>
</div

></div>
</div>
</div>

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
mysql_free_result($empresas);
?>
