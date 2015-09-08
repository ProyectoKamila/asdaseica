<?php require_once('Connections/conexion.php'); ?>
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
$pg = 1;

$maxRows_oferta = 10;
$pageNum_oferta = 0;
if (isset($_GET['pageNum_oferta'])) {
  $pageNum_oferta = $_GET['pageNum_oferta'];
}
$startRow_oferta = $pageNum_oferta * $maxRows_oferta;

mysql_select_db($database_conexion, $conexion);
$query_oferta = "SELECT * FROM tbloferta_academica WHERE tbloferta_academica.intEstado = 1 ORDER BY RAND()";
$query_limit_oferta = sprintf("%s LIMIT %d, %d", $query_oferta, $startRow_oferta, $maxRows_oferta);
$oferta = mysql_query($query_limit_oferta, $conexion) or die(mysql_error());
$row_oferta = mysql_fetch_assoc($oferta);

if (isset($_GET['totalRows_oferta'])) {
  $totalRows_oferta = $_GET['totalRows_oferta'];
} else {
  $all_oferta = mysql_query($query_oferta);
  $totalRows_oferta = mysql_num_rows($all_oferta);
}
$totalPages_oferta = ceil($totalRows_oferta/$maxRows_oferta)-1;

mysql_select_db($database_conexion, $conexion);
$query_slider = "SELECT * FROM tblslider_inicio WHERE tblslider_inicio.intEstado = 1";
$slider = mysql_query($query_slider, $conexion) or die(mysql_error());
$row_slider = mysql_fetch_assoc($slider);
$totalRows_slider = mysql_num_rows($slider);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/Base_Pagina_01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Academia de Servicios Educativos Integrales</title>
<!-- InstanceEndEditable -->
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
<link rel="stylesheet" type="text/css" href="css/inline.css" />
<link rel="stylesheet" type="text/css" href="css/pk.css" />

<!-- LayerSlider -->
<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
<link rel="stylesheet" href="layerslider/assets/css/style.css" type="text/css">
    
<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->

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
        height: 380,
        hoverPrevNext : false,
        autoPlayVideos : false
    });
});		
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



</head>

<body>
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
  <a id="d2" onclick="boletin();" class="btn btn-default btn-customizer">BOLETÍN ASEICA</a>
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

<!-- InstanceBeginEditable name="Contenido" -->
<div class="container">
  <div class="row">
