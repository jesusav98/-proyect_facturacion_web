<?php
    $opc_Noting=$_REQUEST["opc_Noting"];
    if($opc_Noting == "1" || $opc_Noting==1){/*nuevo NotaIngreso*/
        $codtran=$_REQUEST["codtran"];
        $razmov=$_REQUEST["razmov"];
        $alm_des=$_REQUEST["alm_des"];
        $ruc=$_REQUEST["ruc"];
        $raz_social=$_REQUEST["raz_social"];
        $INGSAL=$_REQUEST["INGSAL"];
        $Fec_doc=$_REQUEST["Fec_doc"];
        $moneda=$_REQUEST["moneda"];
        $numdoc=$_REQUEST["numdoc"];
        $numord=$_REQUEST["numord"];
        $tipdoc=$_REQUEST["tipdoc"];
        $serie=$_REQUEST["serie"];
        $TOTNETO=$_REQUEST["TOTNETO"];
        $TOTIGV=$_REQUEST["TOTIGV"];
        $TOTBRU=$_REQUEST["TOTBRU"];
        $TOTEXO=$_REQUEST["TOTEXO"];
        $subTotal=$_REQUEST["subTotal"];
        $igv=$_REQUEST["igv"];
        $exoneracion=$_REQUEST["exoneracion"];
        $total=$_REQUEST["total"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsNotaIngreso.php");
        $objNotaIngreso=new clsNotaIngreso();
        $objNotaIngreso->CODTRAN=$codtran;
        $objNotaIngreso->RAZON=$razmov;
        $objNotaIngreso->ALMDES=$alm_des;
        $objNotaIngreso->CODPRO=$ruc;
        $objNotaIngreso->DESCRI=$raz_social;
        $objNotaIngreso->INGSAL=$INGSAL; 
        $objNotaIngreso->FECTRAN=$Fec_doc;
        $objNotaIngreso->CODMON=$moneda;
        $objNotaIngreso->TIPCAM=0;
        $objNotaIngreso->FACTURA=$numdoc;
        $objNotaIngreso->ORDCOM=$numord;
        $objNotaIngreso->CLADOC=$tipdoc;
        $objNotaIngreso->SERIE=$serie;
        $objNotaIngreso->TOTNETO=$TOTNETO;
        $objNotaIngreso->TOTIGV=$TOTIGV;
        $objNotaIngreso->TOTBRU=$TOTBRU;
        $objNotaIngreso->TOTEXO=$TOTEXO;
        $objNotaIngreso->ANULAD="";
        $objNotaIngreso->TOTBRU2=$subTotal;
        $objNotaIngreso->TOTIGV2=$igv;
        $objNotaIngreso->TOTEXO2=$exoneracion;
        $objNotaIngreso->TOTNETO2=$total;
        $objNotaIngreso->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objNotaIngreso->FEC_CREA=date_create(date());
        /*if($objNotaIngreso->agregarNotaIngreso()){
            header("location:../VISTA/NotaIngreso.php");
        }*/
        
        $NUMDOC=$objNotaIngreso->agregarNotaIngreso();
        echo $NUMDOC;
    }
    if($opc_Noting == "2" || $opc_Noting==2){/*ELIMNAR NotaIngreso*/
        $NOTING=$_REQUEST["NOTING"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsNotaIngreso.php");
        $objNotaIngreso=new clsNotaIngreso();
        $objNotaIngreso->NOTING=$NOTING;
        $RESUL=$objNotaIngreso->eliminarNotaIngreso();
        echo $RESUL;
    }
?>
