<?php
    $opc_DetalleNotaIngreso=$_REQUEST["opc_DetalleNotaIngreso"];
    if($opc_DetalleNotaIngreso == "1" || $opc_DetalleNotaIngreso==1){/*nuevo detalle factura*/
        $NUMORD=$_REQUEST["NUMORD"];
        $FECTRAN=$_REQUEST["FECTRAN"];
        $NUMITE=$_REQUEST["NUMITE"];//
        $CODLIN=$_REQUEST["CODLIN"];//
        $CODSLI=$_REQUEST["CODSLI"];//
        $CODITE=$_REQUEST["CODITE"];//
        $CODIGO=$_REQUEST["CODIGO"];
        $DESART=$_REQUEST["DESART"];
        $UNIMED=$_REQUEST["UNIMED"];//**no data */
        $CANTID=$_REQUEST["CANTID"];
        $COSUNI=$_REQUEST["COSUNI"];
        $IMPART=$_REQUEST["IMPART"];
        $CODALM=$_REQUEST["CODALM"];
        $EXONER=$_REQUEST["EXONER"];
        $SERVIC=$_REQUEST["SERVIC"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsDetalleNotaIngreso.php");
        
        $objDetalleNotaIngreso=new clsDetalleNotaIngreso();
        $objDetalleNotaIngreso->NUMORD=$NUMORD; 
        $objDetalleNotaIngreso->FECTRAN=$FECTRAN;
        $objDetalleNotaIngreso->NUMITE=$NUMITE;
        $objDetalleNotaIngreso->CODLIN=$CODLIN;
        $objDetalleNotaIngreso->CODSLI=$CODSLI;
        $objDetalleNotaIngreso->CODITE=$CODITE;
        $objDetalleNotaIngreso->CODIGO=$CODIGO;
        $objDetalleNotaIngreso->DESART=$DESART;
        $objDetalleNotaIngreso->UNIMED=$UNIMED;
        $objDetalleNotaIngreso->CANTID=$CANTID;
        $objDetalleNotaIngreso->COSUNI=$COSUNI;
        $objDetalleNotaIngreso->IMPART=$IMPART;
        $objDetalleNotaIngreso->CODALM=$CODALM; 
        $objDetalleNotaIngreso->EXONER=$EXONER;
        $objDetalleNotaIngreso->SERVIC=$SERVIC;
        if($objDetalleNotaIngreso->agregarDetalleNotaIngreso()){
            echo $NUMORD;
        }else{
            echo 0;
        }
    }
?>