<!--Start LayerSlider-->
    <div id="layerslider-container">
  
  <div id="layerslider"style="width: 960px; height: 420px; margin: 0 auto;">
  <?php do { ?>
  
  <?php if ($row_slider['intEstilo'] == 1) { ?>
  <div class="ls-layer"style="slidedelay: 7500; transition2d: 24,25,27,28,34,35,37,38,110,113; ">
  
  <img src="imagenes/slider_prin/<?php echo $row_slider['txtImagen']; ?>" class="ls-bg" alt="<?php echo $row_slider['strTitulo']; ?>">
  
  <?php if ($row_slider['txtTexto_01'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl1" style="top: 100px; left: 50%; slidedirection : fade; slideoutdirection : top; durationout : 1500; scalein : 0; showuntil : 1000;"><?php echo $row_slider['txtTexto_01']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_02'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 green" style="top:200px; left: 50%; slidedirection: fade; slideoutdirection : bottom; durationout : 1500; scalein : 0; showuntil : 1000;"><?php echo $row_slider['txtTexto_02']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_03'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 green" style="top:100px; left: 244px; slidedirection : fade; durationin : 2000; delayin : 2000; rotatein : -90; rotateout : -90; scalein : 2.5; scaleout : 0;"><?php echo $row_slider['txtTexto_03']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_04'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 green" style="top:100px; left: 365px; slidedirection : fade; slideoutdirection : top; durationin : 1500; easingin : easeInOutQuart; delayin : 1600; scalein : 5;"><?php echo $row_slider['txtTexto_04']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_05'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 green" style="top:100px; left: 635px; slidedirection : fade; durationin : 2000; delayin : 2200; rotatein : 90; rotateout : 90; scalein : 2.5; scaleout : 0;"><?php echo $row_slider['txtTexto_05']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_06'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 black" style="top:175px; left: 244px; slidedirection : fade; slideoutdirection : left; durationin : 1500; easingin : easeInOutQuart; delayin : 1800; scalein : 5;"><?php echo $row_slider['txtTexto_06']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_07'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 black"style="top:175px; left: 510px; slidedirection : fade; slideoutdirection : right; durationin : 1500; easingin : easeInOutQuart; delayin : 1500; scalein : 5;"><?php echo $row_slider['txtTexto_07']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_08'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 grey"style="top:250px; left: 244px; slidedirection : fade; durationin : 2000; delayin : 2100; rotatein : 90; rotateout : 90; scalein : 2.5; scaleout : 0;"><?php echo $row_slider['txtTexto_08']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_09'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 grey"style="top:250px; left: 358px; slidedirection : fade; slideoutdirection : bottom; durationin : 1500; easingin : easeInOutQuart; delayin : 1700; scalein : 5;"><?php echo $row_slider['txtTexto_09']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_10'] != '') { ?>
  <h5 class="ls-s-1 br5 c sl2 grey"style="top:250px; left: 562px; slidedirection : fade; durationin : 2000; delayin : 2300; rotatein : -90; rotateout : -90; scalein : 2.5; scaleout : 0;"><?php echo $row_slider['txtTexto_10']; ?></h5>
  <?php } ?>
  
  </div>
  <?php } ?>
  
  <?php if ($row_slider['intEstilo'] == 2) { ?>
  <div class="ls-layer" style="slidedelay: 7000; transition2d: 76,77,78,79; ">
  
  <img src="imagenes/slider_prin/<?php echo $row_slider['txtImagen']; ?>" class="ls-bg" alt="<?php echo $row_slider['strTitulo']; ?>">
  
  <?php if ($row_slider['txtTexto_01'] != '') { ?>
  <h5 class="ls-s-1 plus1" style="top:100px; left: 100px; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 1500; easingin : easeOutQuint; rotatein : 90; rotateout : 90; scalein : .5; scaleout : .5;"><?php echo $row_slider['txtTexto_01']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_02'] != '') { ?>
  <h5 class="ls-s1 text6" style="top:103px; left: 165px; slidedirection : left; slideoutdirection : left; durationout : 1500; easingin : easeOutBack; scalein : .1; scaleout : .1;"><?php echo $row_slider['txtTexto_02']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_03'] != '') { ?>
  <h5 class="ls-s-1 plus1" style="top:160px; left: 100px; slidedirection : fade; slideoutdirection : fade; durationin : 1500; durationout : 950; easingin : easeOutQuint; delayin : 500; rotatein : 90; rotateout : 90; scalein : .5; scaleout : .5;"><?php echo $row_slider['txtTexto_03']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_04'] != '') { ?>
  <h5 class="ls-s1 text6" style="top:163px; left: 165px; slidedirection : left; slideoutdirection : left; durationout : 1500; easingin : easeOutBack; delayin : 900; scalein : .1; scaleout : .1;"><?php echo $row_slider['txtTexto_04']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_05'] != '') { ?>
  <h5 class="ls-s-1 text2 br100" style="top:80%; left: 50%; slidedirection : bottom; slideoutdirection : bottom; durationin : |550; durationout : 1500; easingin : easeOutQuint; delayin : 1000; scalein : .5;"><?php echo $row_slider['txtTexto_05']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_06'] != '') { ?>
  <h5 class="ls-s6 text-a" style="top:79%; left: 57%; slidedirection : fade; slideoutdirection : fade; easingin : easeOutQuint; delayin : 1650; scalein : 3; scaleout : 3;"><?php echo $row_slider['txtTexto_06']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_07'] != '') { ?>
  <h5 class="ls-s-1 text7 br100" style="top:50%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 850; easingin : easeOutQuart; easingout : easeInQuart; delayin : 2150; scalein : 0; scaleout : 3; showuntil : 51;"><?php echo $row_slider['txtTexto_07']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_08'] != '') { ?>
  <h5 class="ls-s-1 text7 br100" style="top:50%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 1650; easingin : easeOutQuart; easingout : easeInQuart; delayin : 3650; scalein : 0; scaleout : 3; showuntil : 51;"><?php echo $row_slider['txtTexto_08']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_09'] != '') { ?>
  <h5 class="ls-s-1 text7 br100" style="top:50%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 850; easingin : easeOutQuart; easingout : easeInQuart; delayin : 5150; scalein : 0; scaleout : 3;"><?php echo $row_slider['txtTexto_09']; ?></h5>
  <?php } ?>
  
  <?php if ($row_slider['txtTexto_10'] != '') { ?>
  <h5 class="ls-s-1 text7 br100" style="top:50%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 850; easingin : easeOutQuart; easingout : easeInQuart; delayin : 5150; scalein : 0; scaleout : 3;"><?php echo $row_slider['txtTexto_10']; ?></h5>
  <?php } ?>
  
  </div>
  <?php } ?>
  
  <?php if ($row_slider['intEstilo'] == 3) { ?>
  <div class="ls-layer"style="slidedelay: 4000; transition2d: 92,93; ">
  
  <img src="imagenes/slider_prin/<?php echo $row_slider['txtImagen']; ?>" class="ls-bg" alt="<?php echo $row_slider['strTitulo']; ?>">
  
  <div class="ls-s-1" style="top:0px; left: 0px; slidedirection: fade; slideoutdirection: fade; durationin: 2500; durationout: 1500;">
  <?php echo $row_slider['txtVideo']; ?>
  </div>
  
  </div>
  <?php } ?>
  
  <?php } while ($row_slider = mysql_fetch_assoc($slider)); ?>
  </div>
  
  </div>
  <!--End LayerSlider-->
  <div class="clearfix"></div>
    <div class="container-fluid">
      <div class="row">
  <div class="col-sm-4 col-xs-6 col-md-4 col-lg-2">
    <div class="hd">
    <div class="icon"> <span class="fa fa-thumbs-up fa-4x"></span></div>
      <div class="texto">
        Emprendedores
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-xs-6 col-md-4 col-lg-2">
    <div class="hd">
    <div class="icon"> <span class="fa fa-area-chart fa-4x"></span></div>
      <div class="texto">
        plataforma al exito
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-xs-6 col-md-4 col-lg-2">
    <div class="hd">
        <div class="icon"><span class="fa fa-4x fa-users"></span></div>
        <div class="texto">
          Cursos
        </div>
      </div>
  </div>
  <div class="col-sm-4 col-xs-6 col-md-4 col-lg-2">
    <div class="hd">
      <div class="icon"><span class="fa fa-4x fa-line-chart"></span></div>
      <div class="texto">
        impulso estrategico
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-xs-6 col-md-4 col-lg-2">
    <div class="hd">
      <div class="icon"><span class="fa fa-4x  fa-newspaper-o"></span></div>
      <div class="texto">
        noticias del blog
      </div>
    </div>
  </div>
  </div>
    </div>
  </div>
