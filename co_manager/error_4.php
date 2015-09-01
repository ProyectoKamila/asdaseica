<?php require_once('../Connections/conexion.php'); ?>
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
  <div class="panel-heading">
  <h3 class="panel-title">Ingresa Tu Nueva Contraseña</h3>
  </div>
  <div class="panel-body">
    
  <form role="form" class="form-horizontal">
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="strPass">Contraseña Nueva</label>
  <div class="col-sm-9">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span><span id="sprytextfield1">
  <input name="strPass" type="password" class="form-control" id="strPass" />
  <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <label class="col-sm-3 control-label" for="strPass2">Repetir La Contraseña</label>
  <div class="col-sm-9">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-user"></i></span>
  <input name="strPass2" type="password" class="form-control" id="strPass2" />
  </div>
  </div>
  </div>
    
  <div class="form-group-separator"></div>
    
  <div class="form-group">
  <button type="submit" class="btn btn-success">Confirmar</button>
  <button type="reset" class="btn btn-white">Reset</button>
  </div>
    
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="idAdmin" value="<?php echo $row_usua['idAdmin']; ?>">
    
  </form>
    
  </div>
  </div>
    
  <div class="clearfix"></div>
    
  <?php
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
                            
if ($_POST['strPass'] == $_POST['strPass2']){

$updateSQL = sprintf("UPDATE tbladminis SET strPass=%s WHERE idAdmin=%s",
GetSQLValueString(md5($_POST['strPass']), "text"),
GetSQLValueString($_POST['idAdmin'], "int"));
                                        
mysql_select_db($database_conexion, $conexion);
$Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

?>
    
    <META HTTP-EQUIV="Refresh" CONTENT="1; URL=error_5.php">
    
    <?php } else { ?>
    
    <table border="1" align="center">
      <tr align="center">
        <td bgcolor="#FFC1C1"><strong>Las Contraseñas no son identicas</strong></td>
        </tr>
      </table>
    
    <?php }	} ?> 
    
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
