<?php
    $opc_Cotizacion=$_REQUEST["opc_Cotizacion"];
    if($opc_Cotizacion == "1" || $opc_Cotizacion==1){/*nuevo Cotizacion*/
        $codigo=$_REQUEST["codigo"];
        $Raz_social=$_REQUEST["Raz_social"];
        $Lugar_entrega=$_REQUEST["Lugar_entrega"];
        $ruc=$_REQUEST["ruc"];
        $actencion=$_REQUEST["actencion"];
        $entrega=$_REQUEST["entrega"];
        $solicitud=$_REQUEST["solicitud"];
        $condvent=$_REQUEST["condvent"];
        $Vendedor=$_REQUEST["Vendedor"];
        $ordencompra=$_REQUEST["ordencompra"];
        $Fec_doc=$_REQUEST["Fec_doc"];
        $forma_pago=$_REQUEST["forma_pago"];
        $moneda=$_REQUEST["moneda"];
        $subTotal=$_REQUEST["subTotal"];
        $basimp=$_REQUEST["basimp"];
        $exoneracion=$_REQUEST["exoneracion"];
        $inafectos=$_REQUEST["inafectos"];
        $igv=$_REQUEST["igv"];
        $total=$_REQUEST["total"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsCotizacion.php");
        $objCotizacion=new clsCotizacion();
        $objCotizacion->LOCALI='01'; 
        $objCotizacion->CODCLI=$codigo;
        $objCotizacion->RUC=$ruc;
        $objCotizacion->RAZSOC=$Raz_social;
        $objCotizacion->DIRCLI=$Lugar_entrega;
        $objCotizacion->LUGENT=$Lugar_entrega;
        $objCotizacion->ATEN=$actencion;
        $objCotizacion->ENTRE=$entrega;
        $objCotizacion->SOLI=$solicitud;
        $objCotizacion->CONDVEN=$condvent;
        $objCotizacion->CODVEN=$Vendedor;
        $objCotizacion->ORDCOM=$ordencompra;
        $objCotizacion->FECDOC=$Fec_doc;
        $objCotizacion->TIPVEN=$forma_pago;
        $objCotizacion->CODMON=$moneda;
        $objCotizacion->TIPCAM=0;
        $objCotizacion->IMPBRUSOL=$subTotal;
        $objCotizacion->BASIMPSOL=$basimp;
        $objCotizacion->IMPDCTSOL=0;
        $objCotizacion->EXONERSOL=$exoneracion;
        $objCotizacion->INAFECSOL=$inafectos;
        $objCotizacion->IMPIMPSOL=$igv;
        $objCotizacion->IMPTOTSOL=$total;
        $objCotizacion->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objCotizacion->FEC_CREA=date_create(date());
        /*if($objCotizacion->agregarCotizacion()){
            header("location:../VISTA/cotizacion.php");
        }*/
        
        $NUMDOC=$objCotizacion->agregarCotizacion();
        echo $NUMDOC;
    }
    
    if($opc_Cotizacion == "2" || $opc_Cotizacion==2){/*actualizar Cotizacion*/
        $NUMDOC=$_REQUEST["NUMDOC"];
        $codigo=$_REQUEST["codigo"];
        $Raz_social=$_REQUEST["Raz_social"];
        $Lugar_entrega=$_REQUEST["Lugar_entrega"];
        $ruc=$_REQUEST["ruc"];
        $actencion=$_REQUEST["actencion"];
        $entrega=$_REQUEST["entrega"];
        $solicitud=$_REQUEST["solicitud"];
        $condvent=$_REQUEST["condvent"];
        $Vendedor=$_REQUEST["Vendedor"];
        $ordencompra=$_REQUEST["ordencompra"];
        $Fec_doc=$_REQUEST["Fec_doc"];
        $forma_pago=$_REQUEST["forma_pago"];
        $moneda=$_REQUEST["moneda"];
        $subTotal=$_REQUEST["subTotal"];
        $basimp=$_REQUEST["basimp"];
        $exoneracion=$_REQUEST["exoneracion"];
        $inafectos=$_REQUEST["inafectos"];
        $igv=$_REQUEST["igv"];
        $total=$_REQUEST["total"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsCotizacion.php");
        $objCotizacion=new clsCotizacion();
        $objCotizacion->LOCALI='01'; 
        $objCotizacion->NUMDOC=$NUMDOC;
        $objCotizacion->CODCLI=$codigo;
        $objCotizacion->RUC=$ruc;
        $objCotizacion->RAZSOC=$Raz_social;
        $objCotizacion->DIRCLI=$Lugar_entrega;
        $objCotizacion->LUGENT=$Lugar_entrega;
        $objCotizacion->ATEN=$actencion;
        $objCotizacion->ENTRE=$entrega;
        $objCotizacion->SOLI=$solicitud;
        $objCotizacion->CONDVEN=$condvent;
        $objCotizacion->CODVEN=$Vendedor;
        $objCotizacion->ORDCOM=$ordencompra;
        $objCotizacion->FECDOC=$Fec_doc;
        $objCotizacion->TIPVEN=$forma_pago;
        $objCotizacion->CODMON=$moneda;
        $objCotizacion->TIPCAM=0;
        $objCotizacion->IMPBRUSOL=$subTotal;
        $objCotizacion->BASIMPSOL=$basimp;
        $objCotizacion->IMPDCTSOL=0;
        $objCotizacion->EXONERSOL=$exoneracion;
        $objCotizacion->INAFECSOL=$inafectos;
        $objCotizacion->IMPIMPSOL=$igv;
        $objCotizacion->IMPTOTSOL=$total;
        $objCotizacion->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objCotizacion->FEC_CREA=date_create(date());
        $agregado=$objCotizacion->actializarCotizacion();
        echo $agregado;
    }

    if($opc_Cotizacion == "3" || $opc_Cotizacion==3){/*actualizar Cotizacion*/
        $NUMDOC=$_REQUEST["NUMDOC"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsCotizacion.php");
        $objCotizacion=new clsCotizacion();
        $objCotizacion->NUMDOC=$NUMDOC;
        $objCotizacion->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objCotizacion->FEC_CREA=date_create(date());
        $agregado=$objCotizacion->aprobarCotizacion();
        echo $agregado;
    }
?>
