<FORM NAME="datos" ID="datos" ACTION= "#" METHOD="POST">
<input type='text' name='idemail' id='idemail'></input>
<input type='text' name='idpass' id='idpass'></input>
<input type='submit' name='email' value='Comprobar'></input
>
</form>
<?php
//incluimos la clase nusoap.php
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');
//creamos el objeto de tipo soapclient.
$soapclient = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl',false);
//Llamamos la función que habíamos implementado en el Web Service e imprimimos lo que nos devuelve
if (isset($_POST['idemail2'])){
echo '<h1>La respuesta es: ' . $soapclient->call('comprobar',array( 'x'=>$_POST['idemail'])).'</h1>';
echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient->response, ENT_QUOTES) . '</pre>';
//echo '<h2>Debug</h2>';
//echo ho '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
}
else if(isset($_POST['idpass'])){
	$soapclient = new nusoap_client('http://' . $_SERVER['SERVER_NAME'] . '/lab6/ComprobarPassword.php?wsdl',false);
	echo '<h1>La respuesta es: ' . $soapclient->call('comprobarPass',array( 'x'=>$_POST['idpass'])).'</h1>';
echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
	
}
else{
	echo 'http://' . $_SERVER['SERVER_NAME'] . '/lab6/ComprobarPassword.php?wsdl';
}
?>