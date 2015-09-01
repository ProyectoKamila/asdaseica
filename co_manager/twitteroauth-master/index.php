<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?

$consumerKey    = 'bh1ThZEjrgTj1ch6gbrEw';
$consumerSecret = 'HsxVtYrc1Yz3u4yipwM3lmukQ6Z2uLMEehjiQi5HkLU';
$oAuthToken     = '131615758-7lAnJzTAKQjcc049q3W5Y6VORF9iGFuThGObnFIi';
$oAuthSecret     = '3fGogXfIVQR8uK5hUVi4JM6Hge7Zn6SNGSI6ZBcjU';
$mensaje = 'esto es una prueba de envio para el indes4';

$direccion = 'http://www.iptvdigital.com/nyn_2.php?id=1221&re=1';	
$link = 'http://api.bit.ly/v3/shorten?login=riclond82&apiKey=R_f8b8e0e864d8d565cf6f7371998d2a28&format=txt&longUrl='.$direccion;

$bit = curl_get($link); //reducimos el link con la api de bit.ly
$quedan = (140-strlen($bit))-4; // calculo los caracteres restantes que me quedan para publicar restando los puntos suspensivo
$mensaje = substr($mensaje,0,$quedan).' ...'.$bit; // corto el mensaje en caso de que sea muy largo

/* returns a result form url */
function curl_get($link) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$link);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

 
include "OAuth.php";
include "twitteroauth.php";
 
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

$tweet->post('statuses/update',array('status' => $mensaje));


?>



</body>
</html>