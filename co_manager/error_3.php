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

$var_usua = "0";
if (isset($_POST['correo'])) {
  $var_usua = $_POST['correo'];
}
mysql_select_db($database_conexion, $conexion);
$query_usua = sprintf("SELECT * FROM tbladminis WHERE tbladminis.strEmail = %s", GetSQLValueString($var_usua, "text"));
$usua = mysql_query($query_usua, $conexion) or die(mysql_error());
$row_usua = mysql_fetch_assoc($usua);
$totalRows_usua = mysql_num_rows($usua);

?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/Admin_03.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administraci&oacute;n Aseica</title>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
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
<!-- InstanceBeginEditable name="head" -->

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
  <a href="dashboard-1.html" class="logo-expanded">
      <img src="assets/images/logo@2x.png" width="180" alt="Aseica Admin" />
  </a>
  
  <a href="dashboard-1.html" class="logo-collapsed">
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
<?php // include("includes/menu_primcipal.php"); ?>
</ul>
  
</div>

</div>

<div class="main-content">

<!-- User Info, Notifications and Menu Bar -->
<nav class="navbar user-info-navbar" role="navigation">
<?php // include("includes/barra_superior.php"); ?>
</nav>

<div class="page-title">

<!-- InstanceBeginEditable name="Titulo" -->
<div class="title-env">
<h1 class="title">Error de Acceso</h1>
<p class="description">Confirme los Siguientes Elementos</p>
</div>
<!-- InstanceEndEditable -->

</div>

<!-- InstanceBeginEditable name="Contenido" -->

<div class="row">
<div class="col-sm-12">
  
  <div class="panel panel-default">
  <div class="panel-heading">Hola <?php echo $row_usua['strNombre']; ?><br>
  <br>
    Responde tu pregunta secreta</div>
  <div class="panel-body">
    
  <div class="panel-body">
    
  <form name="form1" method="post" action="" class="form-horizontal">
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="strPreg_Secre">Pregunta Secreta</label>
    
  <div class="col-sm-9">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span>
  <input type="text" disabled class="form-control" id="strPreg_Secre" value="<?php echo $row_usua['strPreg_Secre']; ?>" />
  </div>
    
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="resp">Respuesta</label>
    
  <div class="col-sm-9">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span><span id="sprytextfield1">
  <input class="form-control" name="resp" type="password" id="resp" placeholder="Ingresa Tu Respuesta" />
  <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
    
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <button type="submit" class="btn btn-success">Confirmar</button>
  <button type="reset" class="btn btn-white">Reset</button>
  </div>
  <input name="correo" type="hidden" id="correo" value="<?php echo $row_usua['strEmail']; ?>">
    
  <?php
						
$resp = md5($_POST['resp']);
						
if (isset($_POST['resp']) && ($_POST['resp'] != '')){
                                
if ($resp == $row_usua['strResp_Secre']){ ?>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="resp">Ok</label>
    
  <div class="col-sm-9">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span>
  <input class="form-control" value="Respuesta Correcta" />
  </div>
    
  </div>
  </div>
    
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=error_4.php?id=<?php echo $row_usua['idAdmin']; ?>">	
    
  <?php } else { ?>	
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="resp">Error</label>
    
  <div class="col-sm-9">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span>
  <input class="form-control" value="Respuesta Incorrecta" />
  </div>
    
  </div>
  </div>			
  <?php } } ?>
    
  </form>
    
  </div>
  </div>
    
  </div>
</div>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
<!-- InstanceEndEditable -->

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

<!-- JavaScripts initializations and stuff -->
<script src="assets/js/xenon-custom.js"></script>

</body>
<!-- InstanceEnd --></html>