</div>

<div class="parallax-out wpb_row vc_row-fluid ihome-parallax">    

<div id="second" class="upb_row_bg vcpb-hz-jquery" data-upb_br_animation="" data-parallax_sense="30" data-bg-override="ex-full">

<div class="container">
<div class="row">

<div class=" col-lg-4 col-sm-4 col-md-5 col-xs-12 notViewed wow fadeInUp" data-wow-delay="1.5s" data-wow-offset="200" style="background:none !important;">
<a class="twitter-timeline" href="https://twitter.com/aseicadevzla" data-widget-id="639169187022282752">Tweets por el @aseicadevzla.</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<div class="float-right col-lg-7 col-sm-7 col-md-7 col-xs-12">

<div class="iconlist-wrap">
<!-- <div class="subtitle notViewed wow fadeInRight" data-wow-delay="0.5s" data-wow-offset="20">cursos <span class="iconlist-mid-title">premiun</span></div> -->

<div class="subtitle notViewed wow fadeInRight" data-wow-delay="0.5s" data-wow-offset="20">cursos</div>
<ul>
<li class="notViewed wow fadeInDown" data-wow-delay="0.5s" data-wow-offset="50">
<a href="company_oferta"><i class="icon-hospital2 icon-list-icons"></i>
<div class="iconlist-content">

<div class="iconlist-title">In Company</div>
<p class="iconlist-text">Converse con nosotros y le garantizamos una propuesta de capacitaci&oacute;n y desarrollo de alta flexibilidad para su empresa o negocio.</p>
</div>
</a>
</li>

<li class="notViewed wow fadeInDown" data-wow-delay="0.5s" data-wow-offset="60">
<a href="open_oferta">
<i class="fa fa-user-md icon-list-icons"></i>
<div class="iconlist-content">

<div class="iconlist-title">Cursos Abiertos</div>
<p class="iconlist-text">Visite nuestra oferta de cursos abiertos y encuentre ese conocimiento que espec&iacute;ficamente necesita para su crecimiento profesional.</p>
</div>
</a>
</li>
</ul>
</div>


</div>
</div> <!--.story-->
</div>
</div> <!--#second-->

</div>

<!-- InstanceEndEditable -->

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
<!-- InstanceEnd --></html>
<?php
mysql_free_result($oferta);

mysql_free_result($slider);
?>
