<?php
	require_once("../MODEL/clsUbigeo.php");
	$objUbijeo=new clsUbigeo();
	$filas=$objUbijeo->cargarProvincia();
	if($filas->num_rows > 0){
		while($Fila = $filas->fetch_assoc()){
			$data[] = $Fila;
		}
		echo (json_encode($data));
	}
?>
