<?php
    session_name("adminsoft");
    session_start();
    require_once("../MODEL/clsSisTab.php");
    $SIS_NUMTAB=$_REQUEST['OPC_SIS_NUMTAB'];
    $objSisTab=new clsSisTab();
    $objSisTab->SIS_NUMTAB=$SIS_NUMTAB;
    $filas=$objSisTab->cargarComboSisTab();
    if($filas->num_rows > 0){
		while($Fila = $filas->fetch_assoc()){
			$data[] = $Fila;
		}
		echo (json_encode($data));
	}
?>