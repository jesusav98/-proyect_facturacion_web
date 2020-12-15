<?php
    if($opc_consulta == "0" || $opc_consulta==0){/*consulta usuario*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsUsuario.php");
        $objUsuario=new clsUsuario();
        $filas=$objUsuario->cargarUsuario();
    }
    if($opc_consulta == "1" || $opc_consulta==1){/*consulta clientes*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsClientes.php");
        $objClientes=new clsClientes();
        $filas=$objClientes->cargarClientes();
    }
    if($opc_consulta == "2" || $opc_consulta==2){/*consulta control*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsControl.php");
        $objControl=new clsControl();
        $objControl->cargarControl();
        $_SESSION['CODCTR']=$objControl->CODCTR;
        $_SESSION['RUCCIA']=$objControl->RUCCIA;
        $_SESSION['NOMCIA']=$objControl->NOMCIA;
        $_SESSION['NOMCOM']=$objControl->NOMCOM;
        $_SESSION['DIRCIA']=$objControl->DIRCIA;
        $_SESSION['TELEFO']=$objControl->TELEFO;
        $_SESSION['CELULA']=$objControl->CELULA;
        $_SESSION['CORREO']=$objControl->CORREO;
        $_SESSION['PAGWEB']=$objControl->PAGWEB;
        $_SESSION['CTABCO']=$objControl->CTABCO;
        $_SESSION['CTACOR']=$objControl->CTACOR;
        $_SESSION['BNCONT']=$objControl->BNCONT;
        $_SESSION['IGV']=$objControl->IGV;
        $_SESSION['MONEDA']=$objControl->MONEDA;
        $_SESSION['PUIGV']=$objControl->PUIGV;
    }
    if($opc_consulta == "3" || $opc_consulta==3){/*consulta productos*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsProductos.php");
        $objProductos=new clsProductos();
        $filas=$objProductos->cargarProductos();
    }
    if($opc_consulta == "4" || $opc_consulta==4){/*consulta sistab*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB="000";
        $filas=$objSisTab->cargarSisTab();
    }
    if($opc_consulta == "5" || $opc_consulta==5){/*consulta sistab*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $SIS_NUMTAB=$_SESSION['SIS_NUMTAB'];
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB=$SIS_NUMTAB;
        $filas=$objSisTab->cargarSisTab();
    }
    if($opc_consulta == "6" || $opc_consulta==6){/*consulta anexos clientes*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAnexosCliente.php");
        $CODCLI=$_SESSION['CODCLI'];
        $objAnexosCliente=new clsAnexosCliente();
        $objAnexosCliente->CODCLI=$CODCLI;
        $filas=$objAnexosCliente->cargarAnexoClientes();
    }
    if($opc_consulta == "7" || $opc_consulta==7){/*consulta alamcen productos*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAlmacenProducto.php");
        $IDPROD=$_SESSION['IDPROD'];
        $objAlamcenProducto=new clsAlmacenProducto();
        $objAlamcenProducto->IDPROD=$IDPROD;
        $filas=$objAlamcenProducto->cargarAlamcenProductos();
    }
    if($opc_consulta == "8" || $opc_consulta==8){/*consulta proveedor*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsProveedor.php");
        $objProveedor=new clsProveedor();
        $filas=$objProveedor->cargarProveedor();
    }
    if($opc_consulta == "9" || $opc_consulta==9){/*consulta contador*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsContador.php");
        $objContador=new clsContador();
        $filas=$objContador->cargarContador();
    }
    if($opc_consulta == "10" || $opc_consulta==10){/*consulta productos almacen*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsProductos.php");
        $objProductos=new clsProductos();
        $filas=$objProductos->cargarProductosAlmacen();
    }
    if($opc_consulta == "11" || $opc_consulta==11){/*mantenimiento cotizacion*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsCotizacion.php");
        $objCotizacion=new clsCotizacion();
        $objCotizacion->fecha=$fecha;
        $objCotizacion->desde=$desde; 
        $objCotizacion->hasta=$hasta;
        $filas=$objCotizacion->cargarCotizacion();
    }
    if($opc_consulta == "12" || $opc_consulta==12){/*buscar cotizacion numdoc*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsCotizacion.php");
        $objCotizacion=new clsCotizacion();
        $objCotizacion->NUMDOC=$NUMDOC;
        $objCotizacion->buscarCotizacion();
        $RUC=$objCotizacion->RUC;
        $RAZSOC=$objCotizacion->RAZSOC;
        $DIRCLI=$objCotizacion->DIRCLI;
        $LUGENT=$objCotizacion->LUGENT;
        $ATEN=$objCotizacion->ATEN;
        $ENTRE=$objCotizacion->ENTRE;
        $SOLI=$objCotizacion->SOLI;
        $CONDVEN=$objCotizacion->CONDVEN;
        $CODVEN=$objCotizacion->CODVEN;
        $ORDCOM=$objCotizacion->ORDCOM;
        $FECDOC=$objCotizacion->FECDOC;
        $TIPVEN=$objCotizacion->TIPVEN;
        $CODMON=$objCotizacion->CODMON;
        $IMPBRUSOL=$objCotizacion->IMPBRUSOL;
        $BASIMPSOL=$objCotizacion->BASIMPSOL;
        $EXONERSOL=$objCotizacion->EXONERSOL;
        $INAFECSOL=$objCotizacion->INAFECSOL;
        $IMPIMPSOL=$objCotizacion->IMPIMPSOL;
        $IMPTOTSOL=$objCotizacion->IMPTOTSOL;
    }
    if($opc_consulta == "13" || $opc_consulta==13){/*consulta factura*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsFacturacion.php");
        $objFacturacion=new clsFacturacion();
        $filas=$objFacturacion->cargarFacturacion(); 
    }
    if($opc_consulta == "14" || $opc_consulta==14){/* buscar cotizacion factura   */
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsCotizacion.php");
        $objCotizacion=new clsCotizacion();
        $objCotizacion->RUC=$RUC;
        $filas=$objCotizacion->buscarCotizacionFactura();
    }
    if($opc_consulta == "15" || $opc_consulta==15){/* buscar detalle factura   */
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsDetalleFacturacion.php");
        $objCotizacion=new clsDetalleFacturacion();
        $objCotizacion->NUMDOC=$numdoc;
        $filas=$objCotizacion->cargarDetalleFacturacion();
    }
    if($opc_consulta == "16" || $opc_consulta==16){/* buscar factura DOC REFERENCIA  */
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsFacturacion.php");
        $objCotizacion=new clsFacturacion();
        $objCotizacion->RUC=$ruc;
        $objCotizacion->CLADOC=$docref;
        $objCotizacion->SERIE=$serref;
        $filas=$objCotizacion->buscarFactura();
    }
    if($opc_consulta == "17" || $opc_consulta==17){/*consulta cotizacion*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsCotizacion.php");
        $objCotizacion=new clsCotizacion();
        $filas=$objCotizacion->consultaCotizacion();
    }
    if($opc_consulta == "18" || $opc_consulta==18){/*consulta cotizacion*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsNotaIngreso.php");
        $objCotizacion=new clsNotaIngreso();
        $filas=$objCotizacion->cargarNotaIngreso();
    }
    if($opc_consulta == "19" || $opc_consulta==19){/*Consulta Kardex*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsKardex.php");
        $objCotizacion=new clsKardex();
        $objCotizacion->codalm=$codalm;
        $objCotizacion->idprod=$idprod;
        $objCotizacion->desde=$desde; 
        $objCotizacion->hasta=$hasta;
        $filas=$objCotizacion->cargarKardex();
    }
    if($opc_consulta == "20" || $opc_consulta==20){/*Consulta Kardex*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsFacturacion.php");
        $objProductos=new clsFacturacion();
        $objProductos->CLADOC=$CLADOC;
        $objProductos->SERIE=$SERIE;
        $filas=$objProductos->cargarFacturaAnu();
    }
    if($opc_consulta == "21" || $opc_consulta==21){/*Consulta eliminar nota ingreso*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsNotaIngreso.php");
        $objProductos=new clsNotaIngreso();
        $objProductos->FECTRAN=$FECTRAN;
        $filas=$objProductos->cargarAnularNotaIngreso();
    }
?>
 