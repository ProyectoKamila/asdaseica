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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=md5($_POST['passwd']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "principal.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion, $conexion);
  
  $LoginRS__query=sprintf("SELECT idAdmin, strNombre, strPass FROM tbladminis WHERE strNombre=%s AND strPass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
  $row_LoginRS = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_idAdmin'] = $row_LoginRS['idAdmin'];	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/Admin_01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->


</head>

<body class="page-body login-page">


<div class="login-container">

<div class="row">

<!-- InstanceBeginEditable name="contenido" -->

<div class="col-sm-6">

<script type="text/javascript">
jQuery(document).ready(function($)
{
// Reveal Login form
setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);


// Validation and Ajax action
$("form#login").validate({
rules: {
username: {
required: true
},

passwd: {
required: true
}
},

messages: {
username: {
required: 'Introduzca su nombre de usuario.'
},

passwd: {
required: 'Por favor, introduzca su contraseña.'
}
},

});

// Set Form focus
$("form#login .form-group:has(.form-control):first .form-control").focus();
});
</script>

<!-- Errors container -->
<div class="errors-container">


</div>

<!-- Add class "fade-in-effect" for login form effect -->
<form action="<?php echo $loginFormAction; ?>" method="POST" name="login" class="login-form fade-in-effect" id="login" role="form">

<div class="login-header">
<a href="dashboard-1.html" class="logo">
<img src="../imagenes/logo/logo-pequeno.png" alt="" width="400" />
<span>Iniciar sesi&oacute;n</span>
</a>

<p>Estimado usuario, inicie sesi&oacute;n para acceder al &aacute;rea de administraci&oacute;n!</p>
</div>


<div class="form-group">
<label class="control-label" for="username">Nombre de Usuario</label>
<input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
</div>

<div class="form-group">
<label class="control-label" for="passwd">Contrase&ntilde;a</label>
<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
</div>

<div class="form-group">
<button type="submit" class="btn btn-dark  btn-block text-left">
<i class="fa-lock"></i>
Iniciar Sesi&oacute;n
</button>
</div>

<div class="login-footer">
<a href="error_2.php">Olvidaste tu contrase&ntilde;a?</a>

</div>

</form>

</div>

<!-- InstanceEndEditable -->

</div>

</div>



<!-- Bottom Scripts -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/xenon-api.js"></script>
<script src="assets/js/xenon-toggles.js"></script>
<script src="assets/js/jquery-validate/jquery.validate.min.js"></script>
<script src="assets/js/toastr/toastr.min.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="assets/js/xenon-custom.js"></script>

</body>
<!-- InstanceEnd --></html>
