<?php
    $opc_DetalleCotizacion=$_REQUEST["opc_DetalleCotizacion"];
    if($opc_DetalleCotizacion == "1" || $opc_DetalleCotizacion==1){/*nuevo detalle Cotizacion*/
        $NUMDOC=$_REQUEST["numdoc"];
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
        $COD_ALM=$_REQUEST["CODALM"];
        $EXONER=$_REQUEST["EXONER"];
        $INAFEC=$_REQUEST["INAFEC"];
        $SERVIC=$_REQUEST["SERVIC"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsDetalleCotizacion.php");
        echo $NUMDOC;
        $objDetalleCotizacion=new clsDetalleCotizacion();
        $objDetalleCotizacion->LOCALI='01'; 
        $objDetalleCotizacion->NUMDOC=$NUMDOC;
        $objDetalleCotizacion->NUMITE=$NUMITE;
        $objDetalleCotizacion->IDPROD=$IDPROD;
        $objDetalleCotizacion->CODLIN=$CODLIN;
        $objDetalleCotizacion->CODSLI=$CODSLI;
        $objDetalleCotizacion->CODITE=$CODITE;
        $objDetalleCotizacion->CODIGO=$CODIGO;
        $objDetalleCotizacion->DESART=$DESART;
        $objDetalleCotizacion->CANPED=$CANPED;
        $objDetalleCotizacion->PREUNI=$PREUNI;
        $objDetalleCotizacion->IMPART=$IMPART;
        $objDetalleCotizacion->CODMON=$CODMON;
        $objDetalleCotizacion->TIPCAM=$TIPCAM;
        $objDetalleCotizacion->COD_ALM=$COD_ALM;
        $objDetalleCotizacion->EXONER=$EXONER;
        $objDetalleCotizacion->INAFEC=$INAFEC;
        $objDetalleCotizacion->SERVIC=$SERVIC;
        $objDetalleCotizacion->ANULAD='';
        if($objDetalleCotizacion->agregarDetalleCotizacion()){
            echo "Cotizacion generada Correctamente";
        }
    }
    
    if($opc_DetalleCotizacion == "2" || $opc_DetalleCotizacion==2){/*cargar detalle cotizacion*/
        $NUMDOC=$_REQUEST["NUMDOC"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsDetalleCotizacion.php");
        $objDetalleCotizacion=new clsDetalleCotizacion();
        $objDetalleCotizacion->NUMDOC=$NUMDOC;
        $filas=$objDetalleCotizacion->cargarDetalleCotizacion();
        if($filas->num_rows > 0){
            while($Fila = $filas->fetch_assoc()){
                $data[] = $Fila;
            }
            echo (json_encode($data));
        }
    }
    
    if($opc_DetalleCotizacion == "3" || $opc_DetalleCotizacion==3){/*actualizar detalle Cotizacion*/
        $NUMDOC=$_REQUEST["numdoc"];
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
        $COD_ALM=$_REQUEST["CODALM"];
        $EXONER=$_REQUEST["EXONER"];
        $INAFEC=$_REQUEST["INAFEC"];
        $SERVIC=$_REQUEST["SERVIC"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsDetalleCotizacion.php");
        echo $NUMDOC;
        $objDetalleCotizacion=new clsDetalleCotizacion();
        $objDetalleCotizacion->LOCALI='01'; 
        $objDetalleCotizacion->NUMDOC=$NUMDOC;
        $objDetalleCotizacion->NUMITE=$NUMITE;
        $objDetalleCotizacion->IDPROD=$IDPROD;
        $objDetalleCotizacion->CODLIN=$CODLIN;
        $objDetalleCotizacion->CODSLI=$CODSLI;
        $objDetalleCotizacion->CODITE=$CODITE;
        $objDetalleCotizacion->CODIGO=$CODIGO;
        $objDetalleCotizacion->DESART=$DESART;
        $objDetalleCotizacion->CANPED=$CANPED;
        $objDetalleCotizacion->PREUNI=$PREUNI;
        $objDetalleCotizacion->IMPART=$IMPART;
        $objDetalleCotizacion->CODMON=$CODMON;
        $objDetalleCotizacion->TIPCAM=$TIPCAM;
        $objDetalleCotizacion->COD_ALM=$COD_ALM;
        $objDetalleCotizacion->EXONER=$EXONER;
        $objDetalleCotizacion->INAFEC=$INAFEC;
        $objDetalleCotizacion->SERVIC=$SERVIC;
        $objDetalleCotizacion->ANULAD='';
        if($objDetalleCotizacion->actualizarDetalleCotizacion()){
            echo "Cotizacion actualizada Correctamente";
        }
    }
?>
