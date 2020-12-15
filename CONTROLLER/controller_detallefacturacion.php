<?php
    $opc_DetalleFacturacion=$_REQUEST["opc_DetalleFacturacion"];
    if($opc_DetalleFacturacion == "1" || $opc_DetalleFacturacion==1){/*nuevo detalle factura*/
        $SERIE=$_REQUEST["SERIE"];
        $CLADOC=$_REQUEST["CLADOC"];
        $NUMDOC=$_REQUEST["NUMDOC"];
        $NUMITE=$_REQUEST["NUMITE"];//
        $IDPROD=$_REQUEST["IDPROD"];//
        $CODLIN=$_REQUEST["CODLIN"];//
        $CODSLI=$_REQUEST["CODSLI"];//
        $CODITE=$_REQUEST["CODITE"];//
        $CODIGO=$_REQUEST["CODIGO"];
        $DESART=$_REQUEST["DESITE"];
        $CANPED=$_REQUEST["cantidad"];
        $PREUNI=$_REQUEST["PRECLI01"];
        $IMPART=$_REQUEST["total_item"];
        $CODMON=$_REQUEST["CODMON"];
        $TIPCAM=$_REQUEST[0];
        $CODALM=$_REQUEST["CODALM"];
        $EXONER=$_REQUEST["EXONER"];
        $INAFEC=$_REQUEST["INAFEC"];
        $SERVIC=$_REQUEST["SERVIC"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsDetalleFacturacion.php");
        echo $NUMDOC;
        $objDetalleFacturacion=new clsDetalleFacturacion();
        $objDetalleFacturacion->LOCALI='01'; 
        $objDetalleFacturacion->SERIE=$SERIE;
        $objDetalleFacturacion->CLADOC=$CLADOC;
        $objDetalleFacturacion->NUMDOC=$NUMDOC;
        $objDetalleFacturacion->NUMITE=$NUMITE;
        $objDetalleFacturacion->IDPROD=$IDPROD;
        $objDetalleFacturacion->CODLIN=$CODLIN;
        $objDetalleFacturacion->CODSLI=$CODSLI;
        $objDetalleFacturacion->CODITE=$CODITE;
        $objDetalleFacturacion->CODIGO=$CODIGO;
        $objDetalleFacturacion->DESART=$DESART;
        $objDetalleFacturacion->CANPED=$CANPED;
        $objDetalleFacturacion->PREUNI=$PREUNI;
        $objDetalleFacturacion->IMPART=$IMPART;
        $objDetalleFacturacion->CODMON=$CODMON;
        $objDetalleFacturacion->TIPCAM=$TIPCAM;
        $objDetalleFacturacion->CODALM=$CODALM;
        $objDetalleFacturacion->EXONER=$EXONER;
        $objDetalleFacturacion->INAFEC=$INAFEC;
        $objDetalleFacturacion->SERVIC=$SERVIC;
        if($objDetalleFacturacion->agregarDetalleFacturacion()){
            echo "Cotizacion generada Correctamente";
        }
    }
    
    if($opc_DetalleFacturacion == "2" || $opc_DetalleFacturacion==2){/*cargar detalle factura*/
        $NUMDOC=$_REQUEST["NUMDOC"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsDetalleFacturacion.php");
        $objDetalleFacturacion=new clsDetalleFacturacion();
        $objDetalleFacturacion->NUMDOC=$NUMDOC;
        $filas=$objDetalleFacturacion->cargarDetalleFacturacion();
        if($filas->num_rows > 0){
            while($Fila = $filas->fetch_assoc()){
                $data[] = $Fila;
            }
            echo (json_encode($data));
        }
    }
?>
