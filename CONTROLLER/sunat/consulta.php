<?php
	header('Content-Type: text/plain');
	require ("src/autoload.php");
	$cliente = new \Sunat\Sunat();
	$ruc=$_REQUEST['ruc'];
	echo $cliente->search( $ruc, true );
?>
 