<?php require_once('Connections/conexion.php'); if (!function_exists("GetSQLValueString")) { function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; } $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue); switch ($theType) { case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break; case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL"; break;case "double":$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";break;case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL"; break;  case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue; break;} return $theValue;}} $pg = 7;mysql_select_db($database_conexion, $conexion);$query_contacto = "SELECT * FROM tblcontacto";$contacto = mysql_query($query_contacto, $conexion) or die(mysql_error());$row_contacto = mysql_fetch_assoc($contacto);$totalRows_contacto = mysql_num_rows($contacto);?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Academia de Servicios Educativos Integrales</title>
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
<link rel="stylesheet" type="text/css" href="css/pk.css" />


<!-- LayerSlider -->
<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
<link rel="stylesheet" href="layerslider/assets/css/style.css" type="text/css">

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

<div id="c1" class="suscriber-form">
  <div class="foot-widget-title" id="boletin"> Boletín ASEICA</div>
  <p>Enterate de lo más importate del mundo Gerencial</p>
 	<form action="inscripcion_boletin" method="post" name="form1">

<label for="titulo" class="news-button" >Titulo</label>
<select name="titulo" class="news-tb" >
<option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Sr.</option>
<option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Srta.</option>
<option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Sra.</option>
<option value="4" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>Lic.</option>
<option value="5" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>>Licda.</option>
<option value="6" <?php if (!(strcmp(6, ""))) {echo "SELECTED";} ?>>MSc.</option>
<option value="7" <?php if (!(strcmp(7, ""))) {echo "SELECTED";} ?>>Dr.</option>
<option value="8" <?php if (!(strcmp(8, ""))) {echo "SELECTED";} ?>>Dra.</option>
</select>
<div class="clearfix"></div>
<label for="nombre" class="news-button">Nombre</label>
<input type="text" class="news-tb" name="nombre" id="nombre" />
<div class="clearfix"></div>
<label for="apellido" class="news-button">Apellido</label>
<input type="text" class="news-tb" name="apellido" id="apellido" />
<div class="clearfix"></div>
<input name="email" type="text" class="news-tb" id="email" placeholder="Email" />
<button class="news-button">Suscribirse</button>
<input type="hidden" name="MM_insert" value="form1">
</form>
 </div>  
<!--<div id="loader-overlay"><img src="../images/loader.gif" alt="Loading" /></div>-->

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

<div class="social-wrap-head col-col-xs-12 no-pad letras_supe">ACADEMIA DE SERVICIOS EDUCATIVOS INTEGRALES &nbsp;&nbsp;&nbsp;&nbsp;<span class="let_pqn">J-29560193-0</span>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-3 col-xs-offset-8">
      <div class="redes-top">
      <ul>
      <?php include("includes/redes_sociales.php"); ?>
      </ul>
  </div>
  
</div>  
  </div>
</div>

</div>                            
</div>
</div><!--Topbar-info-close-->

<div id="headerstic">

<div class="top-bar container">
<div class="row fonfo_blanco">
<nav class="navbar navbar-default navbar-customizer" role="navigation">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header col-lg-2 col-md-2 col-xs-12">
      
      <button type="button" class="navbar-toggle icon-list-ul" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      </button>
      <button type="button" class="navbar-toggle icon-rocket" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
      <span class="sr-only">Toggle navigation</span>
      </button>
        
      <a href="index.php"><div class="logo"><img src="imagenes/logo/logo-pequeno-2.png"></div></a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="col-lg-7 col-md-7S col-sm-6 col-xs-12">
<div class="collapse navbar-collapse colla" id="bs-example-navbar-collapse-1">
  
<ul class="nav navbar-nav  nav-pills nav-pills-customizer">
<?php include("includes/menu_supe.php"); ?>
</ul>
</div>
</div>
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
  <a id="d2" onclick="boletin();" class="btn btn-default btn-customizer">REGISTRATE</a>
</div>

<!-- /.navbar-collapse -->

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
  
  <div class="bread-crumb-wrap ibc-wrap-4">
  <div class="container">
  <!--Title / Beadcrumb-->
  <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
  <div class="bread-heading">
    <h1>ContActO</h1>
  </div>
  </div>
  </div>
  </div>
    <div class="container">
    
  <!--About-us top-content-->
    
  <div class="row">
  <!-- form -->
  <script type="text/javascript" src="js/form-validation.js"></script>
    
  <div class="col-xs-12 col-lg-12  col-sm-12 col-md-12 pull-left contact2-wrap no-pad">
    
  <!--contact widgets-->
  <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 pull-left no-pad">
    
  <div class="subtitle col-xs-12 no-pad col-sm-12 col-md-12 pull-left news-sub icontact-widg">Formulario de Contacto</div>
    
  <!--Contact form-->
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="160">
    
  <!-- form -->
  <script type="text/javascript" src="js/form-validation.js"></script>
    
  <form id="contactForm" action="#" method="post" class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1" >
    
  <fieldset>
  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 control-group">
  <input name="name" id="name" type="text" class="contact2-textbox" placeholder="Nombre y Apellido" />
  </div>
    
  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 control-group">
  <input name="email"  id="email" type="text" class="contact2-textbox" placeholder="Email" />
  </div>
    
  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 control-group">
  <input name="tel" id="tel" type="text" class="contact2-textbox" placeholder="Tel&eacute;fono" />
  </div>
    
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  <textarea name="comments" id="comments" rows="5" cols="20" class="contact2-textarea" placeholder="Mensaje"></textarea>
  </div>
    
  <input type="button" value="Enviar" name="submit" id="submit" class="icon-mail btn2-st2 btn-7 btn-7b" />
    
  <div class="alert alert-error" id="error">
  <strong>Error!</strong> Error al enviar el mensaje.
  </div>
    
  <!-- send mail configuration -->
  <input type="hidden" value="contacto@aseica.com.ve" name="to" id="to" />
  <input type="hidden" value="Envio de mensaje por Contacto Aseica" name="subject" id="subject" />
  <input type="hidden" value="send-mail.php" name="sendMailUrl" id="sendMailUrl" />
  <!-- ENDS send mail configuration -->
  <br>
  <br>
  <br>
    
  </fieldset>						
  </form>
    
  <div class="alert alert-success" id="sent-form-msg">
  <strong>Formulario de datos enviados. </strong> Se ha enviado una copia a tu email, si no puedes ver esta busca en la carpeta Spam<br>
    Gracias por tus comentarios.
  </div>
    
    
  </div>
    
  </div>
    
  </div>
    
  </div>
    
  </div>
  <!--map-->
  <div class="pull-left map-full no-pad contact-v1-map">
  <div id="map-canvas"></div>
  <div class="map-shadow"></div>
  </div>
  
  
  <div class="contact-widgets-wrap">
    
  <div class="container">
    
  <div class="row">
    
  <div class="contact-widgets">
    
    <!--contact-widget-box-->
    <div class="contact-widget-box col-md-3 col-lg-3 col-sm-6 col-xs-12 wow bounceIn" data-wow-delay="0.5s" data-wow-offset="10">
      <div class="fold-wrap"><i class="icon-phone2 cw-icon"></i></div>
      <div class="contact-widget-title">Tel&eacute;fono</div>
      <p><?php echo $row_contacto['strTelefono_01']; ?> <br><?php echo $row_contacto['strTelefono_02']; ?></p>
      </div>
    
    <!--contact-widget-box-->
    <div class="contact-widget-box col-md-3 col-lg-3 col-sm-6 col-xs-12 wow bounceIn" data-wow-delay="0.8s" data-wow-offset="10">
      <div class="fold-wrap"><i class="icon-mail cw-icon"></i></div>
      <div class="contact-widget-title">Email</div>
      <p><a href="mailto:<?php echo $row_contacto['strEmail_01']; ?>"><?php echo $row_contacto['strEmail_01']; ?></a></p>
      </div>
    
    <!--contact-widget-box-->
    <div class="contact-widget-box col-md-6 col-lg-6 col-sm-6 col-xs-12 wow bounceIn" data-wow-delay="01.2s" data-wow-offset="10">
      <div class="fold-wrap"><i class="icon-globe cw-icon"></i></div>
      <div class="contact-widget-title">Horario</div>
      <p><?php echo $row_contacto['strHorario']; ?></p>
      </div>
    
    <!--contact-widget-box-->
    <div class="contact-widget-box col-md-6 col-lg-6 col-sm-6 col-xs-12 wow bounceIn" data-wow-delay="0.3s" data-wow-offset="10">
      <div class="fold-wrap"><i class="icon-globe cw-icon"></i></div>
      <div class="contact-widget-title">Direcci&oacute;n</div>
      <div class="clearf"></div>
      <p><?php echo $row_contacto['txtDireccion']; ?></p>
      </div>
    
  </div>
  <!--Contact widgets end-->
    
  </div>                    
    
  </div>
    
  </div>       
  

  
</div>

<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script type="text/javascript">

$("#map-canvas").gMap({	
	styles:[{stylers:[
{
	featureType: 'water', // set the water color
	elementType: 'geometry.fill', // apply the color only to the fill
	stylers: [
		{ color: '#adc9b8' }
	]
},{
	featureType: 'landscape.natural', // set the natural landscape
	elementType: 'all',
	stylers: [
		{ hue: '#809f80' },
		{ lightness: -35 }
	]
}
,{
	featureType: 'poi', // set the point of interest
	elementType: 'geometry',
	stylers: [
		{ hue: '#f9e0b7' },
		{ lightness: 30 }
	]
},{
	featureType: 'road', // set the road
	elementType: 'geometry',
	stylers: [
		{ hue: '#d5c18c' },
		{ lightness: 14 }
	]
},{
	featureType: 'road.local', // set the local road
	elementType: 'all',
	stylers: [
		{ hue: '#ffd7a6' },
		{ saturation: 100 },
		{ lightness: -12 }
	]
}
]}],
	controls: true,
	scrollwheel: true,
	maptype: 'SATELLITE',
	markers: [
		{
			latitude: <?php echo $row_contacto['txtLatitud']; ?>,
			longitude: <?php echo $row_contacto['strLongitud']; ?>,
			icon: {
				image: "images/location.png",
				iconsize: [85, 121],
				iconanchor: [85, 121]
			}
		},

	],
	icon: {
		image: "images/location.png", 
		iconsize: [85, 121],
		iconanchor: [85, 121]
	},
	latitude: <?php echo $row_contacto['txtLatitud']; ?>,
	longitude: <?php echo $row_contacto['strLongitud']; ?>,
	
	zoom: 18,
	mapTypeId: 'Styled'

});

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
<script >
  function boletin(){
  console.log("bot");
  $("#c1").addClass("suscriber-form-active");
  $("#d2").attr("onclick","ocultar()");
}
function ocultar(){
  console.log("hidde");
  $("#c1").removeClass("suscriber-form-active");
  $("#d2").attr("onclick","boletin()");
}
</script>
</body>
</html>
<?php  //  mysql_free_result($contacto);?>

 










































//