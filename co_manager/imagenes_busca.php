<?php require_once('../Connections/conexion.php'); ?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Administraci&oacute;n Aseica</title>
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

<body class="page-body">

<div class="page-container">

<div class="main-content">

<div class="row">
<div class="col-sm-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Buscarndo Nueva Imagen</h3>
</div>
<div class="panel-body">


<?php 

	
// Remplaso para URL
function RemUrl3($str) { 
    $str = str_replace( 'Ã€', 'A', $str ); 
    $str = str_replace( 'Ã', 'A', $str ); 
    $str = str_replace( 'Ã‚', 'A', $str ); 
    $str = str_replace( 'Ãƒ', 'A', $str ); 
    $str = str_replace( 'Ã„', 'A', $str ); 
    $str = str_replace( 'Ã…', 'A', $str ); 
    $str = str_replace( 'Ã†', '-', $str ); 
    $str = str_replace( 'Ã‡', '-', $str ); 
    $str = str_replace( 'Ãˆ', 'E', $str ); 
    $str = str_replace( 'Ã‰', 'E', $str ); 
    $str = str_replace( 'ÃŠ', 'E', $str ); 
    $str = str_replace( 'Ã‹', 'E', $str ); 
    $str = str_replace( 'ÃŒ', 'I', $str ); 
    $str = str_replace( 'Ã', 'I', $str ); 
    $str = str_replace( 'ÃŽ', 'I', $str ); 
    $str = str_replace( 'Ã', 'I', $str ); 
    $str = str_replace( 'Ã', 'D', $str ); 
    $str = str_replace( 'Ã‘', 'N', $str ); 
    $str = str_replace( 'Ã’', 'O', $str ); 
    $str = str_replace( 'Ã“', 'O', $str ); 
    $str = str_replace( 'Ã”', 'O', $str ); 
    $str = str_replace( 'Ã•', 'o', $str ); 
    $str = str_replace( 'Ã–', 'O', $str ); 
    $str = str_replace( 'Ã—', '-', $str );
    $str = str_replace( 'Ã˜', '-', $str ); 
    $str = str_replace( 'Ã™', 'U', $str ); 
    $str = str_replace( 'Ãš', 'U', $str ); 
    $str = str_replace( 'Ã›', 'U', $str ); 
    $str = str_replace( 'Ãœ', 'U', $str ); 
    $str = str_replace( 'Ã', 'Y', $str ); 
    $str = str_replace( 'Ãž', '-', $str ); 
    $str = str_replace( 'ÃŸ', '-', $str ); 
    $str = str_replace( 'Ã ', 'a', $str ); 
    $str = str_replace( 'Ã¡', 'a', $str ); 
    $str = str_replace( 'Ã¢', 'a', $str ); 
    $str = str_replace( 'Ã£', 'a', $str ); 
    $str = str_replace( 'Ã¤', 'a', $str ); 
    $str = str_replace( 'Ã¥', 'a', $str ); 
    $str = str_replace( 'Ã¦', '-', $str ); 
    $str = str_replace( 'Ã§', '-', $str ); 
    $str = str_replace( 'Ã¨', 'e', $str ); 
    $str = str_replace( 'Ã©', 'e', $str ); 
    $str = str_replace( 'Ãª', 'e', $str ); 
    $str = str_replace( 'Ã«', 'e', $str ); 
    $str = str_replace( 'Ã¬', 'i', $str ); 
    $str = str_replace( 'Ã­', 'i', $str ); 
    $str = str_replace( 'Ã®', 'i', $str ); 
    $str = str_replace( 'Ã¯', 'i', $str ); 
    $str = str_replace( 'Ã°', '-', $str ); 
    $str = str_replace( 'Ã±', 'n', $str ); 
    $str = str_replace( 'Ã²', 'o', $str ); 
    $str = str_replace( 'Ã³', 'o', $str ); 
    $str = str_replace( 'Ã´', 'o', $str ); 
    $str = str_replace( 'Ãµ', 'o', $str ); 
    $str = str_replace( 'Ã¶', 'o', $str ); 
    $str = str_replace( 'Ã·', '-', $str );
    $str = str_replace( 'Ã¸', '-', $str ); 
    $str = str_replace( 'Ã¹', 'u', $str ); 
    $str = str_replace( 'Ãº', 'u', $str ); 
    $str = str_replace( 'Ã»', 'u', $str ); 
    $str = str_replace( 'Ã¼', 'u', $str ); 
    $str = str_replace( 'Ã½', 'y', $str ); 
    $str = str_replace( 'Ã¾', '-', $str ); 
    $str = str_replace( 'Ã¿', 'y', $str ); 
	$str = str_replace( ' ', '-', $str );
	$str = str_replace( 'Â¿', '', $str );
	$str = str_replace( '?', '', $str );
	$str = str_replace( 'Â¡', '', $str );
	$str = str_replace( '!', '', $str );
	$str = str_replace( '+', '', $str );
	$str = str_replace( '*', '', $str );		
	$str = str_replace( ':', '-', $str );
	$str = str_replace( ';', '-', $str );
	$str = str_replace( ',', '-', $str );
	$str = str_replace( '{', '-', $str );
	$str = str_replace( '}', '-', $str );
	$str = str_replace( '[', '', $str );
	$str = str_replace( ']', '', $str );
	$str = str_replace( '>', '-', $str );
	$str = str_replace( '<', '-', $str );
	$str = str_replace( '$', '-', $str );
	$str = str_replace( '%', '-', $str );
	$str = str_replace( '&', '-', $str );
	$str = str_replace( ')', '-', $str );
	$str = str_replace( '(', '-', $str );	 
	$str = str_replace( '"', '', $str );		 
	$str = str_replace( '#', '', $str );
	$str = str_replace( '/', '', $str );
	$str = str_replace( '=', '', $str );
	$str = str_replace( 'Â¬', '', $str );
	$str = str_replace( '@', '', $str );
	$str = str_replace( '|', '', $str );
	$str = str_replace( 'Âº', '', $str );
	$str = str_replace( 'Âª', '', $str );
	$str = str_replace( '"', '', $str );
		return $str; 
	} 

$pri = $_GET['id'];
$fin = $pri;
$ig2 = $_GET['campo'];
$carp = $_GET['carpeta'];

 if ((isset($_POST["enviado"])) && ($_POST["enviado"] == "form1")) {
	$nombre_archivo = $fin.'_'.$carp.'_'.$_FILES['userfile']['name']; 
	move_uploaded_file($_FILES['userfile']['tmp_name'], '../imagenes/'.$carp.'/'.RemUrl3($nombre_archivo));
	?>
    <script>
		opener.document.form1.<?php echo $ig2; ?>.value="<?php echo RemUrl3($nombre_archivo); ?>";
		self.close();
	</script>
    <?php } else { ?>


<form id="form1" name="form1" action="imagenes_busca.php?campo=<?php echo $ig2; ?>&carpeta=<?php echo $carp; ?>&id=<?php echo $pri; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label class="col-sm-2 control-label" for="userfile">Titulo</label>
<div class="col-sm-10">
<input type="file" name="userfile" class="form-control" id="userfile" placeholder="Busque la Imagen">
</div>
</div>

<a class="btn btn-success" href="javascript:document.form1.submit();">Subir Imagen</a>

<input type="hidden" name="enviado" value="form1" />
</form>
<?php }?>
<div class="sep"></div>
<h3>Número de Imagen: <?php echo $fin ?>, Carpeta a guardar: <?php echo $carp ?></h3>



</div>
</div>

</div>
</div>

</div>

</div>

</body>
</html>